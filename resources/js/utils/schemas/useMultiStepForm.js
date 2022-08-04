import { ref, onMounted, watch } from "vue";
const form = ref({
        data_necessidade: "",
        num_doc: "",
        observacao: "",
        tipo_operacao: "",
        origem: "",
        destino:"",
        tipo_equipamento: "",
        capacidade: "",
        check_similar: false,
    })
export function useMultiStepForm() {
    let schema = ref([
        {
            description: "agendamento",
            isValidated: true,
            formInputs: [
                {
                    $formkit: "datetime-local",
                    label: "Data da Necessidade",
                    validation: "required",
                    id: "data_necessidade",
                    name: "data_necessidade",
                    classes: {
                        input: "bg-white text-grey-50",
                        wrapper: { $reset: true, "max-w-xl": true },
                    },
                },
                {
                    $formkit: "text",
                    label: "Documento Atrelados",
                    validation: "required",
                    id: "num_doc",
                    name: "num_doc",
                    placeholder: "Informe o números dos documentos.",
                    classes: {
                        input: "bg-white",
                        wrapper: { $reset: true, "max-w-xl": true },
                    },
                },
                {
                    $formkit: "textarea",
                    label: "Observações",
                    validation: "required",
                    id: "observacao",
                    name: "observacao",
                    placeholder: "Coloque aqui as observações gerais",
                    classes: {
                        input: "bg-white",
                        wrapper: { $reset: true, "max-w-xl": true },
                    },
                },
            ],
        },
        {
            description: "equipamento",
            isValidated: false,
            formInputs: [
                {
                    $formkit: "select",
                    label: "Tipo Operação",
                    validation: "required",
                    id: "tipo_operacao",
                    name: "tipo_operacao",
                    placeholder: "",
                    dinamic: true,
                    options: {
                        1: "Movimentação de Carga",
                        2: "Transporte de Carga",
                    },
                    classes: {
                        wrapper: "max-w-50",
                    },
                },
                {
                    $formkit: "select",
                    label: "Origem",
                    validation: "required",
                    id: "origem",
                    name: "origem",
                    placeholder: "Selecione a origem",
                    dinamic: true,
                    classes: {
                        wrapper: "max-w-50",
                    },
                },
                {
                    $formkit: "select",
                    label: "Destino",
                    validation: "required",
                    id: "destino",
                    name: "destino",
                    placeholder: "Selecione o destino",
                    dinamic: true,
                    classes: {
                        wrapper: "max-w-50",
                    },
                },
                {
                    $formkit: "select",
                    label: "Tipo de Equipamento",
                    validation: "required",
                    id: "tipo_equipamento",
                    name: "tipo_equipamento",
                    placeholder: "Selecione o equipamento",
                    dinamic: true,
                    classes: {
                        wrapper: "max-w-full",
                    },
                },
                {
                    $formkit: "select",
                    label: "Capacidade",
                    validation: "required",
                    id: "capacidade",
                    name: "capacidade",
                    placeholder: "Selecione a capacidade do equipamento",
                    options: {
                        1: "2.5Ton",
                        2: "05Ton",
                        3: "10Ton",
                        4: "15Ton",
                        5: "20Ton",
                        6: "30Ton",
                    },
                    classes: {
                        wrapper: "max-w-full",
                    },
                },
                {
                    $formkit: "checkbox",
                    label: "Caso o equipamento do tipo selecionado não esteja disponível, aceita equipamento semelhante?",
                    id: "check_seimilar",
                    name: "check_similar",
                    classes: {
                        wrapper: "max-w-full",
                    },
                },
            ],
        },
    ]);

    const currentStep = ref(schema.value[0].description);

    const setCurrentStep = (stepDescription) => currentStep.value = stepDescription;

    watch(() => {currentStep.value}, console.log("teste"))

    onMounted(() => {});

    return {
        schema,
        currentStep,
        setCurrentStep,
        form
    };
}
