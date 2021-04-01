import _ from 'lodash'
import Error from 'components/Error'
import Layout from 'components/layouts/Site'
import Loading from 'components/loading'
import React from 'react'
import useFetchPosts from './hooks/useFetchPosts'
import { ListGroup } from 'react-bootstrap'
import { useParams } from 'react-router-dom'

export default function View(props) {
  const params = useParams()
  const { error, loading, data } = useFetchPosts(params.id)

  return (
    <Layout title={'View Posts'}>
      <h2>View Posts</h2>
      {loading && (
        <Loading message={`Please wait while we retrieve the details.`} />
      )}
      {error && <Error message={error} />}
      {!loading && !error && !_.isEmpty(data) && (
        <div className='mt-2'>
          <ListGroup>
            <ListGroup.Item>
              <strong>ID:</strong> {data.id}
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>Title:</strong> {data.title}
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>Created At:</strong> {data.created_at}
            </ListGroup.Item>
          </ListGroup>

          <h3 className='mt-3'>Comments</h3>
          {data.comments &&
            data.comments.map(comment => (
              <ListGroup className='mt-3'>
                <ListGroup.Item>
                  <strong>Name: </strong>
                  {comment.name}
                </ListGroup.Item>
                <ListGroup.Item>
                  <strong>Body: </strong>
                  {comment.body}
                </ListGroup.Item>
              </ListGroup>
            ))}
        </div>
      )}
    </Layout>
  )
}
