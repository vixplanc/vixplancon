<script>
  import schema from "@/utils/schemas/solicitacao.js";
</script>

<template>
  <div class="m-3 w-full">
    <span class="text-lg grid justify-items-center">Nova solicitação</span>
    <div class="form-control">
      <FormKit type="group" v-model="form">
        <FormKitSchema :schema="schema" />
        <button class="btn hover:text-white btn-primary max-w-xl">Iniciar</button>
      </FormKit>
    </div>
  </div>
</template>

