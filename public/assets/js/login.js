$('.cpf').mask('000.000.000-00', {reverse: true});
$('.telefone').mask('(00) 00000-0000');
$('.cep').mask('00000-000');
function checkPassword(){
    if ($('#cadastro-senha').val() != $('#cadastro-repetir-senha').val()) {
        swal('Senhas não coincidem.');
        $('#cadastro-repetir-senha').val('');
    } else { }
}
$("#form-contato").submit(function(e) {
    var formDados = $('#form-contato').serialize();
     $.ajax({
            type: "POST",
            dataType: 'json',
            url: "actions/contato.php",
            data: formDados,
            processData: false,
            success: function(data){
                console.log(data)
                if(data.sucesso == true){
                    swal("Enviado!", "Mensagem enviada com sucesso!", "success");
                    $("input").val('');
                    $("textarea").val('');
                }
                else{
                    swal("Erro!", "Houve um erro! Por favor, verifique os dados e tente novamente.", "error");
                }
            },
            error: function(e){
                console.log(e.message);
            }
        });    
    e.preventDefault();
});
