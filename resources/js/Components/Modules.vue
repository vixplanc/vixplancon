<template>
  <ModalModule>
    <template #title> Adicionar módulo </template>

    <template #content> </template>
  </ModalModule>
  <div
    class="flex flex-wrap gap-6 dark:bg-gray-900 dark:text-gray-900 justify-center min-w-[30%]"
  >
    <div
      v-for="card in cards"
      :key="id"
      class="card w-80 bg-gradient-to-b from-transparent to-gray-100 bg-base-100 shadow-xl"
    >
      <figure class="px-4 pt-6">
        <img :src="`../../images/` + card.img" alt="Shoes" class="rounded-lg h-40" />
      </figure>

      <div class="card-body items-center text-center">
        <span class="card-title p-0 m-0">
          {{ card.name }}
          <span v-if="card.disabled" class="badge badge-md badge-success">✓</span>
        </span>
        <p>{{ card.description }}</p>
        <div class="rating flex justify-center">
          <input type="radio" name="rating-4" class="mask mask-star-2 bg-gray-300" />
          <input
            type="radio"
            name="rating-4"
            class="mask mask-star-2 bg-gray-300"
            checked
          />
          <input type="radio" name="rating-4" class="mask mask-star-2 bg-gray-300" />
          <input type="radio" name="rating-4" class="mask mask-star-2 bg-gray-300" />
          <input type="radio" name="rating-4" class="mask mask-star-2 bg-gray-300" />
        </div>

        <div class="card-actions">
          <a
            class="btn btn-sm btn-outline hover:bg-lime-400 hover:text-gray-900 w-full"
            :href="`${url}/${card.uri_crud}`"
          >
            <span class="mx-4">Painel de Gerenciamento</span>
          </a>
          <button class="btn btn-sm hover:bg-lime-400 hover:text-gray-900 w-full">
            <span class="mx-4">Entrar</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
              />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
  import { ref } from "vue";
  import { cards } from "../helpers/modulos.js";
  const url = ref("http://localhost:8000");
</script>
