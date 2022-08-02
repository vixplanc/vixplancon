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
        $formkit: "text",
        label: "Denominacao",
        validation: "required",
        id: "denominacao",
        name: "denominacao",
        placeholder: "Informe a denominacao",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Placa",
        validation: "required",
        id: "placa",
        name: "placa",
        placeholder: "Informe a placa",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Chassi",
        validation: "required",
        id: "chassi",
        name: "chassi",
        placeholder: "Informe o Chassi",
        classes: {
            wrapper: "max-w-full",
        },
    },
]);

export function useEquipment() {
    const selectsOptionsPopulator = () => {
        schema.value.filter((e) => {
            if (e.$formkit === 'select') {
                if(e.hasOwnProperty('url')){
                    axios.get(e.url).then((response) => {
                        e.options = response.data
                    })
                }
            }
        });
    };

    onMounted(() => {
          selectsOptionsPopulator()  
    });

    return {
        schema,
    }
}
