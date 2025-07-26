
<?php
use App\Models\LeadCategoria;
use App\Models\LeadToCategoria;
use App\Models\LeadHistorico;
use App\Models\Lead;
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
		<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<?php include __DIR__.'/../../includes/tags.php'; ?>
		<style>
		    .font-size-sn {
                font-size: 0.925rem !important;
            }
            .timeline.timeline-6 .timeline-item .timeline-label {
                width: 95px;
            }
            .timeline.timeline-6:before {
                content: "";
                position: absolute;
                left: 95px;
                width: 3px;
                top: 0;
                bottom: 0;
                background-color: #EBEDF3;
            }
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
		<!--begin::Main-->
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
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Details-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Meus Leads</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
								</div>
								<!--end::Details-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Card-->
								<div class="card card-custom">
									<!--begin::Header-->
									<div class="card-header flex-wrap border-0 pt-6 pb-0">
										<div class="card-title">
											<h3 class="card-label">Cadastro de Leads
											<span class="d-block text-muted pt-2 font-size-sm">Após cadastrar o Leads, você poderá categorizá-lo</span></h3>
										</div>
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="row">
									    <div class="col-md-6">
									        <div class="card-body">
                                                <form id="form-contato">
                                                    <input type="hidden" id="id" name="id" value="<?=$id?>">
                                                    <input type="hidden" id="corretora" name="corretora" value="<?=$_SESSION['corretora_id']?>">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Dados do Contato</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Nome:</label>
                                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" value="<?=$lead->nome?>" required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?=$lead->email?>" required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Telefone:</label>
                                                            <input type="text" class="form-control telefone" id="telefone" name="telefone" value="<?=$lead->telefone?>" placeholder="Telefone com DDD" required/>
                                                        </div>
                                                        <? if(!empty($id)) { ?>
                                                        <div class="form-group">
                                                            <label>Origem:</label>
                                                            <input type="text" class="form-control" id="origem" name="origem" value="<?=$lead->origem?>"  readonly/>
                                                        </div>
                                                        <? } ?>
                                                        <div class="separator separator-dashed my-5"></div>
                                                        <div class="form-group">
                                                            <label>Mensagem</label>
                                                            <textarea class="form-control" id="mensagem" name="mensagem" rows="3"><?=$lead->mensagem?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Observações</label>
                                                            <textarea class="form-control" id="observacoes" name="observacoes" rows="3"><?=$lead->observacoes?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-mapfre font-weight-bold">Salvar</button>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Categorias</h5>
                                                </div>
                                                <div class="col-md-12">
                                                    <br>
                                                    <? if(empty($id)){ ?>
                                                    <div class="form-group">
                                                        <div class="checkbox-list">
                                                            <?php
                                                                
                                                                $categorias = LeadCategoria::find(0, array("corretora = '".$_SESSION['corretora_id']."'"));
                                                                if(count($categorias) >=1){
                                                                    foreach($categorias as $categoria){
                                                            ?>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="categoria[]" id="categoria[]" value="<?=$categoria->id?>">
                                                                            <span></span>
                                                                           <?=$categoria->nome?>
                                                                        </label>
                                                            <?      }
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <? } else { ?>
                                                    <div class="form-group">
                                                        <div class="checkbox-list">
                                                            <?
                                                                $categorias = LeadCategoria::find(0, array("corretora = '".$_SESSION['corretora_id']."'"));
                                                                if(count($categorias) >=1){
                                                                    foreach($categorias as $categoria){
                                                                        $ltc = LeadToCategoria::find(0, array("lead = '".$id."' AND corretora = '".$_SESSION['corretora_id']."' AND categoria = '".$categoria->id."'"));
                                                            ?>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="categoria[]" id="categoria[]" value="<?=$categoria->id?>" <? if(count($ltc) >0){ echo 'checked'; } ?> >
                                                                            <span></span>
                                                                           <?=$categoria->nome?>
                                                                        </label>
                                                            <?      }
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <? } ?>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Histórico</h5>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php if(!empty($id)){ ?>
                                                    
                                                        <?php
                                                            $historico = LeadHistorico::find(0, array("lead = '".$lead->id."'"));
                                                            if(count($historico) >0){
                                                                foreach($historico as $h){
                                                        ?>
                                                            <div class="timeline timeline-6 mt-3">
                                                                <div class="timeline-item align-items-start">
                                                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-sn" style="display: ruby;"><?=formataDataHora($h->data_cadastro)?></div>
                                                                    <div class="timeline-badge">
                                                                        <i class="fa fa-genderless text-warning icon-xl"></i>
                                                                    </div>
                                                                    <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                                                                        <?=$h->descricao?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?
                                                                }
                                                            }
                                                        ?>
                                                
                                                    <? } ?>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
									<!--end::Body-->
								</div>
								<!--end::Card-->
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
        <?php  include __DIR__.'/../../includes/quickUser.php'; ?>
		<!--begin::Scrolltop-->
		<?php include __DIR__.'/../../includes/scrollToTop.php'; ?>
		<!--end::Scrolltop-->
    
		<!--begin::Global Config(global config for global JS scripts)-->
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
		<!--end::Page Scripts-->
		<script>
		    $(document).ready(function(){
                buscaCategorias();
            });
            $("#form-categoria").submit(function(e){
                e.preventDefault();
                formDados = $("#form-categoria").serialize();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/lista-de-contatos/salvaCategoria.php",
                    data: formDados,
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                           $(".btn-cancelar").click();
                           buscaCategorias();
                        } else {

                        }
                    }
                }); 
            });
		    $("#form-contato").submit(function(e){
                e.preventDefault();
                formDados = $("#form-contato").serialize();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/lista-de-contatos/salvaContato.php",
                    data: formDados,
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                           Swal.fire("Salvo!", "Contato salvo com Sucesso!", "success");
                           setTimeout(function(){ location.href="lista-de-contatos" }, 1000);
                        } else {
                            Swal.fire("Erro!", data.erro, "error");
                        }
                    }
                }); 
            });
            function buscaCategorias(){
                lead = $("#id").val();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/lista-de-contatos/buscaCategoriasContato",
                    data: { lead: lead },
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                             $(".table-categorias").html(data.html);
                        } else {
                           
                        }
                    }
                }); 
            }
            function excluirLeadToCategoria(id){
                id = id;
                classe = 'LeadToCategoria';
                Swal.fire({
                    title: "Tem certeza que deseja Excluir?",
                    text: "Essa ação não poderá ser revertida.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sim, Tenho certeza!",
                    cancelButtonText: "Não, cancelar!",
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "dashboard/lista-de-contatos/excluiCategoriaContato",
                                data: { id: id, classe:classe },
                                processData: true,
                                success: function(data){
                                    if(data.sucesso == true){
                                        Swal.fire("Excluído!", "Categoria excluída com Sucesso!", "success");
                                       buscaCategorias();
                                    } else {

                                    }
                                }
                            }); 
                        } else {
            
                        }
                    });
            }
		</script>
	</body>
	<!--end::Body-->
</html>