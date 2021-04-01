import React, { useMemo, useState } from 'react'
import {
  Col,
  Collapse,
  Container,
  Form,
  Row,
  Pagination,
} from 'react-bootstrap'
import { FaSortUp, FaSortDown, FaSort } from 'react-icons/fa'
import {
  BsChevronDoubleRight,
  BsChevronRight,
  BsChevronDoubleLeft,
  BsChevronLeft,
} from 'react-icons/bs'
import { Link } from 'react-router-dom'
import { GoSettings } from 'react-icons/go'

const ITEM_CONTROL_COUNT = 5

export function ColumnSortIcon({ isSorted, isSortedDesc }) {
  if (isSorted && isSortedDesc) return <FaSortDown />
  if (isSorted && !isSortedDesc) return <FaSortUp />

  return <FaSort />
}

export function PaginationControls({
  pageIndex,
  pageOptions,
  gotoPage,
  canPreviousPage,
  previousPage,
  canNextPage,
  nextPage,
  pageSize,
  setPageSize,
}) {
  const currentPage = useMemo(() => pageIndex + 1, [pageIndex])
  const maxPage = useMemo(() => pageOptions.length, [pageOptions])

  const start = useMemo(() => {
    if (
      currentPage === 1 ||
      currentPage - Math.floor(ITEM_CONTROL_COUNT / 2) < 1
    )
      return 1

    return currentPage - Math.floor(ITEM_CONTROL_COUNT / 2)
  }, [currentPage])

  const end = useMemo(() => {
    if (currentPage === maxPage || start + (ITEM_CONTROL_COUNT - 1) >= maxPage)
      return maxPage

    return start + (ITEM_CONTROL_COUNT - 1)
  }, [currentPage, maxPage, start])

  return (
    <Row>
      <Col md={3}>
        <strong>
          Page: {currentPage} {'/'} {pageOptions.length}
        </strong>
      </Col>
      <Col md={5}>
        <Pagination className='justify-content-center'>
          <Pagination.Item
            disabled={pageIndex === 0}
            onClick={() => gotoPage(0)}
          >
            <BsChevronDoubleLeft strokeWidth={1} />
          </Pagination.Item>
          <Pagination.Item disabled={!canPreviousPage} onClick={previousPage}>
            <BsChevronLeft strokeWidth={1} />
          </Pagination.Item>

          {/* number controls */}
          {/* <RenderControlItems /> */}
          {Array.from({ length: (end - start) / 1 + 1 }, (_, i) => {
            const currItemIndex = start + i * 1

            return (
              <Pagination.Item
                onClick={() => gotoPage(currItemIndex)}
                active={currentPage === currItemIndex}
                key={currItemIndex}
              >
                {currItemIndex}
              </Pagination.Item>
            )
          })}
          {/* end number controls */}

          <Pagination.Item disabled={!canNextPage} onClick={nextPage}>
            <BsChevronRight strokeWidth={1} />
          </Pagination.Item>
          <Pagination.Item
            disabled={pageOptions.length - 1 === pageIndex}
            onClick={() => gotoPage(pageOptions.length - 1)}
          >
            <BsChevronDoubleRight strokeWidth={1} />
          </Pagination.Item>
        </Pagination>
      </Col>
      <Col md={2} className='text-right'>
        <strong>Goto Page:</strong>{' '}
        <input
          style={{ width: 'unset' }}
          className='form-control d-inline-block'
          type='number'
          min='1'
          max={`${maxPage}`}
          defaultValue='1'
          step='1'
          onChange={e => gotoPage(parseInt(e.target.value, 10) - 1)}
        />
      </Col>
      <Col md={2} className='text-right'>
        <strong># Rows:</strong>{' '}
        <Form.Control
          className='d-inline-block'
          style={{ width: 'unset' }}
          as='select'
          defaultValue={pageSize}
          onChange={e => setPageSize(e.target.value)}
        >
          {[10, 20, 30, 40, 50].map(item => (
            <option value={item} key={item}>
              {item}
            </option>
          ))}
        </Form.Control>
      </Col>
    </Row>
  )
}

export function FilterControl({ setFilter, filterComponent: FilterComponent }) {
  const [showFilters, setShowFilters] = useState(false)
  const toggleFilters = e => {
    e.preventDefault()

    setShowFilters(!showFilters)
  }

  return (
    <Container
      fluid
      className='mb-4 mt-4 mb-4 pt-2 pb-2 rounded-lg border border-muted'
    >
      <div className='text-right'>
        <Link to='/' onClick={toggleFilters}>
          <GoSettings />
        </Link>
      </div>
      <Collapse in={showFilters}>
        <div className='mt-4'>
          {FilterComponent && <FilterComponent setFilter={setFilter} />}
        </div>
      </Collapse>
    </Container>
  )
}
