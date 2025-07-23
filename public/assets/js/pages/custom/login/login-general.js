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
        _login.removeClass('login-signup-on');

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
								message: 'Preencha o campo E-mail!'
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

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    var formDados = $('#kt_login_signin_form').serialize();
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "actions/login.php",
                        data: formDados,
                        processData: false,
                        success: function(data){
                            console.log(data)
                            if(data.sucesso == true){
                                Swal.fire({
            		                text: "Logado! Você será redirecionado para a Dashboard!",
            		                icon: "success",
            		            });
                                setTimeout(function(){ location.href="dashboard" ; }, 1500);
                            }
                            else{
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
                            }
                        },
                        error: function(e){
                            console.log(e.message);
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
				}
		    });
        });

        // Handle forgot button
        $('#kt_login_forgot').on('click', function (e) {
            e.preventDefault();
            _showForm('forgot');
        });

        // Handle signup
        $('#kt_login_signup').on('click', function (e) {
            e.preventDefault();
            _showForm('signup');
        });
    }

    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			form,
			{
				fields: {
					cadastroNome: {
						validators: {
							notEmpty: {
								message: 'Preencha o Nome!'
							}
						}
					},
					cadastroEmail: {
                        validators: {
							notEmpty: {
								message: 'Insira um E-mail válido'
							},
                            emailAddress: {
								message: 'O E-mail inserido não é válido'
							}
						}
					},
					cadastroWhatsapp: {
                        validators: {
							notEmpty: {
								message: 'Insira um Telefone válido'
							}
						}
					},
                    cadastroSenha: {
                        validators: {
                            notEmpty: {
                                message: 'Preencha Senha'
                            }
                        }
                    },
                    cadastroCSenha: {
                        validators: {
                            notEmpty: {
                                message: 'Confirme a Senha'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'Você inseriu senhas diferentes'
                            }
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'Você precisa aceitar os Termos & Condições'
                            }
                        }
                    },
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signup_submit').on('click', function (e) {
            e.preventDefault();
            validation.validate().then(function(status){
		        if (status == 'Valid') {
                    var formDados = $('#kt_login_signup_form').serialize();
                    $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: "actions/cadastro.php",
                            data: formDados,
                            processData: true,
                            success: function(data){
                                console.log(data)
                                if(data.sucesso == true){
                                    Swal.fire({
                		                text: "Cadastro efetuado com sucesso!",
                		                icon: "success",
                		            });
                		            dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce
                                    dataLayer.push({
                                        event: "sign_up",
                                        email: $("#cadastroEmail").val(),
                                    });
                                    setTimeout(function(){ location.reload(); }, 1500);
                                }
                                else{
                                    Swal.fire("Erro!", data.mensagem, "error");
                                }
                            },
                            error: function(e){
                                console.log(e.message);
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
				}
		    });
        });

        // Handle cancel button
        $('#kt_login_signup_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
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

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    var formDados = $('#kt_login_forgot_form').serialize();
                     $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: "actions/recupera-senha.php",
                            data: formDados,
                            processData: false,
                            success: function(data){
                                console.log(data)
                                if(data.sucesso == true){
                                    Swal.fire({
                		                text: "Recuperado! Sua senha foi enviada para o seu E-mail!",
                		                icon: "success",
                		            });
                                    setTimeout(function(){ location.reload(); }, 1500);
                                }
                                else{
                                    Swal.fire({
                		                text: " "+data.mensagem+" ",
                		                icon: "success",
            		                });
                                }
                            },
                            error: function(e){
                                console.log(e.message);
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
				}
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
            _handleSignUpForm();
            _handleForgotForm();
        }
    };
}();

$("#cadastroCSenha").change(function() {
    var senhac = $("#cadastroCSenha").val();
    var senha = $("#cadastroSenha").val();
    if(senha != senhac){
        $(this).val('');
        Swal.fire({
            text: "Senhas não conferem!",
            icon: "error",
        });
    }
});

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
