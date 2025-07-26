$("#seguradoras-tab").click(function(){
   siteSeguradoras(); 
});
$("#seguros-tab").click(function(){
   siteSeguros(); 
});
$("#depoimentos-tab").click(function(){
   siteDepoimentos(); 
});
$("#faq-tab").click(function(){
   siteFaq(); 
});
$("#formulario-tab").click(function(){
   siteFormulario();
});
$("#cronometro-tab").click(function(){
   siteFaq(); 
});
function marcarDesmarcar(elm){
    var estate = $(elm).prop( "checked" );
    $('.item').each(function(){
        $(this).prop("checked", estate);                         
    });
}
function submitForm(){
    formDados = new FormData($(".form-modal")[0]);
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php",
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if(data.sucesso == true){
                siteSeguradoras();
                siteSeguros(); 
                siteDepoimentos(); 
                siteFaq(); 
                siteFormulario();
                $("#cancel-config").click();
                $("#modal-configuracoes-body").html("");
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  
}    
$(".add-seguradoras").click(function(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=lseguradoras&cod="+codigo,
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                $(".modal-configuracoes-title").text('Seguradoras');
                $(".modal-configuracoes-body").html(data.html);
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  		        
});
function siteSeguradoras(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=lss&cod="+codigo,
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                $(".body-seguradoras").html(data.html);
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  	
}		    
$(".add-seguros").click(function(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=lseguros&cod="+codigo,
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                $(".modal-configuracoes-title").text('Seguros');
                $(".modal-configuracoes-body").html(data.html);
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  		        
});
function siteSeguros(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=ls&cod="+codigo,
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                $(".body-seguros").html(data.html);
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  	
}	
$(".add-depoimentos").click(function(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=ldepoimentos&cod="+codigo,
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                $(".modal-configuracoes-title").text('Depoimentos');
                $(".modal-configuracoes-body").html(data.html);
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  		        
});
function siteDepoimentos(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=ld&cod="+codigo,
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                $(".body-depoimentos").html(data.html);
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  	
}	
$(".add-faq").click(function(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=lfaq&cod="+codigo,
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                $(".modal-configuracoes-title").text('Faq');
                $(".modal-configuracoes-body").html(data.html);
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  		        
});
function siteFaq(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=lf&cod="+codigo,
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                $(".body-faq").html(data.html);
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  	
}	
$(".btn-cards-site").click(function(){
    var source = $(this).data("source");
    $('.btn-cards-site').each(function(){
        $(this).removeClass("active");    
    });
    $('.cards-site').each(function(){
        $(this).removeClass("show");    
    });
    $(this).addClass("active");
    $("#card-"+source).addClass("show");
});
$("#tipo").change(function(){
    var val = $(this).val();
    if(val == 'Normal'){
        $(".siteProgramacao").hide();
        $("#data_inicio").attr("required", false);
        $("#data_fim").attr("required", false);
    } else if(val == 'Programado'){
        $(".siteProgramacao").show();
        $("#data_inicio").attr("required", true);
        $("#data_fim").attr("required", true);
    }
});
function atualizaOrdemSeguro(elm, id){
    var ordem = $(elm).val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=cso",
        data:{id:id, ordem:ordem},
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                notifica('Tudo certo!', "Informação atualizada.", "success");
                siteSeguros(); 
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  
}
function atualizaOrdemSeguradora(elm, id){
    var ordem = $(elm).val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=css",
        data:{id:id, ordem:ordem},
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                notifica('Tudo certo!', "Informação atualizada.", "success");
                siteSeguradoras(); 
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  
}
function atualizaOrdemDepoimento(elm, id){
    var ordem = $(elm).val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=cdo",
        data:{id:id, ordem:ordem},
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                notifica('Tudo certo!', "Informação atualizada.", "success");
                siteDepoimentos(); 
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  
}
function atualizaOrdemFaq(elm, id){
    var ordem = $(elm).val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=cfo",
        data:{id:id, ordem:ordem},
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                notifica('Tudo certo!', "Informação atualizada.", "success");
                siteFaq(); 
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  
}
Dropzone.autoDiscover = false;
$(document).ready(function () {
	var myImagem = new Dropzone(
		"#dZUploadImagem",
		{
			autoProcessQueue: true,
			paramName: "file",
			url: "sites/actions/upload.php",
			acceptedFiles: ".jpg,.png,.jpeg",
			maxFiles: 1,
			addRemoveLinks: true,
			success: function (file, response) {
				fileNameImagem = response;
				notifica("Upload completo!", "Imagem enviada com sucesso", "success")
				$("#favicon").val(fileNameImagem);
			},
			error: function (file, response) {
				console.log(response + '('+ file.name +')');
			}
		}
	);
});
$(".form").submit(function(e){
    e.preventDefault();
    formDados = $(this).serialize();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=n",
        data: formDados,
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                swal("Atualizado!", "Dados Atualizado com sucesso", "success");
                setTimeout(function(){ location.reload(); }, 1500);
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  
});
$(".btn-excluir").click(function(){
    var codigo = $(this).data("id");
    Swal.fire({
        title: "Tem certeza que deseja Excluir?",
        text: "Toda a personalização será perdida",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sim, Tenho certeza!",
        cancelButtonText: "Não, cancelar!",
        }).then(function(result) {
            if (result.value) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "sites/actions/sites.php?a=e",
                data: { codigo:codigo },
                processData: true,
                success: function(data){
                    console.log(data)
                    if(data.sucesso == true){
                        Swal.fire("Excluído!", "Excluído com Sucesso!", "success");
                        setTimeout(function(){ location.href="sites"; }, 1000);
                    } else {
                        Swal.fire("Erro!", "Ocorreu um erro ao excluir!", "error");
                    }
                }
            }); 
        } 
    });
});

$(".add-formulario").click(function(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=lformulario&cod="+codigo,
        processData: true,
        success: function(data){
            console.log(data);
            if(data.sucesso == true){
                $(".modal-configuracoes-title").text('Formulário');
                $(".modal-configuracoes-body").html(data.html);
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  		        
});
function siteFormulario(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php?a=lfm&cod="+codigo,
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                $(".campos-formulario").html(data.html);
            } else {
                swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    });  	
}		    
function removeItem(elm){
    var codigo = $(elm).data("code");
    var id = $(elm).data("id");
    var a = $(elm).data("action");
  
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "sites/actions/sites.php",
        data: { codigo:codigo, id:id, a:a },
        processData: true,
        success: function(data){
            if(data.sucesso == true){
                siteSeguradoras(); 
                siteSeguros(); 
                siteDepoimentos();
                siteFaq();
                siteFormulario();
            } else {
                Swal.fire("Erro!", "Ocorreu um erro ao excluir!", "error");
            }
        },
        error: function(e){
            console.log(e)
        }
    }); 
}      