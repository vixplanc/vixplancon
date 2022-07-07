<script setup>
import Modal from "@/Jetstream/Modal";
import { ref, reactive, watch } from "vue";
import API from "../../../Services/api";
import { useStore } from "vuex";

const api = new API("api/equipamento");
const isOpen = ref(props.show);
const emit = defineEmits(["close"]);
const processing = ref(false);
const store = useStore();
const form = reactive(props.formData);

const props = defineProps({
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
    formData: {
        type: Object,
        default: {},
    },
});

const close = () => {
    emit("close");
};

const handleCreateSubmit = () => {
    processing.value = true;
    api.store(form)
        .then(() => {
            processing.value = false;
            close();
            alert("Inserido");
        })
        .catch((error) => {
            processing.value = false;
            console.log("erro");
        });
};

const handleUpdateSubmit = () => {
    processing.value = true;
    api.update(form)
        .then(() => {
            processing.value = false;
            close();
            alert("Atualizado");
        })
        .catch((error) => {
            processing.value = false;
            console.log("erro");
        });
};

const handleDeleteSubmit = () => {
    processing.value = true;
    api.remove(form)
        .then(() => {
            processing.value = false;
            close();
            alert("Deletado");
        })
        .catch((error) => {
            processing.value = false;
            console.log("erro");
        });
};
const testes = reactive(props.formData)
watch(
    [
        () => props.show,
        () => {
            isOpen.value = props.show;
            console.log(props.formData);

        },
         { deep: true }
    ],
    [
        () => testes,
        () => {
            // form = props.formData;
            console.log("trocou");
            console.log(testes);
            console.log(form);
        },
         { deep: true }
    ],
    { deep: true }
);

// watch(() => testes,
//         () => {
//             // form = props.formData;
//             console.log("trocou");
//             console.log(testes);
//             console.log(form);
//         },
//          { deep: true })

// watch(
//     () => store.getters.getModalShow,
//     () => {
//         if (store.getters.getModalMode === "update" || "delete") {
//             Object.keys(form).forEach((element) => {
//                 form[element] = store.getters.getModalFormData[element];
//             });
//         } else if (store.getters.getModalMode === "create") {
//             Object.keys(form).forEach((element) => {
//                 form[element] = "";
//             });
//         }
//         isOpen.value = store.getters.getModalShow;
//     }
// );
</script>

<template>
    <Modal
        :show="isOpen"
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
                <div class="mt-4 text-center">
                    <h3 class="text-lg">
                        <slot name="title" />
                    </h3>
                    <div v-if="store.getters.getModalMode === 'delete'">
                        <h3>Deseja remover o item?</h3>
                    </div>
                    <div v-else class="mt-2">
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Modelo</span>
                            </label>
                            <input
                                type="text"
                                placeholder="Informe o nome do módulo"
                                class="input input-bordered w-full"
                                v-model="form.modelo_id"
                            />
                            <label class="label">
                                <span class="label-text">Denominacao</span>
                            </label>
                            <input
                                type="text"
                                placeholder="Informe o link da aplicação"
                                class="input input-bordered w-full"
                                v-model="form.denominacao"
                            />
                            <label class="label">
                                <span class="label-text">Placa</span>
                            </label>
                            <input
                                type="text"
                                placeholder="Informe Link de Gerenciamento"
                                class="input input-bordered w-full"
                                v-model="form.placa"
                            />

                            <label class="label">
                                <span class="label-text">Chassi</span>
                            </label>
                            <input
                                class="textarea input-bordered w-full"
                                placeholder="Informe a descrição do módulo"
                                v-model="form.chassi"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
            <button class="btn m-1 btn-active btn-outline" @click="close">
                Cancelar
            </button>

            <button
                v-if="store.getters.getModalMode === 'create'"
                class="btn m-1"
                @click="handleCreateSubmit()"
            >
                Confirmar
            </button>
            <button
                v-if="store.getters.getModalMode === 'update'"
                class="btn m-1"
                @click="handleUpdateSubmit()"
            >
                Confirmar
            </button>
            <button
                v-if="store.getters.getModalMode === 'delete'"
                class="btn btn-error hover:bg-red-600 text-white m-1"
                @click="handleDeleteSubmit()"
            >
                Confirmar
            </button>
            <!-- <slot name="footer" /> -->
        </div>
    </Modal>
</template>
