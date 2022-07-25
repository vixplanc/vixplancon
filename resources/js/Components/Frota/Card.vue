<script setup>
  import { ref } from "vue";

  const cards = ref([
    {
      id: "000",
      num_doc: "9945946/9958690/4438459",
      equipamentos: ["Empilhadeira", "Guindaste"],
      data_solicitacao: "15/10/2023",
      data_necessidade: "25/12/2023",
    },
    {
      id: "001",
      num_doc: "9945946",
      equipamentos: ["Empilhadeira"],
      data_solicitacao: "15/10/2023",
      data_necessidade: "25/12/2023",
    },
    {
      id: "001",
      num_doc: "9945946",
      equipamentos: ["Empilhadeira"],
      data_solicitacao: "15/10/2023",
      data_necessidade: "25/12/2023",
    },
  ]);

  const props = defineProps({
    cards: {
      type: Object,
      default: {
        id: "000",
        equipamentos: ["Empilhadeira", "Guindaste"],
        data_solicitacao: "15/10/2023",
        data_necessidade: "25/12/2023",
      },
    },
  });
</script>

<template>
  <div class="flex w-full">
    <div class="relative w-full">
      <div class="grid m-4">
        <span class="text-lg">Minhas solicitações</span>
        <button
          class="btn bg-lime-400 text-lime-900 absolute inset-y-0 right-0 hover:scale-110 hover:bg-lime-500"
        >
          Adicionar
        </button>
      </div>
      <div>
        <div v-for="card in cards" :key="id" class="card my-2 glass cursor-pointer">
          <div class="card-body p-2 text-center">
            <div class="card-title">{{ `ID: ${card.id}` }}</div>
            <div class="flex flex-wrap space-x-4">
              <span>{{ `DATA SOLICITAÇÃO: ${card.data_solicitacao}` }}</span>
              <span>{{ `DATA NECESSIDADE: ${card.data_necessidade}` }}</span>
              <div v-for="(item, index) in card.equipamentos" :key="index">
                <span>{{ item }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
