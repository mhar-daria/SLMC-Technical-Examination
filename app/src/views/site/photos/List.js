import Error from 'components/Error'
import Layout from 'components/layouts/Site'
import { Link } from 'react-router-dom'
import Loading from 'components/loading'
import React, { useMemo, memo } from 'react'
import Pagination from 'components/pagination/table'
import useFetchAllPhotos from './hooks/useFetchAllPhotos'
import { Col, Form } from 'react-bootstrap'
import routes from 'config/routes'
import { format } from 'helpers/Routes'

export default function PhotosList(props) {
  const { data, error, loading } = useFetchAllPhotos({
    params: { getAll: true },
  })

  const columns = useMemo(
    () => [
      {
        Header: 'ID',
        accessor: 'id',
        Cell: ({ row: { original } }) => (
          <Link to={format(routes.site.photos.view.value, [original.id])}>
            {original.id}
          </Link>
        ),
      },
      {
        Header: 'Album Id',
        accessor: 'albumId',
        Cell: ({ row: { original } }) => (
          <Link to={format(routes.site.albums.view.value, [original.albumId])}>
            {original.albumId}
          </Link>
        ),
      },
      { Header: 'Title', accessor: 'title' },
      { Header: 'URL', accessor: 'url' },
      { Header: 'Thumbnail URL', accessor: 'thumbnailUrl' },
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
              <strong>Fitler By Album ID:</strong>
            </Form.Label>
            <Form.Control
              placeholder='Filter by Album ID'
              onChange={e => setFilter('albumId', e.target.value)}
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
          <Form.Group controlId='filterUrl'>
            <Form.Label>
              <strong>Fitler By Url:</strong>
            </Form.Label>
            <Form.Control
              placeholder='Filter by Url'
              onChange={e => setFilter('url', e.target.value)}
            />
          </Form.Group>
        </Col>
        <Col md={4}>
          <Form.Group controlId='filterThumbnailUrl'>
            <Form.Label>
              <strong>Fitler By Thumbnail Url:</strong>
            </Form.Label>
            <Form.Control
              placeholder='Filter by Thumbnail Url'
              onChange={e => setFilter('thumbnailUrl', e.target.value)}
            />
          </Form.Group>
        </Col>
      </>
    )
  })

  return (
    <Layout title='Photos'>
      <h2>Photos</h2>
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
