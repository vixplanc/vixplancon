<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Lane from '@/Components/Lane.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="py-0">
            <div class="sm:px-0 lg:px-0">
                <div class="bg-gray-300 dark:bg-gray-900 h-screen flex flex-col">
                    <Lane></Lane>
                </div>
            </div>
        </div>
    </AppLayout>
</template>