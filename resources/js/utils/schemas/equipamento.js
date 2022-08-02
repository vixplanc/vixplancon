import axios from "axios";
import {ref} from "vue"

let schema = ref([
    {
        $formkit: "select",
        label: "Modelo",
        validation: "required",
        id: "modelo_id",
        name: "modelo_id",
        placeholder: "Selecione um modelo",
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

async function getOptions(url){
    await axios.get(url).then((response) => {
    schema.value.filter((e) => {
        if(e.id == "modelo_id"){
            console.log(response);
            e.options = response.data
        }
    })
})
};

getOptions("api/modelos/select")

export default schema;


