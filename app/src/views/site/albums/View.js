import _ from 'lodash'
import Error from 'components/Error'
import Layout from 'components/layouts/Site'
import Loading from 'components/loading'
import React from 'react'
import useFetchAlbums from './hooks/useFetchAlbums'
import { ListGroup } from 'react-bootstrap'
import { useParams } from 'react-router-dom'

export default function View(props) {
  const params = useParams()
  const { error, loading, data } = useFetchAlbums(params.id)

  return (
    <Layout title={'View Albums'}>
      <h2>View Albums</h2>
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

          <h3 className='mt-4'>Photos</h3>
          {data.photos &&
            data.photos.map(photo => (
              <ListGroup className='mt-2'>
                <ListGroup.Item>
                  <strong>Album Id:</strong> {photo.albumId}
                </ListGroup.Item>

                <ListGroup.Item>
                  <strong>Thumbnail URL:</strong> {photo.thumbnailUrl}
                </ListGroup.Item>

                <ListGroup.Item>
                  <strong>URL:</strong> {photo.url}
                </ListGroup.Item>
              </ListGroup>
            ))}
        </div>
      )}
    </Layout>
  )
}
