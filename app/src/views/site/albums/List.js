import Error from 'components/Error'
import Layout from 'components/layouts/Site'
import { Link } from 'react-router-dom'
import Loading from 'components/loading'
import React, { useMemo, memo } from 'react'
import Pagination from 'components/pagination/table'
import useFetchAllAlbums from './hooks/useFetchAllAlbums'
import { Col, Form } from 'react-bootstrap'
import routes from 'config/routes'
import { format } from 'helpers/Routes'

export default function AlbumsList(props) {
  const { data, error, loading } = useFetchAllAlbums({
    params: { getAll: true },
  })

  const columns = useMemo(
    () => [
      {
        Header: 'ID',
        accessor: 'id',
        Cell: ({ row: { original } }) => (
          <Link to={format(routes.site.albums.view.value, [original.id])}>
            {original.id}
          </Link>
        ),
      },
      {
        Header: 'User Id',
        accessor: 'userId',
        Cell: ({ row: { original } }) => (
          <Link to={format(routes.site.users.view.value, [original.userId])}>
            {original.userId}
          </Link>
        ),
      },
      { Header: 'title', accessor: 'title' },
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
          <Form.Group controlId='filterTitle'>
            <Form.Label>
              <strong>Fitler By Title:</strong>
            </Form.Label>
            <Form.Control
              placeholder='Filter by Title'
              onChange={e => setFilter('title', e.target.value)}
            />
          </Form.Group>
        </Col>
        <Col md={4}>
          <Form.Group controlId='filterUserId'>
            <Form.Label>
              <strong>Fitler By User Id:</strong>
            </Form.Label>
            <Form.Control
              placeholder='Filter by User Id'
              onChange={e => setFilter('userId', e.target.value)}
            />
          </Form.Group>
        </Col>
      </>
    )
  })

  return (
    <Layout title='Albums'>
      <h2>Albums</h2>
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
