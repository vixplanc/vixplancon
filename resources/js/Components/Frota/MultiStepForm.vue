<script setup>
import { useMultiStepForm } from "@/utils/schemas/useMultiStepForm";
import {onMounted} from 'vue'
import { getNode } from '@formkit/core'

const { currentStep, setCurrentStep, schema, form, stepPlugin, steps } = useMultiStepForm();
onMounted(() => {
    console.log(getNode('multistepform'));
console.log(    steps);
});
</script>

<template>
    <div class="grid justify-items">
        <FormKit type="group" id="multistepform" :plugins="[stepPlugin]" v-model="form">
            <!-- <template #default="{ state: { valid } }"> -->
                <div class="form-control m-3 w-96 justify-items-center">
                <div v-if="!valid" class="bg-error">
                    Your account details are not complete!
                </div>
                    <ul class="steps">
                        <li
                            v-for="(step, index) in schema"
                            :key="index"
                            :class="[
                                'step cursor-pointer',
                                { 'step-accent': step.isValidated },
                            ]"
                            @click="setCurrentStep(step.description)"
                        >
                            {{ step.description }}
                        </li>
                    </ul>
                    <section
                        v-for="step in schema" :key="step.description"
                        v-show="currentStep === step.description"
                    >
                        <FormKitSchema :schema="step.formInputs" />
                    </section>
                </div>
            <!-- </template> -->
        </FormKit>
        {{ form }}
    </div>
</template>

<!-- <button class="btn hover:text-white btn-primary max-w-xl">
                    Iniciar
                </button> -->
