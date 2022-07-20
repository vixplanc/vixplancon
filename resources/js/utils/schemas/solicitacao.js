let schema = [
    {
        $formkit: "datetime-local",
        label: "Data da Necessidade",
        validation: "required",
        id: "data_necessidade",
        name: "data_necessidade",
        classes: {
            input:"bg-white text-grey-50",
            wrapper: {$reset:true, 'max-w-xl':true},

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
            input:"bg-white",
            wrapper: {$reset:true, 'max-w-xl':true},
        },
    },
    {
        $formkit: "textarea",
        label: "Observações",
        validation: "required",
        id: "item",
        name: "item",
        placeholder: "Coloque aqui as observações gerais",
        classes: {
            input:"bg-white",
            wrapper: {$reset:true, 'max-w-xl':true},
        },
    },

];

export default schema;
