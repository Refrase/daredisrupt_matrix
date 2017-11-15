import matrix from '@/routes/matrix'
import dot from '@/routes/dot'
import xAxis from '@/routes/x-axis'
import yAxis from '@/routes/y-axis'

export const routes = [
  { path: '/', component: matrix, name: 'matrix' },
  { path: '/:id', component: dot, name: 'dot' },
  { path: '/kommunale-omraader/:id', component: xAxis, name: 'x-axis' },
  { path: '/teknologiske-temaer/:id', component: yAxis, name: 'y-axis' },
]
