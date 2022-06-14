<template>
  <Draggable v-if="item">
    <div
      class="cursor-grab my-1 mx-2 shadow-md bg-gray-100 dark:bg-gray-800 hover:border-2 border-primary rounded-lg"
    >
      <div
        v-if="item.loading"
        class="flex space-x-2 bg-gray-50 text-gray-900 dark:text-gray-200 dark:bg-gray-900 px-4 py-2 rounded-t-lg"
      >
        <svg
          class="animate-spin -ml-1 mr-3 h-5 w-5 text-dark"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
        >
          <circle
            class="opacity-25"
            cx="12"
            cy="12"
            r="10"
            stroke="currentColor"
            stroke-width="4"
          ></circle>
          <path
            class="opacity-75"
            fill="currentColor"
            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
          ></path>
        </svg>
        <span>Processing...</span>
      </div>
      <div class="p-2 space-y-2">
        <div
          class="rounded-lg bg-primary p-2 w-max h-max inline-block box-content">
          {{ emoji }}
        </div>
        <p class="text-sm">{{ item.data }}</p>
      </div>
    </div>
  </Draggable>
</template>

<script>
import { getRandomEmoji } from "../helpers/index";
import { Draggable } from "vue3-smooth-dnd";
export default {
  name: "Card",
  components: { Draggable},
  data() {
    return {
      emoji: getRandomEmoji(),
    };
  },
  props: {
    item: Object,
  },
};
</script>
