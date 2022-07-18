<script setup>
import { ref, watch, computed, onMounted, onUnmounted } from "vue";
const modeProps = {
  create: {
    color: "success",
    title: "Adicionar",
    subtitle: "Você está adicionando um novo item",
  },
  update: {
    color: "primary",
    title: "Editar",
    subtitle: "Você está editando o item de ID: ",
  },
  delete: {
    color: "danger",
    title: "Excluir",
    subtitle: "Você tem cereteza que deseja remover o item de ID:",
  },
};

const maxWidthClass = computed(() => {
  return {
    sm: "sm:max-w-sm",
    md: "sm:max-w-md",
    lg: "sm:max-w-lg",
    xl: "sm:max-w-xl",
    xxl: "sm:max-w-2xl",
  }[props.maxWidth];
});

const form = ref(props.formData);
const mode = ref(props.mode);
const schema = ref(props.formSchema);

const emits = defineEmits(["close", "save"]);
const props = defineProps({
  show: {
    type: Boolean,
    default: false,
  },
  maxWidth: {
    type: String,
    default: "lg",
  },
  formData: {
    type: Object,
    default: {},
  },
  mode: {
    type: String,
    default: "create",
  },
  formSchema: {
    type: Array,
    default: [],
  },
});

const close = () => {
  emits("close");
};

const closeOnEscape = (e) => {
  if (e.key === "Escape" && props.show) {
    emits("close");
  }
};

watch(
  () => props.show,
  () => {
    if (props.show) {
      document.body.style.overflow = "hidden";
      mode.value = props.mode;
      if (props.mode != "create") {
        form.value = props.formData;
      }
    } else {
      document.body.style.overflow = null;
    }
  }
);

watch(
  () => props.formSchema,
  () => {
    schema.value = props.formSchema;
  }
);

onMounted(() => document.addEventListener("keydown", closeOnEscape));

onUnmounted(() => {
  document.removeEventListener("keydown", closeOnEscape);
  document.body.style.overflow = null;
});
</script>

<template>
  <teleport to="body">
    <transition leave-active-class="duration-200">
      <div
        v-show="show"
        class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
        scroll-region
      >
        <transition
          enter-active-class="ease-out duration-300"
          enter-from-class="opacity-0"
          enter-to-class="opacity-100"
          leave-active-class="ease-in duration-200"
          leave-from-class="opacity-100"
          leave-to-class="opacity-0"
        >
          <div
            v-show="show"
            class="fixed inset-0 transform transition-all"
            @click="close"
          >
            <div class="absolute inset-0 bg-gray-500 opacity-75" />
          </div>
        </transition>

        <transition
          enter-active-class="ease-out duration-300"
          enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          enter-to-class="opacity-100 translate-y-0 sm:scale-100"
          leave-active-class="ease-in duration-200"
          leave-from-class="opacity-100 translate-y-0 sm:scale-100"
          leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
          <div
            v-show="show"
            class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto"
            :class="maxWidthClass"
          >
            <div v-if="show">
              <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <label
                  @click="emits('close')"
                  class="btn btn-sm btn-square hover:text-white btn-outline btn-error absolute right-2 top-2"
                  >✕</label
                >
                <div class="mt-3 w-full">
                  <!-- Header -->
                  <h3 class="text-lg">
                    <slot name="title" />
                  </h3>
                  <div class="m-1 text-center">
                    {{ modeProps[mode]["subtitle"] }}
                    <div v-if="mode != 'create'" class="badge badge-lg">
                      {{ form.id }}
                    </div>
                  </div>
                  <!-- Content -->
                  <div v-if="mode != 'delete'" class="p-2 max-h-96 overflow-auto">
                    <FormKit type="group" v-model="form">
                      <FormKitSchema :schema="schema" />
                    </FormKit>
                  </div>
                </div>
              </div>

              <!-- Footer -->
              <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                <button
                  class="btn btn-sm hover:text-white btn-outline btn-error"
                  @click="emits('close')"
                >
                  Cancelar
                </button>

                <button
                  class="btn btn-sm bg-lime-500 border-lime-600 hover:bg-lime-700 mx-1"
                  @click="
                    emits('save', {
                      operationType: mode,
                      payload: form,
                    })
                  "
                >
                  Confirmar
                </button>
                <!-- <slot name="footer" /> -->
              </div>
            </div>
          </div>
        </transition>
      </div>
    </transition>
  </teleport>
</template>
