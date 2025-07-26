"use strict";

// Class Definition
var KTLogin = function() {
    var _login;
    const form = document.getElementById('kt_docs_formvalidation_password');
    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-verify-on');
        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleVerifyForm = function(e) {
        var validation;
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_verify_form'),
			{
				fields: {
					recuperaEmail: {
						validators: {
							notEmpty: {
								message: 'Insira o Código'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        // Handle submit button
        $('#kt_login_verify_submit').on('click', function (e) {
            e.preventDefault();
            const codigo = $('.code-input').map(function(){
                return $(this).val();
            }).get().join('');
            if (codigo.length !== 6) {
                Swal.fire({text: 'Por favor, preencha todos os dígitos do código.', icon: "warning" });
                return;
            }
            console.log(codigo)
            var botao = $(this);
            botao.text("Aguarde...").attr("disabled", true);
            grecaptcha.ready(function() {
                grecaptcha.execute(recaptcha_sitekey, {action: 'verify'}).then(function(token) {
                    $('.recaptcha_token').val(token);
                    validation.validate().then(function(status) {
        		        if(status == 'Valid') {
                            $.ajax({
                                type: "POST",
                                dataType: 'json',
                                url: "validar-codigo",
                                data: { codigo_2fa: codigo, recaptcha_token: $(".recaptcha_token").val() }, // correto
                                success: function(data){
                                    console.log(data)
                                    if(data.sucesso == true){
                                        Swal.fire({
                                            text: data.mensagem,
                                            icon: "success",
                                        });
                                        setTimeout(function(){ 
                                            location.href = data.redirect; 
                                        }, 1500);
                                    } else {
                                        Swal.fire({ text: " " + data.erro + " ", icon: "error" });
                                        botao.text("Verificar").attr("disabled", false);
                                    }
                                },
                                error: function(e){
                                    Swal.fire({
                                        text: "Ocorreu um Erro! Verifique os dados e tente novamente.",
                                        icon: "error",
                                        confirmButtonText: "Ok!",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-light-primary"
                                        }
                                    }).then(function() {
                                        KTUtil.scrollTop();
                                    });
                                    botao.text("Verificar").attr("disabled", false);
                                }
                            });
        				} else {
        					Swal.fire({
        		                text: "Ocorreu um Erro! verifique os dados e tente novamente.",
        		                icon: "error",
        		                buttonsStyling: false,
        		                confirmButtonText: "Ok!",
                                customClass: {
            						confirmButton: "btn font-weight-bold btn-light-primary"
            					}
        		            }).then(function() {
        						KTUtil.scrollTop();
        					});
        					botao.text("Verificar").attr("disabled", false);
        				}
        		    });
                });
            });
        });

        // Handle cancel button
        $('#kt_login_verify_cancel').on('click', function (e) {
            e.preventDefault();
            _showForm('verify');
        });
    }
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');
            _handleVerifyForm();
        }
    };
}();
// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
