<script setup>
import Modal from "../Jetstream/Modal";
import { ref } from "vue";
const moduleManage = ref(true);
const emit = defineEmits(["close"]);

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
                        <slot name="content" />
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
            <button class="btn m-1 btn-active btn-outline" @click="close">
                Cancelar
            </button>

            <button class="btn m-1" @click="HandleCreateModule">
                Confirmar
            </button>
            <!-- <slot name="footer" /> -->
        </div>
    </Modal>
</template>

<!-- <script>


</script> -->
