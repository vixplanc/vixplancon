<script setup>
import { ref } from "vue";
import { cards } from "../helpers/modulos.js";
const url = ref("http://localhost:8000");
</script>

<template>
    <div
        class="flex flex-wrap bg-transparent gap-4 justify-center min-w-[30%] p-7"
    >
        <div
            v-for="card in cards"
            :key="id"
            class="card group w-72 bg-gradient-to-r dark:from-slate-800 shadow dark:shadow-gray-200 shadow-gray-900  hover:border-gray-400 hover:border dark:text-white rounded-md ease-in transition ease-in-out delay-50 hover:scale-105 duration-300"
        >
            <label class="swap swap-flip text-6xl">
                <!-- this hidden checkbox controls the state -->
                <input type="checkbox" />

                <div class="swap-on px-4 pt-6">
                    <div class="card-body max-w-64 max-h-36 align-middle">
                        <p
                            class="text-sm text-justify overflow-hidden"
                        >
                            ljsdhfsfkjçsakdjfçlkasdjf çlkjasdçlkfjasçlkdfjaçlskdjfç laksdjfçlaksjdfçlkajsdçlfkjasçldkfjkjs
                            kjfsdaljfhlkasjdhfkl jahsdlfkjhsadlkfjh
                            alskdjfhlkjsadhflkasjd
                            ljsdhfsfkjçsakdjfçlkasdjf çlkjasdçlkfjasçlkdfjaçlskdjfç laksdjfçlaksjdfçlkajsdçlfkjasçldkfjkjs
                            dkfl
                        </p>
                    </div>
                </div>
                <div class="swap-off">
                    <figure class="px-4 pt-6">
                        <img
                            :src="`../../images/` + card.img"
                            alt="Shoes"
                            class="rounded-lg h-40"
                        />
                    </figure>
                </div>
            </label>

            <div class="card-body items-center text-center">
                <span class="card-title p-0 m-0 text-4xl">
                    {{ card.name }}
                    <span
                        v-if="card.disabled"
                        class="badge badge-md badge-success"
                        >✓</span
                    >
                </span>

                <div
                    class="card-actions"
                >
                    <a
                        class="btn btn-sm btn-secondary rounded-md w-full ease-in transition ease-in-out delay-50 hover:scale-110 duration-300"
                        :href="`${url}/${card.uri_crud}`"
                    >
                        <span class="mx-4">Painel de Gerenciamento</span>
                    </a>
                    <button
                        class="btn btn-sm btn-primary rounded-md w-full ease-in transition ease-in-out delay-50 hover:scale-110 duration-300"
                    >
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
