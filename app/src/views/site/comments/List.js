import Error from 'components/Error'
import Layout from 'components/layouts/Site'
import { Link } from 'react-router-dom'
import Loading from 'components/loading'
import React, { useMemo, memo } from 'react'
import Pagination from 'components/pagination/table'
import useFetchAllComments from './hooks/useFetchAllComments'
import { Col, Form } from 'react-bootstrap'
import routes from 'config/routes'
import { format } from 'helpers/Routes'

export default function CommentsList(props) {
  const { data, error, loading } = useFetchAllComments({
    params: { getAll: true },
  })

  const columns = useMemo(
    () => [
      {
        Header: 'ID',
        accessor: 'id',
        Cell: ({ row: { original } }) => (
          <Link to={format(routes.site.comments.view.value, [original.id])}>
            {original.id}
          </Link>
        ),
      },
      {
        Header: 'Post Id',
        accessor: 'postId',
        Cell: ({ row: { original } }) => (
          <Link to={format(routes.site.posts.view.value, [original.postId])}>
            {original.postId}
          </Link>
        ),
      },
      { Header: 'Email', accessor: 'email' },
      { Header: 'Name', accessor: 'name' },
      { Header: 'Body', accessor: 'body' },
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
          <Form.Group controlId='filterPostId'>
            <Form.Label>
              <strong>Fitler By Post Id:</strong>
            </Form.Label>
            <Form.Control
              placeholder='Filter by Post ID'
              onChange={e => setFilter('postId', e.target.value)}
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
      </>
    )
  })

  return (
    <Layout title='Comments'>
      <h2>Comments</h2>
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
