<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Lane from '@/Components/Lane.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-0">
            <div class="sm:px-0 lg:px-0">
                <div class="bg-gray-300 dark:bg-gray-900 h-screen flex flex-col">
                    <Lane></Lane>
                </div>
            </div>
        </div>
    </AppLayout>
</template>