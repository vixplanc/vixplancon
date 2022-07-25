import axios from "axios";
import {ref, onMounted} from "vue"

getOptions("api/modelo").then((response) => {
    schema.value.filter((e) => {
        if(e.$formkit == "select"){
            e.options = [
                {
                    label:"Sim", value:"sim"
                }
            ]
        }
    })
    console.log(schema);
})



const schema = ref([
    {
        $formkit: "text",
        label: "Modelo",
        validation: "required",
        id: "modelo",
        name: "modelo",
        placeholder: "Informe o modelo",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Contrato",
        validation: "required",
        id: "contrato",
        name: "contrato",
        placeholder: "Informe o contrato",
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
        dinamic:true,
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
])

function createOption(){
    var option = document.createElement("option");
    option.text = "Text";
    option.value = "myvalue";
    var select = document.getElementById("id-to-my-select-box");
    select.appendChild(option);
}

async function getOptions(url){
    await axios.get(url).then((response) => {
        return {nao:"nao", sim:"sim"}
    });
};

export default schema;
