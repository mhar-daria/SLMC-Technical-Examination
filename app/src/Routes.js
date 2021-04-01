import { SiteRoute } from 'components/Routes'
import { memo } from 'react'
import { Switch } from 'react-router-dom'
import View from 'views'
import routes from 'config/routes'

export default memo(() => (
  <Switch>
    <SiteRoute exact path={'/'} component={View.Site.Home} />
    <SiteRoute
      exact
      path={routes.site.todos.value}
      component={View.Site.Todos.List}
    />

    <SiteRoute
      exact
      path={routes.site.todos.view.value}
      component={View.Site.Todos.View}
    />

    <SiteRoute
      exact
      path={routes.site.users.value}
      component={View.Site.Users.List}
    />

    <SiteRoute
      exact
      path={routes.site.users.view.value}
      component={View.Site.Users.View}
    />

    <SiteRoute
      exact
      path={routes.site.posts.value}
      component={View.Site.Posts.List}
    />

    <SiteRoute
      exact
      path={routes.site.posts.view.value}
      component={View.Site.Posts.View}
    />

    <SiteRoute
      exact
      path={routes.site.comments.value}
      component={View.Site.Comments.List}
    />

    <SiteRoute
      exact
      path={routes.site.comments.view.value}
      component={View.Site.Comments.View}
    />

    <SiteRoute
      exact
      path={routes.site.albums.value}
      component={View.Site.Albums.List}
    />

    <SiteRoute
      exact
      path={routes.site.albums.view.value}
      component={View.Site.Albums.View}
    />

    <SiteRoute
      exact
      path={routes.site.photos.value}
      component={View.Site.Photos.List}
    />

    <SiteRoute
      exact
      path={routes.site.photos.view.value}
      component={View.Site.Photos.View}
    />

    <SiteRoute path='*' component={View.HttpErrors.PageNotFound} />
  </Switch>
))
