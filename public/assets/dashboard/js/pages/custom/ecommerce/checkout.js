"use strict";

// Class definition
var KTEcommerceCheckout = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard){
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
           
			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
					    if(wizard.getStep() ==1){
					        dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce 
                            dataLayer.push({ 
                                event: "begin_checkout", 
                                ecommerce: { 
                                    currency: "BRL", 
                                    value: $("#textoValorPlano").text(),
                                    coupon: '',
                                    items: [ 
                                        { 
                                            item_id: $("#plano").val(), 
                                            item_name: $("#textoNomePlano").text(), 
                                            index: 0, 
                                            affiliation: "", 
                                            coupon: "", 
                                            discount: 0, 
                                            index: 0, 
                                            item_brand: "", 
                                            item_category: "", 
                                            item_category2: "", 
                                            item_category3: "", 
                                            item_category4: "", 
                                            item_category5: "", 
                                            item_list_id: "", 
                                            item_list_name: "", 
                                            item_variant: "", 
                                            location_id: "", 
                                            price: $("#textoValorPlano").text(),
                                            quantity: 1 
                                        } 
                                    ] 
                                } 
                            }); 
					    } else if(wizard.getStep() ==2){
					        dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce 
                            dataLayer.push({ 
                                event: "add_payment_info", 
                                ecommerce: { 
                                    currency: "BRL", 
                                    value: $("#textoValorPlano").text(),
                                    coupon: '',
                                    payment_type: "Credit Card", 
                                    items: [ 
                                        { 
                                            item_id: $("#plano").val(), 
                                            item_name: $("#textoNomePlano").text(), 
                                            index: 0, 
                                            affiliation: "", 
                                            coupon: "", 
                                            discount: 0, 
                                            index: 0, 
                                            item_brand: "", 
                                            item_category: "", 
                                            item_category2: "", 
                                            item_category3: "", 
                                            item_category4: "", 
                                            item_category5: "", 
                                            item_list_id: "", 
                                            item_list_name: "", 
                                            item_variant: "", 
                                            location_id: "", 
                                            price: $("#textoValorPlano").text(),
                                            quantity: 1 
                                        } 
                                    ] 
                                } 
                            }); 
					    }
						wizard.goTo(wizard.getNewStep());
						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Preencha todos os campos obrigatórios antes de ir para o próximo passo.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function(wizard){
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function(wizard){
		    var forma = $("#forma").val();
		    console.log(forma)
		    if(forma == ''){
    			Swal.fire({
    				text: "Preencha todos os campos obrigatórios antes de ir para o próximo passo.",
    				icon: "error",
    				buttonsStyling: false,
    				confirmButtonText: "Ok, entendido!",
    				customClass: {
    					confirmButton: "btn font-weight-bold btn-light"
    				}
    			});
		    } else if(forma == 'Boleto'){
		        submitFormulario();  
		    } else if(forma == 'Cartão de Crédito'){
		        if(validaCartao()){
		            submitFormulario();
		        }
		    }
		});
	}

	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,{
				fields: {
					nome: {
						validators: {
							notEmpty: {
								message: 'Nome é obrigatório'
							}
						}
					},
					cpf_cnpj: {
						validators: {
							notEmpty: {
								message: 'CPF/CNPJ é obrigatório'
							}
						}
					},
					nascimento: {
						validators: {
							notEmpty: {
								message: 'Nascimento é obrigatório'
							}
						}
					},
					telefone: {
						validators: {
							notEmpty: {
								message: 'Telefone é obrigatório'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					cep: {
						validators: {
							notEmpty: {
								message: 'CEP é obrigatório'
							}
						}
					},
					endereco: {
						validators: {
							notEmpty: {
								message: 'Endereço é obrigatório'
							}
						}
					},
					numero: {
						validators: {
							notEmpty: {
								message: 'Número é obrigatório'
							}
						}
					},
					bairro: {
						validators: {
							notEmpty: {
								message: 'Bairro é obrigatório'
							}
						}
					},
					cidade: {
						validators: {
							notEmpty: {
								message: 'Cidade é obrigatório'
							}
						}
					},
					estado: {
						validators: {
							notEmpty: {
								message: 'Estado é obrigatório'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initWizard();
			_initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTEcommerceCheckout.init();
});

function submitFormulario(){
    var formData = $("#kt_form").serialize();
    $(".btn-submit").text("AGUARDE");
    $(".btn-submit").attr("disabled", true);
    sweetLoading();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "actions/assinar.php",
        data: formData,
        processData: true,
        success: function(data){
            console.log(data)
            if(data.sucesso == true && data.status == 'Pago'){
                dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce 
                dataLayer.push({ 
                    event: "purchase", 
                    ecommerce: { 
                        transaction_id: data.assinatura, 
                        value: 25.42, 
                        tax: 0, 
                        shipping: 0, 
                        currency: "BRL", 
                        coupon: data.cupomNome, 
                        items: [ 
                            { 
                                item_id: $("#plano").val(), 
                                item_name: $("#textoNomePlano").text(), 
                                index: 0, 
                                affiliation: "", 
                                coupon: data.cupomNome, 
                                discount: data.cupomDesconto, 
                                index: 0, 
                                item_brand: "", 
                                item_category: "", 
                                item_category2: "", 
                                item_category3: "", 
                                item_category4: "", 
                                item_category5: "", 
                                item_list_id: "", 
                                item_list_name: "", 
                                item_variant: "", 
                                location_id: "", 
                                price: $("#textoValorPlano").text(),
                                quantity: 1 
                            } 
                        ] 
                    } 
                });
                location.href="pagamento_aprovado/"+data.assinatura;
            } else if(data.sucesso == true && data.status == 'Processando'){
                location.href="pagamento_processando/"+data.assinatura;
            } else {
                Swal.close();
                Swal.fire({
    				text: data.erro,
    				icon: "error",
    				buttonsStyling: false,
    				confirmButtonText: "Ok, entendido!",
    				customClass: {
    					confirmButton: "btn font-weight-bold btn-light"
    				}
    			});
    			$(".btn-submit").text("FINALIZAR");
                $(".btn-submit").attr("disabled", false);
            }
        },
        error: function(e){
            Swal.close();
            Swal.fire({
				text: "Ocorreu um erro no sistema. Se o erro persistir, contate o administrador do sistema.",
				icon: "error",
				buttonsStyling: false,
				confirmButtonText: "Ok, entendido!",
				customClass: {
					confirmButton: "btn font-weight-bold btn-light"
				}
			});
            $(".btn-submit").text("FINALIZAR");
            $(".btn-submit").attr("disabled", false);
        }
    });  
}
function validaCartao(){
    var erro = 0;
    var campo = '';
    var ccnome = $("#ccnome").val();
    if(ccnome === ''){ 
        erro = 1; 
        campo += 'Nome no Cartão';
    }
    var ccnumero = $("#ccnumero").val();
    if(ccnumero === ''){ 
        erro = 1; 
        campo += ' Número do Cartão';
    }
    var ccmes = $("#ccmes").val();
    if(ccmes === ''){ 
        erro = 1; 
        campo += ' Validade Mês';
    }
    var ccano = $("#ccano").val();
    if(ccano === ''){ 
        erro = 1; 
        campo += ' Validade Ano';
    }
    var cccvv = $("#cccvv").val();
    if(cccvv === ''){ 
        erro = 1; 
        campo += ' CVV';
    }
    var cccpf = $("#cccpf").val();   
    if(cccpf === ''){ 
        erro = 1; 
        campo += 'CPF do Titular do Cartão';
    }
    if(erro === 0){
        return true;
    } else {
        Swal.fire({
			text: "Preencha os campos: "+campo,
			icon: "error",
			buttonsStyling: false,
			confirmButtonText: "Ok, entendido!",
			customClass: {
				confirmButton: "btn font-weight-bold btn-light"
			}
		});
		return false;
    }
    console.log(erro)
    console.log(campo)
}
function aplicarCupom(){
    
    var cupom_codigo = $("#cupom").val();
    var plano_id = $("#plano").val();
    if(cupom_codigo != ''){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "actions/cupom.php",
            data: { cupom_codigo:cupom_codigo, plano_id:plano_id },
            processData: true,
            success: function(data){
                console.log(data)
                if(data.sucesso == true){
                   $(".totalPlano").html(data.html);
                   Swal.fire({
        				text: 'Desconto aplicado!',
        				icon: "success",
        				buttonsStyling: false,
        				confirmButtonText: "Ok!",
        				customClass: {
        					confirmButton: "btn font-weight-bold btn-light"
        				}
        			});
                } else {
                    $("#cupom").val('');
                    $(".totalPlano").html(data.html);
                    Swal.fire({
        				text: data.erro,
        				icon: "error",
        				buttonsStyling: false,
        				confirmButtonText: "Ok!",
        				customClass: {
        					confirmButton: "btn font-weight-bold btn-light"
        				}
        			});
                }
            },
            error: function(e){
                $("#cupom").val('');
            }
        });  
    } else {
        $(".totalPlano").html(valorPlano);
    }
}
function sweetLoading(){
    Swal.fire({
        title: "Aguarde!",
        text: "A transação está sendo processada.",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: function() {
            Swal.showLoading();
        }
    })
}