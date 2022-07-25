<script setup>
  import AppLayout from "@/Layouts/AppLayout.vue";
  import EquipamentoForm from "@/Components/Frota/ConcluirForm.vue";
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-bold text-xl text-lime-900 leading-tight">Frota</h2>
    </template>

    <div class="py-10 bg-grey-900">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <EquipamentoForm />
      </div>
    </div>
  </AppLayout>
</template>
