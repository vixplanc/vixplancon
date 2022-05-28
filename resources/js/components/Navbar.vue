<template>
  <div class="flex justify-between p-4 shadow-lg bg-gray-50 dark:bg-gray-800">
    <div class="flex">
      <a href="#" class="flex hover:text-primary text-2xl font-bold">
        <div class="mx-0 sm:mx-3">
          <button
            @click="sideBarToggle"
            class="menu-toggle cursor-pointer text-gray-500 align-middle text-primary focus:outline-none hover:text-secondary"
            type="button"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </button>
        </div>
      </a>

      <a href="#" class="flex hover:text-primary text-2xl font-bold">
        <span class="">Gerenciamento de Leads</span>
      </a>
    </div>
    <div class="flex space-x-6 text-lg">
      <a href="#" class="flex space-x-2 items-center hover:text-primary">
        <CodeIcon class="h-6 w-6"></CodeIcon>
        <span>link1</span>
      </a>
      <a href="#" class="flex space-x-2 items-center hover:text-primary">
        <CodeIcon class="h-6 w-6"></CodeIcon>
        <span>link2</span>
      </a>
      <ThemeMode></ThemeMode>
    </div>
  </div>
</template>

<script>
import { ref, computed } from "vue";
import { useStore } from "vuex";
import { CodeIcon, HandIcon } from "@heroicons/vue/outline";
import ThemeMode from "@/components/ThemeMode.vue";

const navigation = [
  {
    name: "showcase",
    links: [
      { name: "LeadsManage", href: "/" },
      { name: "Form elements", href: "/form" },
    ],
  },
];

export default {
  components: { ThemeMode, CodeIcon, HandIcon },
  setup() {
    const store = useStore();
    const theme = computed(() => store.getters.theme);
    const sideBarToggle = () => {
      let sidenav =
        store.state.sidebarToggle.sidebarToggleProperties.isSideNavOpen;

      if (sidenav == false) {
        store.commit("sidebarToggle/toggleSidebarProperties");
      } else {
        store.commit("sidebarToggle/toggleSidebarProperties");
      }
    };
    return {
      theme,
      sideBarToggle,
    };
  },
};
</script>

<style></style>
