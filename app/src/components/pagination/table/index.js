import Loading from 'components/loading/Spinner'
import PropTypes from 'prop-types'
import React, { useMemo } from 'react'
import { useTable, useSortBy, usePagination, useFilters } from 'react-table'
import { Table } from 'react-bootstrap'
import { ColumnSortIcon, FilterControl, PaginationControls } from './utils'

function TableUtility({
  data,
  filterComponent,
  columns,
  loading,
  rowsPerPage,
  defaultPage,
  ...rest
}) {
  const initialState = useMemo(
    () => ({
      pageSize: rowsPerPage,
      pageIndex: defaultPage,
    }),
    [rowsPerPage, defaultPage]
  )

  const {
    getTableProps,
    getTableBodyProps,
    headerGroups,
    prepareRow,
    pageOptions,
    page,
    state: { pageIndex, pageSize },
    gotoPage,
    previousPage,
    nextPage,
    setPageSize,
    canPreviousPage,
    canNextPage,
    setFilter,
  } = useTable(
    {
      columns,
      data,
      initialState,
      pageCount: rowsPerPage,
    },
    useFilters,
    useSortBy,
    usePagination
  )

  return (
    <div className='container-fluid'>
      <FilterControl filterComponent={filterComponent} setFilter={setFilter} />
      <Table {...getTableProps()} responsive {...rest}>
        {/* head */}
        <thead>
          {headerGroups.map(headerGroup => (
            <tr {...headerGroup.getHeaderGroupProps()}>
              {headerGroup &&
                headerGroup.headers.map(column => (
                  <th {...column.getHeaderProps()}>
                    <strong {...column.getSortByToggleProps()}>
                      {column.render('Header')}
                      <ColumnSortIcon {...column} />
                    </strong>
                  </th>
                ))}
            </tr>
          ))}
        </thead>
        {/* end head */}

        {/* body */}
        <tbody {...getTableBodyProps}>
          {loading && <Loading spinnerOnly />}
          {page &&
            page.map(row => {
              prepareRow(row)
              return (
                <tr {...row.getRowProps()}>
                  {row.cells.map(cell => (
                    <td {...cell.getCellProps()}>
                      {cell.isAggregated
                        ? cell.render('Aggregated')
                        : cell.render('Cell', { editable: false })}
                    </td>
                  ))}
                </tr>
              )
            })}
        </tbody>
        {/* end body */}
      </Table>
      <div className='pagination-controls'>
        <PaginationControls
          {...{
            pageIndex,
            pageOptions,
            canNextPage,
            canPreviousPage,
            nextPage,
            previousPage,
            gotoPage,
            pageSize,
            setPageSize,
          }}
        />
      </div>
    </div>
  )
}

TableUtility.propTypes = {
  data: PropTypes.arrayOf(PropTypes.object),
  columns: PropTypes.arrayOf(
    PropTypes.shape({
      Header: PropTypes.string,
      Cell: PropTypes.func,
      accessor: PropTypes.string,
      id: PropTypes.string,
    })
  ),
  rowsPerPage: PropTypes.number,
  defaultPage: PropTypes.number,
}

TableUtility.defaultProps = {
  rowsPerPage: 10,
  defaultPage: 0,
}

export default TableUtility
