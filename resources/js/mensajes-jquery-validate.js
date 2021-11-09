jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  remote: "Por favor arregla esete campo.",
  email: "Por favor ingrese un correo electrónico valido.",
  url: "Por favor ingrese una URL validas.",
  date: "Por favor ingrese una fecha valida.",
  number: "Por favor ingrese un número valido.",
  maxlength: jQuery.validator.format("No ingrese más de {0} caracteres."),
  minlength: jQuery.validator.format("Ingrese al menos {0} caracteres."),
  rangelength: jQuery.validator.format("Introduzca un valor de entre {0} y {1} caracteres."),
  range: jQuery.validator.format("Introduzca un valor entre {0} y {1}."),
  max: jQuery.validator.format("Ingrese un valor menor o igual que {0}."),
  min: jQuery.validator.format("Ingrese un valor mayor o igual a {0}.")
});