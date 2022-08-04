<script setup>
import { useMultiStepForm } from "@/utils/schemas/useMultiStepForm";
const { currentStep, setCurrentStep, schema, form } =
    useMultiStepForm();
</script>

<template>
    <div class="grid justify-items">
        <ul class="steps">
            <li
                v-for="step in schema"
                :key="step.description"
                :class="[
                    'step cursor-pointer',
                    { 'step-accent': step.isValidated },
                ]"
                @click="setCurrentStep(step.description)"
            >
                {{ step.description }}
            </li>
        </ul>
        <div class="form-control m-3 w-96 justify-items-center">
            <FormKit type="group" v-model="form">
                <section v-for="step in schema" v-show="currentStep === step.description">
                    <FormKitSchema
                        :schema="step.formInputs" 
                    />
                </section>
            </FormKit>

            <!-- <button class="btn hover:text-white btn-primary max-w-xl">
                    Iniciar
                </button> -->
        </div>
        {{ form }}
    </div>
</template>
