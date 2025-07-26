"use strict";

// Class Definition
var KTLogin = function() {
    var _login;
    const form = document.getElementById('kt_docs_formvalidation_password');
    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleSignInForm = function() {
        var validation;
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_signin_form'),
			{
				fields: {
					loginEmail: {
						validators: {
							notEmpty: {
								message: 'Preencha o campo CPF!'
							}
						}
					},
					loginSenha: {
						validators: {
							notEmpty: {
								message: 'Insira sua Senha!'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);
        $('#kt_login_signin_submit').on('click', function (e) {
            e.preventDefault();
            var botao = $(this);
            botao.text("Aguarde...").attr("disabled", true);
            grecaptcha.ready(function() {
                grecaptcha.execute(recaptcha_sitekey, {action: 'login'}).then(function(token) {
                    // Coloca o token num campo hidden no seu formulário
                    $('.recaptcha_token').val(token);
                    validation.validate().then(function(status) {
        		        if (status == 'Valid') {
                            var formDados = $('#kt_login_signin_form').serialize();
                            $.ajax({
                                type: "POST",
                                dataType: 'json',
                                url: "login/auth",
                                data: formDados,
                                processData: false,
                                success: function(data){
                                    console.log(data)
                                    if(data.sucesso == true){
                                        Swal.fire({
                    		                text: data.mensagem,
                    		                icon: "success",
                    		            });
                                        setTimeout(function(){ location.href=data.redirect ; }, 1500);
                                    }else{
                                        Swal.fire({
                    		                text: data.erro,
                    		                icon: "error",
                    		                buttonsStyling: false,
                    		                confirmButtonText: "Ok!",
                                            customClass: {
                        						confirmButton: "btn font-weight-bold btn-light-primary"
                        					}
                    		            }).then(function() {
                    						KTUtil.scrollTop();
                    					});
                    					botao.text("Entrar").attr("disabled", false);
                                    }
                                },
                                error: function(e){
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
                    				botao.text("Entrar").attr("disabled", false);
                                }
                            });    
        				} else {
        					Swal.fire({
        		                text: "Preencha os dados corretamente.",
        		                icon: "error",
        		                buttonsStyling: false,
        		                confirmButtonText: "Ok!",
                                customClass: {
            						confirmButton: "btn font-weight-bold btn-light-primary"
            					}
        		            }).then(function() {
        						KTUtil.scrollTop();
        					});
        					botao.text("Entrar").attr("disabled", false);
        				}
        		    });
                });	   
            });
           
        });
        // Handle forgot button
        $('#kt_login_forgot').on('click', function (e) {
            e.preventDefault();
            _showForm('forgot');
        });
    }

    var _handleForgotForm = function(e) {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_forgot_form'),
			{
				fields: {
					recuperaEmail: {
						validators: {
							notEmpty: {
								message: 'Insira o seu E-mail de cadastro'
							},
                            emailAddress: {
								message: 'O e-mail adicionado não é um e-mail válido'
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
        $('#kt_login_forgot_submit').on('click', function (e) {
            e.preventDefault();
            var botao = $(this);
            botao.text("Aguarde...").attr("disabled", true);
            grecaptcha.ready(function() {
                grecaptcha.execute(recaptcha_sitekey, {action: 'login'}).then(function(token) {
                    // Coloca o token num campo hidden no seu formulário
                    $('.recaptcha_token').val(token);
                    validation.validate().then(function(status) {
        		        if (status == 'Valid') {
                            var formDados = $('#kt_login_forgot_form').serialize();
                             $.ajax({
                                    type: "POST",
                                    dataType: 'json',
                                    url: "login/recovery",
                                    data: formDados,
                                    processData: false,
                                    success: function(data){
                                        console.log(data)
                                        if(data.sucesso == true){
                                            Swal.fire({
                        		                text: "Recuperado! Um link para redefinição de senha foi enviado para o seu E-mail!",
                        		                icon: "success",
                        		            });
                                            setTimeout(function(){ location.reload(); }, 1500);
                                        }
                                        else{
                                            Swal.fire({
                        		                text: " "+data.mensagem+" ",
                        		                icon: "success",
                    		                });
                    		                botao.text("Recuperar").attr("disabled", false);
                                        }
                                    },
                                    error: function(e){
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
                    				botao.text("Recuperar").attr("disabled", false);
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
        					botao.text("Recuperar").attr("disabled", false);
        				}
        		    });
                });
            });
        });

        // Handle cancel button
        $('#kt_login_forgot_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');
            _handleSignInForm();
            _handleForgotForm();
        }
    };
}();
// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
