<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Lane from "@/Components/Lane.vue";
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-bold text-xl text-lime-900 leading-tight">
        Gerenciamento de Leads
      </h2>
    </template>
    <div class="pt-10 m-0">
      <div class="sm:px-0 lg:px-0">
        <div class="dark:bg-gray-900 h-screen flex flex-col">
          <Lane></Lane>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
