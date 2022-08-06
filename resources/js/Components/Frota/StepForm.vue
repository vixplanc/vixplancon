<script setup>
import useSteps from "@/utils/schemas/useSteps.js";
import { useFrotaSchema } from "@/utils/schemas/useFrotaSchema.js";
const { schema, camel2title, axios } = useFrotaSchema();
const { steps, visitedSteps, activeStep, setStep, stepPlugin } = useSteps();

// NEW: helper function to check step validity on step blur
const checkStepValidity = (stepName) => {
    return (
        (steps[stepName].errorCount > 0 || steps[stepName].blockingCount > 0) &&
        visitedSteps.value.includes(stepName)
    );
};

const submitApp = async (formData, node) => {
    try {
        const res = await axios.post(formData);
        node.clearErrors();
        alert("Your application was submitted successfully!");
    } catch (err) {
        node.setErrors(err.formErrors, err.fieldErrors);
    }
};
</script>

<template>
    <FormKit
        type="form"
        #default="{ value, state: { valid } }"
        :plugins="[stepPlugin]"
        @submit="submitApp"
        :actions="false"
    >
        <ul class="tabs cursor-pointer items-center justify-center">
            <!-- NEW: uses new checkStepValidity method to check validation on step blur -->
            <div
                v-for="(step, stepName) in steps"
                class="font-bold"
                :class="[
                    'tab tab-lifted indicator',
                    {
                        'has-errors': checkStepValidity(stepName),
                        'tab-active': activeStep === stepName,
                        'dark:text-lime-400': activeStep !== stepName,
                    },
                ]"
                @click="activeStep = stepName"
                :data-step-valid="step.valid && step.errorCount === 0"
                :data-step-active="activeStep === stepName"
            >
                <!-- NEW: output total number of errors in a little red bubble -->
                <span
                    v-if="checkStepValidity(stepName)"
                    class="indicator-item badge badge-error"
                    v-text="step.errorCount + step.blockingCount"
                />
                {{ camel2title(stepName) }}
            </div>
        </ul>

        <div class="form-body m-4 grid justify-items-center">
            <section
                v-for="stepForm in schema"
                v-show="activeStep === stepForm.name"
                class="w-96 items-center justify-center"
            >
                <FormKitSchema
                    :schema="stepForm"
                    :classes="{
                        wrapper: { $rest: true, 'w-max-w-full/2': true },
                        input: {
                            $reset: true,
                            'bg-white text-grey-50': true,
                        },
                    }"
                    :config="{
                        classes: {
                            label: 'super-red',
                            input: 'super-red',
                        },
                    }"
                />
            </section>
            <div class="btn-group w-96 items-center justify-center">
                <FormKit
                    type="button"
                    prefix-icon="stepBack"
                    :disabled="activeStep == schema[0].name"
                    :classes="{
                        outer: { $rest: true, 'w-1/2': true },
                        inner: { $reset: true },
                        input: {
                            $reset: true,
                            'btn btn-link w-full disabled:btn-link disabled:opacity-25': true,
                        },
                    }"
                    @click="setStep(-1)"
                    class="btn btn-ghost"
                    >Anterior</FormKit
                >
                <FormKit
                    type="button"
                    suffix-icon="stepForward"
                    :disabled="activeStep == schema[schema.length - 1].name"
                    :class="['btn btn-ghost ']"
                    :classes="{
                        outer: { $rest: true, 'w-1/2': true },
                        inner: { $reset: true },
                        input: {
                            $reset: true,
                            'btn btn-link w-full disabled:btn-link disabled:opacity-25': true,
                        },
                    }"
                    @click="setStep(1)"
                    >Próxima</FormKit
                >
            </div>
            <FormKit
                type="submit"
                :classes="{
                    outer: { $rest: true, 'w-96': true },
                    inner: { $reset: true },
                    input: {
                        $reset: true,
                        'btn btn-primary w-full disabled:opacity-0': true,
                    },
                }"
                label="Submit Application"
                :disabled="!valid"
                >Enviar</FormKit
            >
        </div>
    </FormKit>
</template>
