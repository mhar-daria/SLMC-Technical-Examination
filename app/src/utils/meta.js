import React from 'react'
import { Helmet } from 'react-helmet-async'

export function SiteTitle({ title }) {
  let helmetTitle = process.env.REACT_APP_SITE_NAME

  if (title) helmetTitle += ` | ${title}`

  return (
    <Helmet>
      <title>{helmetTitle}</title>
    </Helmet>
  )
}
