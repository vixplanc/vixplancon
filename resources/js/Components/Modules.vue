<script setup></script>

<template>
  <div
    class="flex flex-wrap gap-6  dark:bg-gray-900 dark:text-gray-900 justify-center min-w-[30%]"
  >
    <div
      v-for="card in cards"
      :key="id"
      class="card w-80 bg-gradient-to-b from-transparent to-gray-100 bg-base-100 shadow-xl"
    >
      <figure class="px-4 pt-6">
        <img
          :src="`../../images/` + card.img"
          alt="Shoes"
          class="rounded-lg h-40"
        />
      </figure>
      <div class="card-body items-center text-center">
        <h2 class="card-title">{{ card.name }}</h2>
        <p>{{ card.description }}</p>
        <div class="card-actions">
          <button class="btn btn-sm btn-outline hover:bg-lime-400 hover:text-gray-900 w-full">
           <span class="mx-4">Indicadores</span>
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
                d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"
              />
            </svg>
          </button>
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
    <!-- <div class="card w-96 bg-base-100 shadow-xl  ">
      <figure class="px-10 pt-10">
        <img
          src="https://api.lorem.space/image/shoes?w=400&h=225"
          alt="Shoes"
          class="rounded-lg"
        />
      </figure>
      <div class="card-body items-center text-center">
        <h2 class="card-title">Título do Módulo</h2>
        <p>Pequeno texto descritivo sobre o módulo</p>
        <div class="card-actions">
          <button class="btn">Entrar</button>
        </div>
      </div>
    </div>
    <div class="card w-96 bg-base-100 shadow-xl ">
      <figure class="px-10 pt-10">
        <img
          src="https://api.lorem.space/image/game?w=400&h=225"
          alt="Shoes"
          class="rounded-lg"
        />
      </figure>
      <div class="card-body items-center text-center">
        <h2 class="card-title">Título do Módulo</h2>
        <p>Pequeno texto descritivo sobre o módulo</p>
        <div class="card-actions">
          <button class="btn">Entrar</button>
        </div>
      </div>
    </div>
    <div class="card w-96 bg-base-100 shadow-xl  ">
      <figure class="px-10 pt-10">
        <img
          src="https://api.lorem.space/image/watch?w=400&h=225"
          alt="Shoes"
          class="rounded-lg"
        />
      </figure>
      <div class="card-body items-center text-center">
        <h2 class="card-title">Título do Módulo</h2>
        <p>Pequeno texto descritivo sobre o módulo</p>
        <div class="card-actions">
          <button class="btn">Entrar</button>
        </div>
      </div>
    </div>
    <div class="card w-96 bg-base-100 shadow-xl ">
      <figure class="px-10 pt-10">
        <img
          src="https://api.lorem.space/image/face?w=400&h=225"
          alt="Shoes"
          class="rounded-lg"
        />
      </figure>
      <div class="card-body items-center text-center">
        <h2 class="card-title">Título do Módulo</h2>
        <p>Pequeno texto descritivo sobre o módulo</p>
        <div class="card-actions">
          <button class="btn">Entrar</button>
        </div>
      </div>
    </div>
    <div class="card w-96 bg-base-100 shadow-xl  ">
      <figure class="px-10 pt-10">
        <img
          src="https://api.lorem.space/image/book?w=400&h=225"
          alt="Shoes"
          class="rounded-lg"
        />
      </figure>
      <div class="card-body items-center text-center">
        <h2 class="card-title">Título do Módulo</h2>
        <p>Pequeno texto descritivo sobre o módulo</p>
        <div class="card-actions">
          <button class="btn">Entrar</button>
        </div>
      </div>
    </div>
      <div class="card w-96 bg-base-100 shadow-xl  ">
      <figure class="px-10 pt-10">
        <img
          src="https://api.lorem.space/image/book?w=400&h=225"
          alt="Shoes"
          class="rounded-lg"
        />
      </figure>
      <div class="card-body items-center text-center">
        <h2 class="card-title">Título do Módulo</h2>
        <p>Pequeno texto descritivo sobre o módulo</p>
        <div class="card-actions">
          <button class="btn">Entrar</button>
        </div>
      </div>
    </div> -->
  </div>
</template>

<script setup>
import { cards } from "../helpers/modulos.js";
console.log(cards);
</script>
