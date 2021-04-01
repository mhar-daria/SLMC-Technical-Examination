import Error from 'components/Error'
import Layout from 'components/layouts/Site'
import { Link } from 'react-router-dom'
import Loading from 'components/loading'
import React, { useMemo, memo } from 'react'
import Pagination from 'components/pagination/table'
import useFetchTodos from './hooks/useFetchAllTodos'
import { Col, Form } from 'react-bootstrap'
import routes from 'config/routes'
import { format } from 'helpers/Routes'

export default function Todos(props) {
  const { data, error, loading } = useFetchTodos({ params: { getAll: true } })

  const columns = useMemo(
    () => [
      {
        Header: 'ID',
        accessor: 'id',
        Cell: ({ row: { original } }) => (
          <Link to={format(routes.site.todos.view.value, [original.id])}>
            {original.id}
          </Link>
        ),
      },
      { Header: 'Title', accessor: 'title' },
      {
        Header: 'Completed',
        id: 'completed',
        accessor: 'id',
        Cell: ({ row: { original } }) =>
          Boolean(original.completed) ? 'True' : 'False',
      },
      { Header: 'Created At', accessor: 'created_at' },
    ],
    []
  )

  const FilterComponent = memo(({ setFilter }) => {
    return (
      <>
        <Col md={4}>
          <Form.Group controlId='filterId'>
            <Form.Label>
              <strong>Fitler By ID:</strong>
            </Form.Label>
            <Form.Control
              placeholder='Filter by ID'
              onChange={e => setFilter('id', e.target.value)}
            />
          </Form.Group>
        </Col>
        <Col md={4}>
          <Form.Group controlId='filterName'>
            <Form.Label>
              <strong>Fitler By Ttile:</strong>
            </Form.Label>
            <Form.Control
              placeholder='Filter by Title'
              onChange={e => setFilter('title', e.target.value)}
            />
          </Form.Group>
        </Col>
      </>
    )
  })

  return (
    <Layout title='Todos'>
      <h2>Todos</h2>
      {loading && <Loading />}
      {error && <Error message={error} />}
      {!loading && !error && (
        <Pagination
          data={data}
          columns={columns}
          bordered
          striped
          filterComponent={FilterComponent}
        />
      )}
    </Layout>
  )
}
