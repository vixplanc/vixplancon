<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";


import { ref } from "vue";
import StepForm from "../Components/Frota/StepForm.vue";


</script>

<template>
    <AppLayout title="Frota">
        <template #header>
            <h2 class="font-bold text-xl text-white leading-tight">Frota</h2>
        </template>

        <div class="bg-grey-900">
            <div class="">
                <StepForm/>
            </div>
        </div>
    </AppLayout>
</template>
