// getOptions("api/modelo").then((response) => {
//     schema.value.filter((e) => {
//         if(e.$formkit == "select"){
//             e.options = [
//                 {
//                     label:"Sim", value:"sim"
//                 }
//             ]
//         }
//     })
//     console.log(schema);
// })

let schema = [
    {
        $formkit: "select",
        label: "Tipo Operação",
        validation: "required",
        id: "tipo_operacao",
        name: "tipo_operacao",
        placeholder: "",
        dinamic:true,
        options:{
            1:"Movimentação de Carga",
            2:"Transporte de Carga"
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
        dinamic:true,
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
        dinamic:true,
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
        dinamic:true,
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
        options:{
            1:"2.5Ton",
            2:"05Ton",
            3:"10Ton",
            4:"15Ton",
            5:"20Ton",
            6:"30Ton"
        },
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "checkbox",
        label: "Caso o equipamento do tipo selecionado não esteja disponível, aceita equipamento semelhante?",
        id: "check_seimilar",
        name: "check_seimilar",
        classes: {
            wrapper: "max-w-full",
        },
    },
];

export default schema
