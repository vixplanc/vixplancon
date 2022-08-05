import { ref } from "vue";

export function useFrotaSchema() {
    const schema = ref([
        {
            $formkit: "group",
            id: "agendamento",
            name: "agendamento",
            children: [
                {
                    $formkit: "datetime-local",
                    label: "Data da Necessidade",
                    validation: "required",
                    id: "data_necessidade",
                    name: "data_necessidade",
                    classes: {
                        input: "bg-white text-grey-50",
                    },
                },
                // {
                //     $formkit: "text",
                //     label: "Documento Atrelados",
                //     validation: "required",
                //     id: "num_doc",
                //     name: "num_doc",
                //     placeholder: "Informe o números dos documentos.",
                //     classes: {
                //         input: "bg-white",
                //     },
                // },
                // {
                //     $formkit: "textarea",
                //     label: "Observações",
                //     validation: "required",
                //     id: "observacao",
                //     name: "observacao",
                //     placeholder: "Coloque aqui as observações gerais",
                //     classes: {
                //         input: "bg-white",
                //         wrapper: "max-w-full",
                //     },
                // },
            ],
        },
        {
            $formkit: "group",
            id: "agendamento2",
            name: "agendamento2",
            children: [
                {
                    $formkit: "datetime-local",
                    label: "Data da Necessidade",
                    validation: "required",
                    id: "data_necessidade2",
                    name: "data_necessidade2",
                    classes: {
                        input: "bg-white text-grey-50",
                    },
                },
            ],
        },
        {
            $formkit: "group",
            id: "equipamento",
            name: "equipamento",
            children: [
                // {
                //     $formkit: "select",
                //     label: "Tipo Operação",
                //     validation: "required",
                //     id: "tipo_operacao",
                //     name: "tipo_operacao",
                //     placeholder: "",
                //     dinamic: true,
                //     options: {
                //         1: "Movimentação",
                //         2: "Transporte",
                //     },
                //     classes: {
                //         input: "bg-white text-grey-50",
                //        wrapper: "max-w-full",
                //     },
                // },
                // {
                //     $formkit: "select",
                //     label: "Origem",
                //     validation: "required",
                //     id: "origem",
                //     name: "origem",
                //     placeholder: "Selecione a origem",
                //     dinamic: true,
                //     classes: {
                //         input: "bg-white text-grey-50",
                //         wrapper: "max-w-full",
                //     },
                // },
                // {
                //     $formkit: "select",
                //     label: "Destino",
                //     validation: "required",
                //     id: "destino",
                //     name: "destino",
                //     placeholder: "Selecione o destino",
                //     dinamic: true,
                //     classes: {
                //         input: "bg-white text-grey-50",
                //         wrapper: "max-w-full",
                //     },
                // },
                // {
                //     $formkit: "select",
                //     label: "Tipo de Equipamento",
                //     validation: "required",
                //     id: "tipo_equipamento",
                //     name: "tipo_equipamento",
                //     placeholder: "Selecione",
                //     dinamic: true,
                //     classes: {
                //         input: "bg-white text-grey-50",
                //         wrapper: "max-w-full",
                //     },
                // },
                {
                    $formkit: "select",
                    label: "Capacidade",
                    validation: "required",
                    id: "capacidade",
                    name: "capacidade",
                    placeholder: "Selecione ",
                    options: {
                        1: "2.5Ton",
                        2: "05Ton",
                        3: "10Ton",
                        4: "15Ton",
                        5: "20Ton",
                        6: "30Ton",
                    },
                    classes: {
                        input: "bg-white text-grey-50",
                        wrapper: "max-w-full",
                    },
                },
                // {
                //     $formkit: "checkbox",
                //     label: "Caso o equipamento do tipo selecionado não esteja disponível, aceita equipamento semelhante?",
                //     id: "check_seimilar",
                //     name: "check_similar",
                //     classes: {
                //         input: "bg-white text-grey-50",
                //         wrapper: "max-w-full",
                //     },
                // },
            ],
        },
    ]);

    const checkStepValidity = (stepName) => {
        return (
            (steps[stepName].errorCount > 0 ||
                steps[stepName].blockingCount > 0) &&
            visitedSteps.value.includes(stepName)
        );
    };

    const axios = {
        post: (formData) => {
            return new Promise((resolve, reject) => {
                let response = { status: 200 };
                if (
                    formData.organizationInfo.org_name.toLowerCase().trim() !==
                    "formkit"
                ) {
                    response = {
                        status: 400,
                        formErrors: [
                            "There was an error in this form, please correct and re-submit to validate.",
                        ],
                        fieldErrors: {
                            "organizationInfo.org_name":
                                'Organization Name must be "FormKit", we tricked you!',
                        },
                    };
                }
                setTimeout(() => {
                    if (response.status === 200) {
                        resolve(response);
                    } else {
                        reject(response);
                    }
                }, 1500);
            });
        },
    };

    const camel2title = (str) =>
        str
            .replace(/([A-Z])/g, (match) => ` ${match}`)
            .replace(/^./, (match) => match.toUpperCase())
            .trim();

    return {
        schema,
        axios,
        checkStepValidity,
        camel2title,
    };
}
