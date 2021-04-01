const routes = {
  site: {
    users: {
      label: 'Users',
      value: '/users',
      view: {
        label: 'User View',
        value: '/users/:id',
      },
    },
    comments: {
      label: 'Comments',
      value: '/comments',
      view: {
        label: 'Comments View',
        value: '/comments/:id',
      },
    },
    posts: {
      label: 'Posts',
      value: '/posts',
      view: {
        label: 'Post View',
        value: '/posts/:id',
      },
    },
    albums: {
      label: 'Albums',
      value: '/albums',
      view: {
        label: 'Album View',
        value: '/albums/:id',
      },
    },
    photos: {
      label: 'Photos',
      value: '/photos',
      view: {
        label: 'Photos View',
        value: '/photos/:id',
      },
    },
    todos: {
      label: 'Todos',
      value: '/todos',
      view: {
        label: 'View Todo',
        value: '/todos/:id',
      },
    },
  },
}

export default routes
