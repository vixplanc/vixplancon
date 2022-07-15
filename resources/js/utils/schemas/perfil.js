let schema = [
  {
    $formkit: "text",
    label: "Descricao",
    validation: "required",
    id: "descricao",
    name: "descricao",
    placeholder: "Informe a descrição do Perfil",
    classes: {
      wrapper: "max-w-full",
    },
  },
];

export default schema
