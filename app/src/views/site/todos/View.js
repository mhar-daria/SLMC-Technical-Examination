import _ from 'lodash'
import Error from 'components/Error'
import Layout from 'components/layouts/Site'
import Loading from 'components/loading'
import React from 'react'
import useFetchTodos from './hooks/useFetchTodos'
import { ListGroup } from 'react-bootstrap'
import { useParams } from 'react-router-dom'

export default function View(props) {
  const params = useParams()
  const { error, loading, data } = useFetchTodos(params.id)

  return (
    <Layout title={'View Todos'}>
      <h2>View Todos</h2>
      {loading && (
        <Loading message={`Please wait while we retrieve the details.`} />
      )}
      {error && <Error message={error} />}
      {!loading && !error && !_.isEmpty(data) && (
        <div className='border border-muted rounded-lg mt-2'>
          <ListGroup>
            <ListGroup.Item>
              <strong>ID:</strong> {data.id}
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>Title:</strong> {data.title}
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>Completed:</strong> {data.completed ? 'True' : 'False'}
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>Created At:</strong> {data.created_at}
            </ListGroup.Item>
          </ListGroup>
        </div>
      )}
    </Layout>
  )
}
