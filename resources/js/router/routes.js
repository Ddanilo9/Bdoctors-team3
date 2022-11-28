import Home from '../pages/Home.vue';
import AdvancedSearch from '../pages/AdvancedSearch.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
  },
  {
    path: '/search',
    name: 'AdvancedSearch',
    component: AdvancedSearch,
    props: true,
  }
]

export default routes;
