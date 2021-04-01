import Error from 'components/Error'
import Layout from 'components/layouts/Site'
import { Link } from 'react-router-dom'
import Loading from 'components/loading'
import React, { useMemo, memo } from 'react'
import Pagination from 'components/pagination/table'
import useFetchAllUsers from './hooks/useFetchAllUsers'
import { Col, Form } from 'react-bootstrap'
import routes from 'config/routes'
import { format } from 'helpers/Routes'

export default function UserList(props) {
  const options = useMemo(() => ({
    params: { getAll: true },
  }))
  const { data, error, loading } = useFetchAllUsers(options)

  const columns = useMemo(
    () => [
      {
        Header: 'ID',
        accessor: 'id',
        Cell: ({ row: { original } }) => (
          <Link to={format(routes.site.users.view.value, [original.id])}>
            {original.id}
          </Link>
        ),
      },
      { Header: 'Name', accessor: 'name' },
      {
        Header: 'Email',
        accessor: 'email',
      },
      {
        Header: 'Username',
        accessor: 'username',
      },
      {
        Header: 'Phone',
        accessor: 'phone',
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
              <strong>Fitler By Name:</strong>
            </Form.Label>
            <Form.Control
              placeholder='Filter by Name'
              onChange={e => setFilter('name', e.target.value)}
            />
          </Form.Group>
        </Col>
        <Col md={4}>
          <Form.Group controlId='filterEmail'>
            <Form.Label>
              <strong>Fitler By Email:</strong>
            </Form.Label>
            <Form.Control
              placeholder='Filter by Email'
              onChange={e => setFilter('email', e.target.value)}
            />
          </Form.Group>
        </Col>
        <Col md={4}>
          <Form.Group controlId='filterUsername'>
            <Form.Label>
              <strong>Fitler By Username:</strong>
            </Form.Label>
            <Form.Control
              placeholder='Filter by Username'
              onChange={e => setFilter('username', e.target.value)}
            />
          </Form.Group>
        </Col>
      </>
    )
  })

  return (
    <Layout title='Users'>
      <h2>Users</h2>
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
