<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Modulos from "@/Components/Modulos.vue";
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Módulos
      </h2>
    </template>

    <div class="py-10">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <Modulos />
      </div>
    </div>
  </AppLayout>
</template>
