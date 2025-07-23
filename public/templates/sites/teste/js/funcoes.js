$(".form-cotacao").submit(function(e) {
    var formDados = $('.form-cotacao').serialize();
     $.ajax({
            type: "POST",
            dataType: 'json',
            url: "actions/cotacao.php",
            data: formDados,
            processData: true,
            success: function(data){
                console.log(data)
                if(data.sucesso == true){
                    swal("Enviado!", "Agradecemos o seu interesse! Em breve entraremos em contato.", "success");
                    if(data.href != ''){
                        setTimeout(function(){ window.open(data.href,'_blank'); }, 3000);
                    }
                }
                else{
                    swal("Erro!", "Ocorreu um erro. Po favor, tente novamente.", "error");
                }
            },
            error: function(e){
                console.log(e.message);
            }
        });    
    e.preventDefault();
});
var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$('.telefone').mask(SPMaskBehavior, spOptions);

$(".form-contato").submit(function(e) {
    var formDados = $('.form-contato').serialize();
     $.ajax({
            type: "POST",
            dataType: 'json',
            url: "actions/cotacao.php",
            data: formDados,
            processData: true,
            success: function(data){
                console.log(data)
                if(data.sucesso == true){
                    swal("Enviado!", "Agradecemos o seu interesse! Em breve entraremos em contato.", "success");
                    setTimeout(function(){ location.reload(); }, 2000);
                }
                else{
                    swal("Erro!", "Ocorreu um erro. Po favor, tente novamente.", "error");
                }
            },
            error: function(e){
                console.log(e.message);
            }
        });    
    e.preventDefault();
});

(function ($) {
    "use strict";

    (() => {
          if (!localStorage.pureJavaScriptCookies) {
            document.querySelector(".box-cookies").classList.remove('hide');
          }
          
          const acceptCookies = () => {
            document.querySelector(".box-cookies").classList.add('hide');
            localStorage.setItem("pureJavaScriptCookies", "accept");
          };
          
          const btnCookies = document.querySelector(".cookies-aceitar");
          const btnCookiesRejeitar = document.querySelector(".cookies-rejeitar");
          
          btnCookies.addEventListener('click', acceptCookies);
          btnCookiesRejeitar.addEventListener('click', acceptCookies);
    })();
})(jQuery)