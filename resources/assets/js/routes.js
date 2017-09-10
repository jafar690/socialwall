import DashView from './components/Dash.vue'




// Routes
const routes = [
  {
    path: '/',
    component: DashView,
    children: [
      {
        path: 'dashboard',
        alias: '',
        component: DashboardView,
        name: 'Dashboard',
        meta: {description: 'Overview of environment'}
      }, 
    ]
  }, {
    // not found handler
    path: '*',
    component: NotFoundView
  }
]

export default routes
