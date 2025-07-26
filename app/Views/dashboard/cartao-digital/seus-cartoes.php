<?php
use App\Models\TemplateCartoes;         
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	    <base href="<?=DASHBOARD?>">
		<meta charset="utf-8" />
		<title><?=TITULO?></title>
		<meta name="description" content="<?=TITULO?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="<?=DASHBOARD?>" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<?php include __DIR__.'/../../includes/tags.php'; ?>
		 <link href="assets/dropzone/dropzone.css" rel="stylesheet">
		 <style>
            #wrap1 { width: 100%; padding: 0; position:relative; height:700px; overflow-y:scroll; }
            #wrap1::-webkit-scrollbar {
              width: 10px;
              height: 10px;/* width of the entire scrollbar */
            }
            
            #wrap1::-webkit-scrollbar-track {
              background: white;        /* color of the tracking area */
            }
            
            #wrap1::-webkit-scrollbar-thumb {
              background-color: #da1e05;    /* color of the scroll thumb */
              border-radius: 5px;       /* roundness of the scroll thumb */
              border: 1px solid #da1e05;  /* creates padding around scroll thumb */
            }
            #wrap2 { width: 100%; padding: 0; position:relative; height:700px; overflow-y:scroll; }
            
            #wrap2::-webkit-scrollbar {
              width: 10px;               /* width of the entire scrollbar */
              height: 10px;
            }
            
            #wrap2::-webkit-scrollbar-track {
              background: white;        /* color of the tracking area */
            }
            
            #wrap2::-webkit-scrollbar-thumb {
              background-color: #da1e05;    /* color of the scroll thumb */
              border-radius: 5px;       /* roundness of the scroll thumb */
              border: 1px solid #da1e05;  /* creates padding around scroll thumb */
            }
        </style>
		<style>
		     .perfil-imagem{
		         width:50%;
		         overflow:hidden;
		     }
		     .perfil-imagem img{
		         width:100%;
		     }
		     .site-imagem{ overflow:hidden; }
		     .site-imagem img{ width:100%; }
		     .dropzone {
                min-height: 90px;
                border: 1px solid rgba(0, 0, 0, 0.3);
                background: white;
                padding: 10px 20px;
            }
            @media (max-width:600px){
                .col-md-4{ width:100%; }   
            }
            .nav.nav-pills .show > .nav-link, .nav.nav-pills .nav-link.active {
                color: #ffffff;
                background-color: #ffffff !important; 
            }
            .nav .show > .nav-link, .nav .nav-link:hover:not(.disabled), .nav .nav-link.active {
                color: #da1e05 !important;
            }
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled subheader-enabled page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<?php include __DIR__.'/../../includes/header-mobile.php'; ?>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<?php include __DIR__.'/../../includes/header.php'; ?>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline flex-wrap mr-5">
										<!--begin::Page Title-->
										<a href=""><h5 class="text-dark font-weight-bold my-1 mr-5">Home</h5></a>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item text-muted">
												<a href="cartao" class="text-muted">Cartão</a>
											</li>
											<li class="breadcrumb-item text-muted">
												<a href="javascript:void(0)" class="text-muted"><?=$site->titulo?></a>
											</li>
										</ul>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page Heading-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									
								</div>
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
							<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Profile 2-->
								<div class="d-flex flex-row">
								    <div class="col-md-4">
								        <div class="card">
                                            <div class="card-body">
												<div class="form-group row">
												    <? $template = TemplateCartoes::find($site->template); ?>
													<div class="col-12">
													    <ul class="nav nav-pills nav-fill" id="myTab1" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="home-tab-1" data-toggle="tab" href="#home-1">
                                                                    <span class="nav-icon"><i class="fas fa-desktop"></i></span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item" onclick="iframeAutoHeight2()">
                                                                <a class="nav-link" id="profile-tab-1" data-toggle="tab" href="#profile-1" aria-controls="profile">
                                                                    <span class="nav-icon"><i class="fas fa-mobile-alt"></i></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content mt-5" id="myTabContent1">
                                                            <div class="tab-pane fade active show" id="home-1" role="tabpanel" aria-labelledby="home-tab-1">
                                                                <div id="wrap1">
                                                                    <div style="width:400px;height: 700px;direction: rtl;background-color:white; overflow:hidden">
                                                                        <iframe src="cartao/preview/<?=$site->id?>" style="transform: scale(0.48,0.48) translate(928px,-547px);width: 1350px;height: 1100px;border-radius: 10px;" ></iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                                                                <div id="wrap2">
                                                                    <iframe id="frame2" src="cartao/preview/<?=$site->id?>" style="width:100%; height:6000px;border:none;"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
												    </div>
												</div>
                                            </div>
                                        </div>
								    </div>
									<!--begin::Content-->
									<div class="col-md-8">
									    <div class="card card-custom">
                                            <div class="card-header">
                                                <div class="card-title border-0">
                                                    <h3 class="card-title font-weight-bolder text-dark">Geral</h3>
                                                </div>
                                                 <div class="card-toolbar">
                                                    <a href="cartao/preview/<?=$site->id?>" target="_blank" class="btn btn-sm btn-warning font-weight-bold">
                                                        <i class="flaticon2-search"></i> Preview
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form id="form-cartao">
                                                    <input type="hidden" id="id" name="id" value="<?=$site->id?>">
                                                    <input type="hidden" id="classe" name="classe" value="Cartao">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label>Título:</label>
                                                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome" value="<?=$site->titulo?>" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Status:</label>
                                                            <select class="form-control" id="status" name="status">
                                                                <option <? if($site->status == 'Ativo'){ echo 'selected'; } ?> value="Ativo">Ativo</option>
                                                                <option <? if($site->status == 'Inativo'){ echo 'selected'; } ?> value="Inativo">Inativo</option>
                                                            </select>
													    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label>Link: <button class="btn btn-icon btn-xs" data-toggle="tooltip" data-theme="dark" data-html="true" title="Endereço da sua Landing Page no final do seu dóminio/subdomínio. Não utilizar espaços e caracteres especiais. <br> Exemplo: <b>landing-page-1</b>"><i class="fa fa-question ajuda"></i></button></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
    																<span class="input-group-text"><?=BASE?>parceiro/<?=$corretora->codigo?>/card/</span>
    															</div>
                                                                <input type="text" class="form-control" id="route" name="route" value="<?=$site->route?>" required/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12"><br></div>
                                                        <!--<div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-6">
                                                                    <label>Cor Primária:</label>
                                                                    <input type="color" class="form-control" id="cor_primaria" name="cor_primaria" style="height: 60px" value="<?=$site->cor_primaria?>"/>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Cor Secundária:</label>
                                                                    <input type="color" class="form-control" id="cor_secundaria" name="cor_secundaria" style="height: 60px" value="<?=$site->cor_secundaria?>"/>
        													    </div>
                                                            </div>
                                                        </div>-->
													    <div class="col-md-12">
													        <table class="table table-stripe">
                                                            <tr>
                                                                <td><b>Descrição</b></td>
                                                                <td><textarea class="form-control" id="descricao" name="descricao" rows="6"><?=$site->descricao?></textarea></td>
                                                            </tr> 
                                                            <tr>
                                                                <td><b>Telefone</b></td>
                                                                <td><input class="form-control telefone" type="text" id="telefone" name="telefone" value="<?=$site->telefone?>"></td>
                                                            </tr>  
                                                            <tr>
                                                                <td><b>E-mail</b></td>
                                                                <td><input class="form-control" type="text" id="email" name="email" value="<?=$site->email?>"></td>
                                                            </tr>  
                                                            <tr>
                                                                <td><b>Whatsapp</b></td>
                                                                <td><input class="form-control telefone" type="text" id="whatsapp" name="whatsapp" value="<?=$site->whatsapp?>"></td>
                                                            </tr>  
                                                            <tr>
                                                                <td><b>Endereço</b></td>
                                                                <td><input class="form-control" type="text" id="endereco" name="endereco" value="<?=$site->endereco?>"</td>
                                                            </tr>  
                                                            <tr>
                                                                <td><b>Facebook</b></td>
                                                                <td><input class="form-control" type="text" id="facebook" name="facebook" value="<?=$site->facebook?>"></td>
                                                            </tr>  
                                                            <tr>
                                                                <td><b>Instagram</b></td>
                                                                <td><input class="form-control" type="text" id="instagram" name="instagram" value="<?=$site->instagram?>"></td>
                                                            </tr>  
                                                            <tr>
                                                                <td><b>Linkedin</b></td>
                                                                <td><input class="form-control" type="text" id="linkedin" name="linkedin" value="<?=$site->linkedin?>"></td>
                                                            </tr>  
                                                            <tr>
                                                                <td><b>Twitter</b></td>
                                                                <td><input class="form-control" type="text" id="twitter" name="twitter" value="<?=$site->twitter?>"></td>
                                                            </tr>  
                                                        </table>
                                                    <hr>
												    <div class="row">
												        <div class="col-md-12">
												            <button type="submit" style="float:right;" class="btn btn-success">Salvar</button>
												        </div>
												    </div>
                                                </form>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-stripe">
                                                            <tr>
                                                                <th>Referência</th>
                                                                <th>Imagem</th>
                                                            </tr>
                                                            <!--<tr>
                                                                <td>Favicon</td>
                                                                <td>
                                                                    <div class="site-imagem">
                                                                        <form id="form-favicon">
                                                                            <input type="hidden" id="classe" name="classe" value="Cartao">
                                                                            <input type="hidden" id="id" name="id" value="<?=$site->id?>">
        															        <img src="<?=BASE?>imagens/<?=$site->favicon?>" style="width:10%; margin-left:45%;">
        															        <input type="hidden" id="favicon" name="favicon" value="<?=$site->favicon?>">
        															        <div id="dZUploadFavicon" class="dropzone" style="width:50%; margin-left:25%;">
                    													        <div class="dz-default dz-message"><i class="fas fa-upload"></i> Atualizar <b>Favicon</b></div>
        																    </div>
        																    <hr>
        																    <div class="row">
        																        <div class="col-md-12">
        																            <button type="submit" style="float:right;" class="btn btn-success">Salvar</button>
        																        </div>
        																    </div>
    																    </form>
    																</div> 
                                                                </td>
                                                            </tr> -->  
                                                            <tr>
                                                                <td>Logotipo</td>
                                                                <td>
                                                                    <div class="site-imagem">
                                                                        <form id="form-logotipo">
                                                                            <input type="hidden" id="id" name="id" value="<?=$site->id?>">
                                                                            <input type="hidden" id="classe" name="classe" value="Cartao">
        															        <img src="<?=BASE?>imagens/<?=$site->logotipo?>" style="width:50%; margin-left:25%;">
        															        <input type="hidden" id="logotipo" name="logotipo" value="<?=$site->logotipo?>">
        															        <div id="dZUploadLogotipo" class="dropzone" style="width:50%; margin-left:25%;">
                    													        <div class="dz-default dz-message"><i class="fas fa-upload"></i> Atualizar <b>Logotipo</b></div>
        																    </div>
        																    <hr>
        																    <div class="row">
        																        <div class="col-md-12">
        																            <button type="submit" style="float:right;" class="btn btn-success">Salvar</button>
        																        </div>
        																    </div>
    																    </form>
    																</div> 
                                                                </td>
                                                            </tr>   
                                                        </table>
													</div>
                                                </div>
                                            </div>
                                        </div>
									<!--end::Content-->
								</div>
								<!--end::Profile 2-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php include __DIR__.'/../../includes/footer.php'; ?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!-- begin::User Panel-->
		<?php  include __DIR__.'/../../includes/quickUser.php'; ?>
		<!-- end::User Panel-->
		<!--begin::Scrolltop-->
		<?php include __DIR__.'/../../includes/scrollToTop.php'; ?>
		<!--end::Scrolltop-->
		<div class="modal fade" id="modal-imagem" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalLabel">Imagem</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="img-container">
							<img id="image" src="imagens/corretoras/imagem.jpg" alt="Picture">
						</div>
					</div>
					<div class="modal-footer">
						<button id="cancel-upload" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button id="crop-upload" type="button" class="btn btn-primary" data-dismiss="modal">Upload</button>
					</div>
				</div>
			</div>
		</div>		
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!--end::Global Theme Bundle-->
		<link href="assets/cropper/cropper.min.css" rel="stylesheet">
        <script src="assets/dropzone/dropzone.js"></script>
        <script src="assets/cropper/cropper.js"></script>
        <script src="assets/cropper/jquery-cropper.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
          var SPMaskBehavior = function (val) {
              return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
              onKeyPress: function(val, e, field, options) {
                  field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
            
            $('.telefone').mask(SPMaskBehavior, spOptions);
        </script>
        <script>
            Dropzone.autoDiscover = false;
            $(document).ready(function(){
    			var myLogotipo = new Dropzone(
					"#dZUploadLogotipo",{
						autoProcessQueue: true,
						paramName: "file",
						url: "dashboard/cartao-digital/upload/<?=$site->pasta?>/<?=$site->referencia?>",
						acceptedFiles: ".jpg,.png,.jpeg,.gif,.webp,.svg",
						maxFiles: 1,
						addRemoveLinks: true,
						success: function (file, response) {
						    popupTSSD();
							fileNameImagem = response;
							console.log("Successfully uploaded : " + fileNameImagem);
							$("#logotipo").val(fileNameImagem);
						},
						error: function (file, response) {
							console.log(response + '('+ file.name +')');
						}
					}
    			);
            });
        </script>
        <script>
            Dropzone.autoDiscover = false;
            $(document).ready(function(){
    			var myFavicon = new Dropzone(
					"#dZUploadFavicon",{
						autoProcessQueue: true,
						paramName: "file",
						url: "dashboard/cartao-digital/upload/<?=$site->pasta?>/<?=$site->referencia?>",
						acceptedFiles: ".jpg,.png,.jpeg",
						maxFiles: 1,
						addRemoveLinks: true,
						success: function (file, response) {
						    popupTSSD();
							fileNameImagem = response;
							console.log("Successfully uploaded : " + fileNameImagem);
							$("#favicon").val(fileNameImagem);
						},
						error: function (file, response) {
							console.log(response + '('+ file.name +')');
						}
					}
    			);
            });
        </script>
		<script>
		    $("#form-cartao").submit(function(e){
		        e.preventDefault();
		        formDados = $("#form-cartao").serialize();
		        $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/cartao-digital/salvaCartao",
                    data: formDados,
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            swal("Atualizado!", "Cartão atualizado com sucesso", "success");
                            setTimeout(function(){ location.reload(); }, 1000);
                        } else {
                            swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
                        }
                    },
                    error: function(e){
                        console.log(e)
                    }
                });  
		    });

		    $("#form-favicon").submit(function(e){
		        e.preventDefault();
		        formDados = $("#form-favicon").serialize();
		        $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/cartao-digital/salvaCartao",
                    data: formDados,
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            swal("Atualizado!", "Cartão atualizado com sucesso", "success");
                            setTimeout(function(){ location.reload(); }, 1000);
                        } else {
                            swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
                        }
                    },
                    error: function(e){
                        console.log(e)
                    }
                });  
		    });
		    $("#form-logotipo").submit(function(e){
		        e.preventDefault();
		        formDados = $("#form-logotipo").serialize();
		        $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/cartao-digital/salvaCartao",
                    data: formDados,
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            swal("Atualizado!", "Cartão atualizado com sucesso", "success");
                            setTimeout(function(){ location.reload(); }, 1000);
                        } else {
                            swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
                        }
                    },
                    error: function(e){
                        console.log(e)
                    }
                });  
		    });
		    function popupTSSD(){
                let timerInterval;
                Swal.fire({
                    icon: "info",
                    title: "Transparência e Segurança dos Seus Dados",
                    html: "A MAPFRE reforça seu compromisso com a privacidade e a segurança das informações. Nenhum dado inserido nesta plataforma será exportado ou utilizado pela MAPFRE para qualquer outro fim. Toda a gestão das informações é de responsabilidade exclusiva da corretora.<br> Fique tranquilo: seus dados e os de seus clientes estão protegidos. <br><br>Essa Popup irá ser fechada em <b></b>",
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    width: 600,
                    height:600,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                          timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                });
            }
		</script>
		<script type="text/javascript">
		    $("#profile-tab-1").click(function(){
		        iframeAutoHeight2();
		    });
            function iframeAutoHeight1(){
                var iframe1 = document.getElementById("frame1");
                iframe1.height = iframe1.contentWindow.document.body.scrollHeight;
            }
            function iframeAutoHeight2(){
                var iframe2 = document.getElementById("frame2");
                iframe2.height = iframe2.contentWindow.document.body.scrollHeight;
            }
        </script>
	</body>
	<!--end::Body-->
</html>
