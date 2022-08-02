<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Modules from "@/Components/Modules.vue";
</script>

<template>
  <AppLayout title="Home">
    <template #header>
      <h2 class="font-bold text-xl text-white leading-tight">
        Módulos
      </h2>
    </template>

    <div class="py-10">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <Modules />
      </div>
    </div>
  </AppLayout>
</template>
