import Layout from 'components/layouts/Site'
import React from 'react'

export default function Home(props) {
  return (
    <Layout title='Homepage'>
      <div className='container border border-dark rounded-lg mt-4'>
        <h2>Welcome</h2>
        <p>This was a test page.</p>
      </div>
    </Layout>
  )
}
