import axios from "axios";
import { ref, onMounted } from "vue";

let schema = ref([
    {
        $formkit: "select",
        label: "Modelo",
        validation: "required",
        id: "modelo_id",
        name: "modelo_id",
        placeholder: "Selecione um modelo",
        url: 'api/modelos/select',
        classes: {
            wrapper: "max-w-full",
        },
    },
     {
        $formkit: "select",
        label: "Contrato",
        validation: "required",
        id: "contrato",
        name: "contrato",
        placeholder: "Selecione um contrato",
        url: 'api/contratos/select',
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Centro de Custo (Contrato)",
        validation: "required",
        id: "contrato_centro_custo",
        name: "contrato_centro_custo",
        placeholder: "Informe o Centro de Custo do Contrato",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Equipamento",
        validation: "required",
        id: "equipamento",
        name: "equipamento",
        placeholder: "Informe o Equipamento",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Status",
        validation: "required",
        id: "status",
        name: "status",
        placeholder: "Informe o status",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "select",
        label: "É contratual",
        validation: "required",
        id: "contratual",
        name: "contratual",
        placeholder: "Selecione uma opção",
        options: [
            {label:'Sim', value:'sim' },
            {label:'Não', value:'nao' }
        ],
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Prefixo",
        validation: "required",
        id: "prefixo",
        name: "prefixo",
        placeholder: "Informe o prefixo do equipamento",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Regime",
        validation: "required",
        id: "regime",
        name: "regime",
        placeholder: "Informe o regime do equipamento",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Código SAP",
        validation: "required",
        id: "codigo_sap",
        name: "codigo_sap",
        placeholder: "Informe o regime do equipamento",
        classes: {
            wrapper: "max-w-full",
        },
    },
]);

export function useConsolidated() {
    const selectsOptionsPopulator = () => {
        schema.value.filter((e) => {
            if (e.$formkit === "select") {
                if (e.hasOwnProperty("url")) {
                    axios.get(e.url).then((response) => {
                        e.options = response.data;
                    });
                }
            }
        });
    };

    onMounted(() => {
        selectsOptionsPopulator();
    });

    return {
        schema,
    };
}
