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
  <div class="flex flex-col w-full lg:flex-row">
    <div class="m-3 w-full">
      <span class="text-lg m-2">Minhas solicitações</span>
      <button class="btn bg-lime-400 text-lime-900">Adicionar</button>
      <div v-for="card in cards" :key="id" class="card glass m-1 cursor-pointer">
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
</template>
