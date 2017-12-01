import matrix from '@/routes/matrix'
import dot from '@/routes/dot'
import xAxis from '@/routes/x-axis'
import yAxis from '@/routes/y-axis'

export const routes = [
  { path: '/', component: matrix, name: 'matrix' },
  { path: '/krydspunkt/:id', component: dot, name: 'dot' },
  { path: '/omraade/:id', component: xAxis, name: 'x-axis' },
  { path: '/teknologi/:id', component: yAxis, name: 'y-axis' },
]
