import _ from 'lodash'
import Error from 'components/Error'
import Layout from 'components/layouts/Site'
import Loading from 'components/loading'
import React from 'react'
import useFetchComments from './hooks/useFetchComments'
import { ListGroup } from 'react-bootstrap'
import { useParams } from 'react-router-dom'

export default function View(props) {
  const params = useParams()
  const { error, loading, data } = useFetchComments(params.id)

  return (
    <Layout title={'View Comments'}>
      <h2>View Comments</h2>
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
        </div>
      )}
    </Layout>
  )
}
