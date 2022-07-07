import { createStore } from "vuex";

// modules
import theme from './modules/theme'
import sidebarToggle from './modules/sidebarToggle'
import equipamentos from "./modules/equipamentos"

const store = createStore({
  modules: {
    theme,
    sidebarToggle,
    equipamentos
  },
});

export default store;
