import { createStore } from "vuex";

// modules
import theme from './modules/theme'
import sidebarToggle from './modules/sidebarToggle'

const store = createStore({
  modules: { 
    theme, 
    sidebarToggle 
  },
});

export default store;