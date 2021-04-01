import { Route } from 'react-router-dom'

export function SiteRoute({ component: Component, ...rest }) {
  return <Route {...rest} render={props => <Component {...props} />} />
}

export function isActiveLink({ path, to }) {
  if (!path) return ''

  const splitPath = path.split('/')

  return `${splitPath[1]}/${splitPath[2]}` === to ? 'active' : ''
}
