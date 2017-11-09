import matrix from '@/routes/matrix'
import dot from '@/routes/dot'

export const routes = [
  { path: '/', component: matrix, name: 'matrix' },
  { path: '/:id', component: dot, name: 'dot' },
]
