import _ from 'lodash'
import Error from 'components/Error'
import Layout from 'components/layouts/Site'
import Loading from 'components/loading'
import React from 'react'
import useFetchUsers from './hooks/useFetchUsers'
import { ListGroup } from 'react-bootstrap'
import { useParams } from 'react-router-dom'

export default function View(props) {
  const params = useParams()
  const { error, loading, data } = useFetchUsers(params.id)

  return (
    <Layout title={'View Users'}>
      <h2>View Users</h2>
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
              <strong>Name:</strong> {data.name}
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>Email:</strong> {data.email}
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>Username:</strong> {data.username}
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>Created At:</strong> {data.created_at}
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>Address:</strong> {data.address.suite}{' '}
              {data.address.street} {data.address.city} {data.address.zipcode}
            </ListGroup.Item>
            <ListGroup.Item>
              <p>
                <strong>Company:</strong> {data.company.name}
              </p>
              <p>
                <strong>Catch Phrase:</strong> {data.company.catchPhrase}
              </p>
              <p>
                <strong>BS:</strong> {data.company.bs}
              </p>
            </ListGroup.Item>
          </ListGroup>
        </div>
      )}
    </Layout>
  )
}
