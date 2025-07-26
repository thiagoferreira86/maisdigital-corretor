<?php
use App\Models\Campanha;
use App\Models\EmailsMarketing;
use App\Models\LeadCategoria;
use App\Models\CampanhaToCategoria; 
use App\Models\CampanhaToLead;
use App\Models\Lead;

$id = $_REQUEST['id'];
if(!empty($id)){
    $posts = Campanha::find(0, array("id = '".$id."' AND corretora = '".$_SESSION['corretora_id']."'"));
    $post = $posts[0];
}
$now = date("Y-m-d H:i:s");

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
		<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
		<?php include __DIR__.'/../../includes/tags.php'; ?>
		<style>
		    .alerta-data{
		        color:red;
		        padding:5px;
		    }
		</style>
	</head>
	
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
		<!--begin::Main-->
		<?php include __DIR__.'/../../includes/preloader.php'; ?>
		<!--begin::Header Mobile-->
		<?php include __DIR__.'/../../includes/header-mobile.php'; ?>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<?php include __DIR__.'/../../includes/header.php'; ?>
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--end::Container-->
							<div class="container">
							    <div class="row">
								    <div class="col-xl-12">
    								    <div class="card card-custom">
        									<div class="card-header flex-wrap border-0 pt-6 pb-0">
        										<div class="card-title">
        											<h3 class="card-label">E-mail Marketing - Campanha
        										    <br>
        										</div>
        									</div>
    									</div>
                                    </div>
                                </div>
                                <br>
								<!--begin::Profile 2-->
								<div class="d-flex flex-row">
									<!--begin::Aside-->
									<div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
										<!--begin::Card-->
										<div class="card card-custom">
										    <div class="card-header">
        										<div class="card-title">
        											<h3 class="card-label">Dados da Campanha
        										</div>
        									</div>
											<!--begin::Body-->
											<div class="card-body">
												<form id="form-campanha"  enctype="multipart/form-data">
                                                    <input type="hidden" id="id" name="id" value="<?=$id?>">
                                                    <input type="hidden" id="corretora" name="corretora" value="<?=$_SESSION['corretora_id']?>">
                                                    <input type="hidden" id="classe" name="classe" value="Campanha">
                                                    <input type="hidden" id="tipo" name="tipo" value="e">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Título:</label>
                                                            <a href="javascript:void(0)" class="btn btn-link-warning btn-sm" data-toggle="tooltip" title="O título da campanha aparecerá no título do e-mail">
                                                                <img src="assets/media/svg/icons/Code/Info-circle.svg"/>
                                                            </a>
                                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Título da Campanha" value="<?=$post->nome?>" <? if($post->status == 'Enviado'){ echo 'readonly'; } ?> required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nome Remetente:</label> 
                                                            <a href="javascript:void(0)" class="btn btn-link-warning btn-sm" data-toggle="tooltip" title="Nome que aparecerá como remetente">
                                                                <img src="assets/media/svg/icons/Code/Info-circle.svg"/>
                                                            </a>
                                                            <input class="form-control" id="remetente_nome" name="remetente_nome" value="<?=$post->remetente_nome?>" <? if($post->status == 'Enviado'){ echo 'readonly'; } ?> required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>E-mail Remetente:</label> 
                                                            <a href="javascript:void(0)" class="btn btn-link-warning btn-sm" data-toggle="tooltip" title="E-mail que aparecerá como remetente">
                                                                <img src="assets/media/svg/icons/Code/Info-circle.svg"/>
                                                            </a>
                                                            <select class="form-control" id="remetente" name="remetente" <? if($post->status == 'Enviado'){ echo 'readonly'; } ?> required/>
                                                                <option selected value="Padrão">Padrão do Sistema</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <? if($post->status == 'Enviado'){ ?>
                                                            <label>Data de envio:</label>
                                                            <div class="alert alert-secondary text-center" role="alert">
                                                                <b><?=date('d/m/Y H:i:s', strtotime($post->data_envio))?></b>
                                                            </div>
                                                            <? } elseif($post->status == 'Agendado'){  ?>
                                                            <label>Agendado para:</label>
                                                            <div class="alert alert-secondary text-center" role="alert">
                                                                <b><?=date('d/m/Y H:i:s', strtotime($post->data_envio))?></b>
                                                            </div>
                                                            
                                                            <? } ?>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <? if(!empty($post->status)){ ?>
                                                            <label>Status:</label>
                                                            <? } ?>
                                                            <br>
                                                                <? if($post->status == 'Rascunho'){ echo '<button class="btn btn-primary btn-sm btn-block font-weight-bold btn-pill" type="button">Rascunho</button>'; } ?>
                                                                <? if($post->status == 'Agendado' && $post->data_envio > $now){ echo '<button class="btn btn-warning btn-sm btn-block font-weight-bold btn-pill" type="button">Agendado</button>'; } ?>
                                                                <? if($post->status == 'Agendado' && $post->data_envio <= $now){ echo '<button class="btn btn-info btn-sm btn-block font-weight-bold btn-pill" type="button">Enviando</button>'; } ?>
                                                                <? if($post->status == 'Enviado'){ echo '<button class="btn btn-success btn-sm btn-block font-weight-bold btn-pill" type="button">Enviado</button>'; } ?>
                                                        </div>
                                                        <div class="separator separator-dashed my-5"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <? if(empty($post->status)){ ?>
                                                        <button type="submit" class="btn btn-secondary btn-lg btn-block font-weight-bold"><i class="fa fa-save"></i>Salvar</button>
                                                        <? } elseif($post->status == 'Rascunho'){ ?>
                                                        <button type="button" class="btn btn-info btn-block font-weight-bold enviar-agora"><i class="fas fa-paper-plane"></i>Enviar Agora</button>
                                                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-warning btn-block font-weight-bold"><i class="far fa-calendar-plus"></i>Agendar Envio</button>
                                                        <button type="submit" class="btn btn-secondary btn-lg btn-block font-weight-bold"><i class="fa fa-save"></i>Salvar</button>
                                                        <? } elseif($post->status == 'Agendado' && $post->data_envio > $now){ ?>
                                                        <button type="button" class="btn btn-info btn-lg btn-block font-weight-bold enviar-agora"><i class="fas fa-paper-plane"></i>Enviar Agora</button>
                                                        <button type="button" data-toggle="modal" data-target="#exampleModalCenterUpdate" class="btn btn-primary btn-lg btn-block font-weight-bold"><i class="far fa-calendar-alt"></i>Alterar Agendamento</button>
                                                        <button type="submit" class="btn btn-secondary btn-lg btn-block font-weight-bold"><i class="fa fa-save"></i>Salvar</button>
                                                        <? } ?>
                                                    </div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-row-fluid ml-lg-8">
									    <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title" data-toggle="collapse" data-target="#collapseOne1">Conteúdo</div>
                                                </div>
                                                <div id="collapseOne1" class="collapse show" data-parent="#accordionExample1">
                                                    <div class="card-body">
                                                        <div class="form-group">
    														<label for="exampleSelectd">Selecione o Template já Customizado para o Envio</label>
    														<?
                                        						$ems = EmailsMarketing::find(0, array("corretora = '".$_SESSION['corretora_id']."'"));
                                        					?>
        					
    														<select class="form-control" id="conteudo" name="conteudo" <? if($post->status == 'Enviado'){ echo 'readonly'; } ?> required>
    														    <option value="">Selecione</option>
    															<?php
                                        						    foreach($ems as $em){
                                        						?>
    															<option <? if($em->id == $post->conteudo){ echo 'selected'; } ?> value="<?=$em->id?>"><?=$em->titulo?></option>
    															<? } ?>
    														</select>
    														<br>
    														<?php if(count($ems) ==0){ ?>
    														
    														    <div class="alert alert-custom alert-outline-primary fade show mb-5" role="alert">
                                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                                    <div class="alert-text">Você ainda não criou nenhum E-mail Marketing! <a href="https://app.otimize.online/dashboard/email-marketing/templates">Clique aqui</a> para customizar um template.</div>
                                                                    <div class="alert-close">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                                        </button>
                                                                    </div>
                                                                </div>
    														<? } ?>
    													</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion accordion-toggle-arrow" id="accordionExample2">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">Categorias</div>
                                                </div>
                                                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                                    <div class="card-body">
                                                        <div class="form-group">
    														<span class="label label-dark label-inline mr-2">Selecione as categorias de leads para o Envio</span>
    														<hr>
    														<br>
    														    <?php
    														        $categorias = LeadCategoria::find(0, array("corretora = '".$_SESSION['corretora_id']."'"));
                                            						    if(count($categorias) >=1){
                                            					?>
    														    <div class="checkbox-list">
    														        <label class="checkbox text-info">
                                                                        <input type="checkbox" name="allcats" />
                                                                        <span></span>
                                                                        Marcar/Desmarcar Todos
                                                                    </label>
    														        <?
                                            					        foreach($categorias as $categoria){
                                            					            $CampanhaToCategoria = CampanhaToCategoria::find(0, array("campanha = '".$id."' AND categoria = '".$categoria->id."'"));
                                            			
                                            						?>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" class="categorias" id="categoria[]" <? if($post->status == 'Enviado'){ echo 'readonly'; } ?> name="categoria[]" value="<?=$categoria->id?>" <? if(count($CampanhaToCategoria) >=1){ echo 'checked'; } ?> />
                                                                        <span></span>
                                                                        <?=$categoria->nome?>
                                                                    </label>
    															<? } ?>
    														    </div>
    														    <? } else { ?>
        														    <div class="alert alert-custom alert-outline-warning fade show mb-5" role="alert">
                                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                                        <div class="alert-text">Você ainda não criou nenhuma categoria! <a href="https://app.otimize.online/dashboard/leads/categorias">Clique aqui</a> para criar.</div>
                                                                        <div class="alert-close">
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
    														    <? } ?>
    													</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion accordion-toggle-arrow" id="accordionExample3">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne3">Leads</div>
                                                </div>
                                                <div id="collapseOne3" class="collapse" data-parent="#accordionExample3">
                                                    <div class="card-body">
                                                        <div class="form-group">
    														<span class="label label-dark label-inline mr-2">Selecione os Leads</span>
    														<hr>
    														<br>
    														<?php
                    									        $leads = Lead::find(0, array("corretora = '".$_SESSION['corretora_id']."'"));
                                        						    if(count($leads) >=1){
                                        					?>
                                        					<? if(!empty($id)){ ?>
                    									    <div class="checkbox-list">
                    									        <label class="checkbox text-info">
                                                                    <input type="checkbox" name="allleads" />
                                                                    <span></span>
                                                                    Marcar/Desmarcar Todos
                                                                </label>
                    									        <?
                                        					        foreach($leads as $lead){
                                        					             $CampanhaToLead = CampanhaToLead::find(0, array("campanha = '".$_REQUEST['id']."' AND lead = '".$lead->id."'"));
                                        					             
                                        						?>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="lead[]" class="leads" name="lead[]" <? if($post->status == 'Enviado'){ echo 'readonly'; } ?> value="<?=$lead->id?>" <? if(count($CampanhaToLead) >=1){ echo 'checked'; } ?>/>
                                                                    <span></span>
                                                                    <?=$lead->nome?> (<?=$lead->email?>) 
                                                                </label>
                    										<? } ?>
                    									    </div>
                    									    <? } else { ?>
                    									    <div class="checkbox-list">
                    									         <label class="checkbox text-info">
                                                                    <input type="checkbox" name="allleads" />
                                                                    <span></span>
                                                                    Marcar/Desmarcar Todos
                                                                 </label>
                    									        <?
                                        					        foreach($leads as $lead){
                                        						?>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="lead[]" class="leads" name="lead[]" <? if($post->status == 'Enviado'){ echo 'readonly'; } ?> value="<?=$lead->id?>"/>
                                                                    <span></span>
                                                                    <?=$lead->nome?> (<?=$lead->email?>) 
                                                                </label>
                    										<? } ?>
                    									    </div>
                    									    <? } ?>
                    									    <? } else { ?>
                    										    <div class="alert alert-custom alert-outline-danger fade show mb-5" role="alert">
                                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                                    <div class="alert-text">Você ainda não possui nenhum Lead! <a href="https://app.otimize.online/dashboard/leads/">Clique aqui</a> para criar.</div>
                                                                    <div class="alert-close">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                    									    <? } ?>
    													</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
									<!--end::Content-->
									</form>
								</div>
								<!--end::Profile 2-->
							</div>
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<?php include __DIR__.'/../../includes/footer.php'; ?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
        <?php  include __DIR__.'/../../includes/quickUser.php'; ?>
		<!--begin::Scrolltop-->
		<?php include __DIR__.'/../../includes/scrollToTop.php'; ?>
		<!--end::Scrolltop-->
        <div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agendamento de envio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-agendamento">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?=$id?>" required/>   
                            <label>Agendar para:</label>
                            <input type="datetime-local" class="form-control" id="data_envio" name="data_envio" placeholder="Data e Hora" onblur="validaHorario(this)" required/>   
                            <span class="alerta-data"></span>
                        </form>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="salva-agendamento" class="btn btn-primary font-weight-bold">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenterUpdate" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agendamento de envio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-agendamento-update">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?=$id?>" required/>   
                            <label>Agendar para:</label>
                            <input type="datetime-local" class="form-control" id="data_envio" name="data_envio" placeholder="Data e Hora" onblur="validaHorario(this)" value="<?=$post->data_envio?>" required/>   
                            <span class="alerta-data-update"></span>
                        </form>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="salva-agendamento-update" class="btn btn-primary font-weight-bold">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/widgets.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	    <script src="assets/js/mascaras.js"></script>
	    <script src="assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.2.9"></script>
		<!--end::Page Vendors-->
		<!--end::Page Scripts-->
		<script src="https://momentjs.com/downloads/moment.min.js"></script>
		<script src="assets/js/custom.js?v<?php echo JS_VERSION; ?>"></script>
		<script>
		    document.querySelector("input[name=allcats]").onclick = function(e) {
                var marcar = e.target.checked;
                var lista = document.querySelectorAll(".categorias");
                for ( var i = 0 ; i < lista.length ; i++ )
                    lista[i].checked = marcar;
            };
            document.querySelector("input[name=allleads]").onclick = function(e) {
                var marcar = e.target.checked;
                var lista = document.querySelectorAll(".leads");
                for ( var i = 0 ; i < lista.length ; i++ )
                    lista[i].checked = marcar;
            };
		</script>
	</body>
	<!--end::Body-->
</html>