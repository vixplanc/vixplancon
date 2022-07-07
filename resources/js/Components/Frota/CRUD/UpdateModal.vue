<!-- <script setup>
import Modal from "@/Jetstream/Modal";
import { ref, reactive, watch} from "vue";
import API from "../../../Services/api"

const api = new API("api/equipamento")
const moduleManage = ref(props.show);
const emit = defineEmits(["close"]);
const processing = ref(false)

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
    form:{
        type: Object,
        default: {}
    }

});

const close = () => {
    emit('close');
};

const handleSubmit = () => {
    processing.value = true;
  api
    .update(form)
    .then(() => {
        processing.value = false;
        alert("Atualizado")
    })
    .catch((error) => {
        processing.value = false;
        console.log("erro");
    });
};

const form = reactive({
    chassi:"",
    placa:"",
    denominacao:"",
    modelo_id:"",
    id:"",
})

watch(() => props.show, () => {
    moduleManage.value = props.show
});

watch(() => props.form, () => {
    form.value = props.form
});

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
                                <span class="label-text">Modelo</span>
                            </label>
                            <input
                                type="text"
                                placeholder="Informe o nome do módulo"
                                class="input input-bordered w-full"
                                v-model="form.modelo_id"
                            />
                            <label class="label">
                                <span class="label-text"
                                    >Denominacao</span
                                >
                            </label>
                            <input
                                type="text"
                                placeholder="Informe o link da aplicação"
                                class="input input-bordered w-full"
                                v-model="form.denominacao"
                            />
                            <label class="label">
                                <span class="label-text"
                                    >Placa</span
                                >
                            </label>
                            <input
                                type="text"
                                placeholder="Informe Link de Gerenciamento"
                                class="input input-bordered w-full"
                                v-model="form.placa"
                            />

                            <label class="label">
                                <span class="label-text"
                                    >Chassi</span
                                >
                            </label>
                            <input
                                class="textarea input-bordered w-full"
                                placeholder="Informe a descrição do módulo"
                                v-model="form.chassi"
                            >
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
            <slot name="footer" />
        </div>
    </Modal>
</template>
 -->
