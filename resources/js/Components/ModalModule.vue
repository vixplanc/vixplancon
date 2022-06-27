<script setup>
import Modal from "../Jetstream/Modal";
import { ref, reactive } from "vue";
const moduleManage = ref(false);
const emit = defineEmits(["close"]);
const processing = ref(false)

defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: "2xl",
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const close = () => {
    moduleManage.value = false;
};

function HandleImageModuleUpload(){
    document.getElementById("module_image_upload").click()
}

const handleSubmit = () => {
  processing.value = true;
  axios
    .post("api/leads/adicionar", {
      name: form.nome,
      appLink: form.link_gerenciamento,
      manageLink: form.link_gerenciamento,
      description: form.descricao
    })
    .then(() => {
      processing.value = false;
    //   leadText.value = ""
    })
    .catch((error) => {
      processing.value = false;
      console.log("erro");
    });
//   store.commit("toggleLeadShow");
};

const form = reactive({
   descricao:"",
   link_gerenciamento:"",
   link_aplicacao:"",
   nome:"",
})

</script>

<template>
    <Modal
        :show="moduleManage"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <label
                @click="close"
                class="btn btn-sm btn-square btn-outline btn-error absolute right-2 top-2"
                >✕</label
            >
            <div class="">
                <div class="mt-3 text-center">
                    <h3 class="text-lg">
                        <slot name="title" />
                    </h3>

                    <div class="mt-2">
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Nome do módulo?</span>
                            </label>
                            <input
                                type="text"
                                placeholder="Informe o nome do módulo"
                                class="input input-bordered w-full"
                                v-model="form.nome"
                            />
                            <label class="label">
                                <span class="label-text"
                                    >Link da Aplicação</span
                                >
                            </label>
                            <input
                                type="text"
                                placeholder="Informe o link da aplicação"
                                class="input input-bordered w-full"
                                v-model="form.link_aplicaçao"
                            />
                            <label class="label">
                                <span class="label-text"
                                    >Link da Gerenciamento</span
                                >
                            </label>
                            <input
                                type="text"
                                placeholder="Informe Link de Gerenciamento"
                                class="input input-bordered w-full"
                                v-model="form.link_gerenciamento"
                            />

                            <label class="label">
                                <span class="label-text"
                                    >Descrição do Módulo?</span
                                >
                            </label>
                            <textarea
                                class="textarea input-bordered w-full"
                                placeholder="Informe a descrição do módulo"
                                v-model="form.descricao"
                            ></textarea>
                            <input
                                id="module_image_upload"
                                type="file"
                                hidden

                            />
                            <button
                                class="btn btn-square btn-outline btn-primary w-full mt-3"
                                @click="HandleImageModuleUpload"
                            >
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
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
            <button class="btn m-1 btn-active btn-outline" @click="close">
                Cancelar
            </button>

            <button class="btn m-1" @click="handleSubmit">
                Confirmar
            </button>
            <!-- <slot name="footer" /> -->
        </div>
    </Modal>
</template>

<!-- <script>


</script> -->
