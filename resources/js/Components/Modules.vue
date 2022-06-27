<template>
    <ModalModule>
        <template #title> Adicionar módulo </template>

        <template #content>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Nome do módulo?</span>
                </label>
                <input
                    type="text"
                    placeholder="Informe o nome do módulo"
                    class="input input-bordered w-full"
                />
                <label class="label">
                    <span class="label-text">Link de Gerenciamento</span>
                </label>
                <input
                    type="text"
                    placeholder="Informe o link da aplicação"
                    class="input input-bordered w-full"
                />
                <label class="label">
                    <span class="label-text">Link da Aplicação</span>
                </label>
                <input
                    type="text"
                    placeholder="Informe Link de Gerenciamento"
                    class="input input-bordered w-full"
                />

                <label class="label">
                    <span class="label-text">Descrição do Módulo?</span>
                </label>
                <textarea
                    class="textarea input-bordered w-full"
                    placeholder="Informe a descrição do módulo"
                ></textarea>
                <input id="module_image_upload" type="file" hidden />
                <button class="btn btn-square btn-outline btn-primary w-full mt-3" @click="HandleImageModuleUpload">
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
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                    </svg>
                    Carregar Imagem
                </button>
            </div>
        </template>
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
                    <button
                        class="btn btn-sm btn-outline hover:bg-lime-400 hover:text-gray-900 w-full"
                    >
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
                    <button
                        class="btn btn-sm hover:bg-lime-400 hover:text-gray-900 w-full"

                    >
                        <span class="mx-4" >Entrar</span>
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
import ModalModule from "../Components/ModalModule";
function HandleImageModuleUpload(){
    document.getElementById("module_image_upload").click()
}

const handleSubmit = () => {
//   processing.value = true;
//   console.log(processing.value);
  axios
    .post("api/leads/adicionar", {
      name: leadText.value,
      lane_id: 1,
    })
    .then(() => {
      processing.value = false;
      leadText.value = ""
    })
    .catch((error) => {
      console.log("erro");
    });
  store.commit("toggleLeadShow");
};
</script>
