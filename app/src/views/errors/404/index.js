import React, { memo } from 'react'
import Layout from 'components/layouts/Site'
import { AlertTriangle } from 'react-feather'

export default memo(() => (
  <Layout title={'Page not found'}>
    <div className='container-fluid text-center'>
      <AlertTriangle size={350} />

      <div className='mt-4'>
        <strong className='text-danger'>Oooops!! Page not found.</strong>
      </div>
    </div>
  </Layout>
))
