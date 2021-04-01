// import useHelmet from 'hooks/useHelmet'
import Header from 'components/header'
import React, { memo } from 'react'
import { SiteTitle } from 'utils/meta'

export default memo(({ title, className, children }) => {
  const _className = ['container mt-4'].concat(className).join(' ').trim()
  // const { renderHelmet } = useHelmet(title)

  return (
    <>
      <SiteTitle title={title} />
      <Header />
      <div className={_className}>{children}</div>
    </>
  )
})
