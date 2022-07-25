<script setup>
  import schema from "@/utils/schemas/tipo_solicitacao.js";
</script>

<template>
  <div class="grid justify-items-center">
    <ul class="steps">
      <li class="step step-primary" data-content="✓">Agendamento</li>
      <li class="step step-accent">Equipamento</li>
      <li class="step">Concluir</li>
    </ul>
    <!-- <span class="text-lg">Nova solicitação</span> -->
    <div class="form-control m-3 w-96 justify-items-center">
      <FormKit type="group" v-model="form">
        <FormKitSchema :schema="schema" />
        <button class="btn hover:text-white btn-primary max-w-xl">Iniciar</button>
      </FormKit>
    </div>
  </div>
</template>
