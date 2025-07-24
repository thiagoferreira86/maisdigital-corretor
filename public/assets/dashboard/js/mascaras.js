$('.date').mask('00/00/0000');
$('.cep').mask('00000-000');
var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$('.telefone').mask(SPMaskBehavior, spOptions);
$('.cpf').mask('000.000.000-00', {reverse: true});
$('.cnpj').mask('00.000.000/0000-00', {reverse: true});
$('.money').mask('000.000.000.000.000,00', {reverse: true});

function get_mask(input_value, event, element, options) {
    // Remove caracteres não numéricos
    var numbers = input_value.replace(/\D+/g, '');
    return numbers.length <= 11 ? '000.000.000-000' : '00.000.000/0000-00';
}

// Usa a função `get_mask` para definir a máscara
$('.cnpjcpf').mask(get_mask, {
    onKeyPress: function (input_value, event, element, options) {
        element.mask(get_mask, options);
    }
});