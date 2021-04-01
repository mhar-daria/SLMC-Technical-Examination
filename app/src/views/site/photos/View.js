import _ from 'lodash'
import Error from 'components/Error'
import Layout from 'components/layouts/Site'
import { Link } from 'react-router-dom'
import Loading from 'components/loading'
import React from 'react'
import useFetchPhotos from './hooks/useFetchPhotos'
import { ListGroup } from 'react-bootstrap'
import { useParams } from 'react-router-dom'
import { format } from 'helpers/Routes'
import routes from 'config/routes'

export default function View(props) {
  const params = useParams()
  const { error, loading, data } = useFetchPhotos(params.id)

  return (
    <Layout title={'View Photos'}>
      <h2>View Photos</h2>
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
              <strong>Album ID:</strong>{' '}
              <Link to={format(routes.site.albums.view.value, [data.id])}>
                {data.id}
              </Link>
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>Title:</strong> {data.title}
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>URL:</strong> {data.url}
            </ListGroup.Item>
            <ListGroup.Item>
              <strong>Thumbnail URL:</strong> {data.thumbnailUrl}
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
