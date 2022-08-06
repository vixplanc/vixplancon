<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Modules from "@/Components/Modules.vue";
</script>

<template>
    <AppLayout title="Home">
        <template #header>
            <h2 class="font-bold text-xl text-white leading-tight">Módulos</h2>
        </template>
        <div
            class="bg-gradient-to-tr from-gray-00 via-gray-900 to-black"
        >
            <Modules />
        </div>
    </AppLayout>
</template>

<style scoped="">
.back{
    background-image:  radial-gradient(at center center, rgb(17, 24, 39), rgb(15, 23, 42), rgb(23, 23, 23));
}
</style>
