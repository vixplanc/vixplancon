let schema = [
  {
    $formkit: "text",
    label: "Modelo",
    validation: "required",
    id: "modelo_id",
    name: "modelo_id",
    placeholder: "Informe a modelo do equipamento",
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
];

export default schema
