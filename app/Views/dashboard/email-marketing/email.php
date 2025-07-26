<?php
use App\Models\EmailsMarketing;
use App\Models\TemplateEmailsMarketing;
use App\Models\EmailsMarketingVariaveis;
use App\Models\TemplateLandingpage;

$site = EmailsMarketing::find($_REQUEST['id']);
if($site->corretora == $_SESSION['corretora_id']){
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
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link href="https://unpkg.com/quill-image-uploader@1.2.1/dist/quill.imageUploader.min.css" rel="stylesheet"/>
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
												<a href="landing" class="text-muted">Landing</a>
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
												    <? $template = TemplateLandingpage::find($site->template); ?>
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
                                                                    <div style="width:300px;height: 700px;direction: rtl;background-color:white;">
                                                                        <iframe id="frame1" src="email-marketing/preview/<?=$site->id?>" style="transform: scale(0.28,0.28) translate(1954px,-3865px);width: 1350px;height: 3000px;border-radius: 10px;" ></iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                                                                <div id="wrap2">
                                                                    <iframe id="frame2" src="email-marketing/preview/<?=$site->id?>" style="width:100%; height:6000px;border:none;"></iframe>
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
                                                    <a href="email-marketing/preview/<?=$site->id?>" target="_blank" class="btn btn-sm btn-warning font-weight-bold">
                                                        <i class="flaticon2-search"></i> Preview
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label>Título:</label>
                                                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome" onchange="atualizaVariavel(this, 'titulo', <?=$site->id?>)" value="<?=$site->titulo?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label>Logotipo</label>
                                                        <div class="site-imagem">
                                                            <form id="form-logotipo">
                                                                <input type="hidden" id="id" name="id" value="<?=$site->id?>">
														        <img src="<?=BASE?>imagens/<?=$site->logotipo?>" style="width:50%; margin-left:25%;">
														        <input type="hidden" id="logotipo" name="logotipo" value="<?=$site->logotipo?>">
														        <div id="dZUploadLogotipo" class="dropzone">
        													        <div class="dz-default dz-message">Atualizar <b>Logotipo</b></div>
															    </div>
															    <hr>
															    <div class="row">
															        <div class="col-md-12">
															            <button type="submit" style="float:right;" class="btn btn-success">Salvar</button>
															        </div>
															    </div>
														    </form>
														</div> 
                                                    </div>
                                                    <!--<div class="col-md-12">
                                                        <label>Link do Logotipo:</label>
                                                        <input type="text" class="form-control" id="link_logotipo" name="link_logotipo" onchange="atualizaVariavel(this, 'link_logotipo', <?=$site->id?>)" value="<?=$site->link_logotipo?>"/>
												    </div>-->
                                                </div>
                                                <!--<div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label>Imagem Principal:</label>
                                                        <div class="site-imagem">
                                                            <form id="form-favicon">
                                                                <input type="hidden" id="id" name="id" value="<?=$site->id?>">
														        <img src="<?=BASE?>imagens/<?=$site->imagem?>" style="width:50%; margin-left:25%;">
														        <input type="hidden" id="imagem" name="imagem" value="<?=$site->imagem?>">
														        <div id="dZUploadImagem" class="dropzone">
        													        <div class="dz-default dz-message">Atualizar <b>Imagem Principal</b></div>
															    </div>
															    <hr>
															    <div class="row">
															        <div class="col-md-12">
															            <button type="submit" style="float:right;" class="btn btn-success">Salvar</button>
															        </div>
															    </div>
														    </form>
														</div> 
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Link da Imagem Principal:</label>
                                                        <input type="text" class="form-control" id="link_imagem" onchange="atualizaVariavel(this, 'link_imagem', <?=$site->id?>)" name="link_imagem" value="<?=$site->link_imagem?>"/>
												    </div>
                                                </div>-->
                                                <hr>

                                                <div class="form-group row">
												    <div class="col-md-12">
                                                        <label>Link do botão:</label>
                                                        <input type="text" class="form-control" id="link_botao" onchange="atualizaVariavel(this, 'link_botao', <?=$site->id?>)" name="link_botao" value="<?=$site->link_botao?>"/>
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
					</div>
					
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
        <script src="https://unpkg.com/quill-html-edit-button@2.1.0/dist/quill.htmlEditButton.min.js"></script>
        <script src="https://unpkg.com/quill-image-uploader@1.2.1/dist/quill.imageUploader.min.js"></script>
        <script src="https://cdn.rawgit.com/kensnyder/quill-image-resize-module/3411c9a7/image-resize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
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
            $(document).ready(function(){
                setTimeout(function(){ iframeAutoHeight1(); }, 2000);
            });
            
            function preview(){
                id = '<?=$site->id?>';
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/email-marketing/e-mail-preview.php",
                    data: { id:id, },
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            $("#site-preview").src(data.preview);
                        } else {
                            
                        }
                    },
                    error: function(e){
                        console.log(e)
                    }
                });  
            } 
            
            function atualizaVariavelTexto(elm, campo, id){
                valor = $(elm).val();
                campo = campo;
                id = id;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/email-marketing/atualizaVariaveltexto",
                    data: { id:id, campo:campo, valor:valor },
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            swal("Salvo!", "Informações salvas com sucesso", "success", { timer: 1000, });
                            reloadFrame();
                        } else {
                            swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
                        }
                    },
                    error: function(e){
                        console.log(e)
                    }
                });  
            }
            function atualizaVariavelImagem(id){
		        formDados = $("#form-variavel-imagem-"+id).serialize();
		        $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/email-marketing/atualizaVariavelimagem",
                    data: formDados,
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            swal("Salvo!", "Informações salvas com sucesso", "success", { timer: 1000, });
                            location.reload();
                        } else {
                            swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
                        }
                    },
                    error: function(e){
                        console.log(e)
                    }
                });  
		    }
        </script>
        <?php
            $variaveis = EmailsMarketingVariaveis::find(0, array("email = '".$site->id."' AND tipo = 'imagem'"));
            if(count($variaveis) >=1){
                foreach($variaveis as $v){
        ?>
        <script>
		    Dropzone.autoDiscover = false;
            $(document).ready(function(){
    			var myVariavelImagem<?=$v->id?> = new Dropzone(
					"#dZUploadVariavelImagem<?=$v->id?>",{
						autoProcessQueue: true,
						paramName: "file",
						url: "dashboard/email-marketing/upload.php?pasta=<?=$site->pasta?>&referencia=<?=$site->referencia?>",
						acceptedFiles: ".jpg,.png,.jpeg,.gif,.webp,.svg",
						maxFiles: 1,
						addRemoveLinks: true,
						success: function (file, response) {
						    popupTSSD();
							fileNameImagem = response;
							console.log("Successfully uploaded : " + fileNameImagem);
							$(".variavelImagem<?=$v->id?>").val(fileNameImagem);
						},
						error: function (file, response) {
							console.log(response + '('+ file.name +')');
						}
					}
    			);
            });
		</script>
		<? } } ?>
		<script>
		    Dropzone.autoDiscover = false;
            $(document).ready(function(){
    			var myImagem = new Dropzone(
					"#dZUploadImagem",{
						autoProcessQueue: true,
						paramName: "file",
						url: "dashboard/email-marketing/upload.php?pasta=<?=$site->pasta?>&referencia=<?=$site->referencia?>",
						acceptedFiles: ".jpg,.png,.jpeg,.gif,.webp,.svg",
						maxFiles: 1,
						addRemoveLinks: true,
						success: function (file, response) {
						    popupTSSD();
							fileNameImagem = response;
							console.log("Successfully uploaded : " + fileNameImagem);
							$("#imagem").val(fileNameImagem);
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
    			var myLogotipo = new Dropzone(
					"#dZUploadLogotipo",{
						autoProcessQueue: true,
						paramName: "file",
						url: "dashboard/email-marketing/upload/<?=$site->pasta?>/<?=$site->referencia?>",
						acceptedFiles: ".jpg,.png,.jpeg",
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
            function atualizaVariavel(elm, campo, id){
                valor = $(elm).val();
                campo = campo;
                id = id;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/email-marketing/atualizaVariavel",
                    data: { id:id, campo:campo, valor:valor },
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            swal("Atualizado!", "Atualizado com sucesso", "success");
                            reloadFrame();
                        } else {
                            swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
                        }
                    },
                    error: function(e){
                        console.log(e)
                    }
                });  
            }
            function atualizaTexto(texto, id){
                valor = texto;
                campo = 'texto';
                id = id;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/email-marketing/atualizaVariavel",
                    data: { id:id, campo:campo, valor:valor },
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            reloadFrame();
                            //swal("Atualizado!", "Atualizado com sucesso", "success");
                        } else {
                            //swal("Erro!", "Ocorreu um erro! Tente novamente por favor.", "error");
                        }
                    },
                    error: function(e){
                        console.log(e)
                    }
                });  
            }
		    $("#form-logotipo").submit(function(e){
		        e.preventDefault();
		        formDados = $("#form-logotipo").serialize();
		        $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/email-marketing/salvaEmail",
                    data: formDados,
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            swal("Salvo!", "E-mail Markketing atualizado com sucesso", "success");
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
                    url: "dashboard/email-marketing/salvaEmail",
                    data: formDados,
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            swal("Salvo!", "E-mail Markketing atualizado com sucesso", "success");
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
            function reloadFrame(){
                document.getElementById('frame1').src += '';
                document.getElementById('frame2').src += '';
            }
        </script>
	</body>
	<!--end::Body-->
</html>
<? } ?>