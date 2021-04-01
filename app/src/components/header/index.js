import React, { memo } from 'react'
import routes from 'config/routes'
import { Nav, Navbar } from 'react-bootstrap'
import { Link } from 'react-router-dom'

export default memo(() => {
  return (
    <header>
      <Navbar bg='dark' className='text-white'>
        <Navbar.Brand to={'/'} as={Link} className='text-white'>
          {process.env.REACT_APP_SITE_NAME}
        </Navbar.Brand>
        <Navbar.Toggle aria-controls='basic-navbar-nav' />

        <Navbar.Collapse id='navbar' className='justify-content-end'>
          <Nav>
            <Nav.Link
              to={routes.site.users.value}
              as={Link}
              className='text-white'
            >
              {routes.site.users.label}
            </Nav.Link>
            <Nav.Link
              to={routes.site.comments.value}
              as={Link}
              className='text-white'
            >
              {routes.site.comments.label}
            </Nav.Link>
            <Nav.Link
              to={routes.site.posts.value}
              as={Link}
              className='text-white'
            >
              {routes.site.posts.label}
            </Nav.Link>
            <Nav.Link
              to={routes.site.albums.value}
              as={Link}
              className='text-white'
            >
              {routes.site.albums.label}
            </Nav.Link>
            <Nav.Link
              to={routes.site.photos.value}
              as={Link}
              className='text-white'
            >
              {routes.site.photos.label}
            </Nav.Link>
            <Nav.Link
              to={routes.site.todos.value}
              as={Link}
              className='text-white'
            >
              {routes.site.todos.label}
            </Nav.Link>
          </Nav>
        </Navbar.Collapse>
      </Navbar>
    </header>
  )
})
