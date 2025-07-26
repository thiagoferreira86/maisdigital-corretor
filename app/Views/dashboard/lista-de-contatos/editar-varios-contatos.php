<?php
use App\Models\Lead;
use App\Models\LeadCategoria;

$limite = 100;
if(!empty($page)){
    $page = $_REQUEST['page']-1;
} else {
    $page = 0;
}
$leads = Lead::paginate($page, $limite, "corretora = '".$_SESSION['corretora_id']."'");
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Editar vários contatos</h5>
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
											<h3 class="card-label">Edição em Massa de Contatos
											<span class="d-block text-muted pt-2 font-size-sm">Selecione os Contatos para cadastrar em uma categoria, ou para excluí-los do sistema.</span></h3>
										</div>
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<form id="form-contato" method="post" enctype="multipart/form-data">
    									<div class="row">
    									    <div class="col-md-6">
    									        <div class="card-body">
    									            <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Contatos</h5>
                                                    </div>
                                                    <input type="hidden" id="acao" name="acao" value="">
                                                    <div class="col-md-12">
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="checkbox-list">
                                                                <label class="checkbox text-info">
                                                                    <input type="checkbox" name="allLeads"><span></span>Marcar/Desmarcar Todos
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group listaLeads">
                                                            
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-12">
                                                        <div class="paginacao"></div>
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
                                                        <div class="form-group">
                                                            <div class="checkbox-list">
                                                                <label class="checkbox text-info">
                                                                    <input type="checkbox" name="allCats">
                                                                    <span></span>
                                                                    Marcar/Desmarcar Todos
                                                                </label>
                                                                <?
                                                                    $categorias = LeadCategoria::find(0, array("corretora = '".$_SESSION['corretora_id']."'"));
                                                                    if(count($categorias) >=1){
                                                                        foreach($categorias as $categoria){
                                                                ?>
                                                                            <label class="checkbox">
                                                                                <input type="checkbox" class="categorias" name="categoria[]" id="categoria[]" value="<?=$categoria->id?>">
                                                                                <span></span>
                                                                               <?=$categoria->nome?>
                                                                            </label>
                                                                <?      }
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ações</h5>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <br>
                                                        <input type="hidden" id="limite" name="limite" value="10">
                                                        <input type="hidden" id="pagina" name="pagina" value="1">
                                                        <button type="button" class="btn btn-mapfre btn-lg btn-block" onclick="atualizaContatos()"><i class="la la-save"></i> Salvar</button>
                                                        <button type="button" class="btn btn-warning btn-lg btn-block" onclick="excluirContatos()"><i class="la la-trash"></i> Excluir Selecionados</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                listaContatos();
            });
            function selecionaLimite(elm){
                $("#limite").val($(elm).val());
                listaContatos()
            }
            function selecionaPagina(pagina){
                $("#pagina").val(pagina);
                listaContatos()
            }
            function listaContatos(){
                var limite = $("#limite").val();
                var pagina = $("#pagina").val();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/lista-de-contatos/listaContatosmassa",
                    data: {limite:limite, pagina:pagina},
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            $(".listaContatos").html(data.contatos);
                            $(".paginacao").html(data.paginacao);
                        } else {
                            Swal.fire("Erro!", data.erro, "error");
                        }
                    }
                }); 
            }
            function atualizaContatos(){
                $("#acao").val('Atualizar');
                var form = document.querySelector("#form-contato");
                var formDados = new FormData(form);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/lista-de-contatos/atualizaContatosmass.php",
                    data: formDados,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        if(data.sucesso == true){
                            Swal.fire("Excluído!", "Contatos atualizado com Sucesso!", "success");
                            listaContatos();
                        } else {
                            Swal.fire("Erro!", data.erro, "error");
                        }
                    }
                }); 
            }
            function excluiContatos(){
                $("#acao").val('Excluir');
                var form = document.querySelector("#form-contato");
                var formDados = new FormData(form);
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
                                url: "dashboard/lista-de-contatos/excluiContatosmassa.php",
                                data: formDados,
                                processData: false,
                                contentType: false,
                                success: function(data){
                                    if(data.sucesso == true){
                                        Swal.fire("Excluído!", "Contatos excluídos com Sucesso!", "success");
                                        listaContatos();
                                    } else {
                                        Swal.fire("Erro!", data.erro, "error");
                                    }
                                }
                            }); 
                        } else {
            
                        }
                    });
            }
		</script>
		<script>
		    document.querySelector("input[name=allCats]").onclick = function(e) {
                var marcar = e.target.checked;
                var lista = document.querySelectorAll(".categorias");
                for ( var i = 0 ; i < lista.length ; i++ )
                    lista[i].checked = marcar;
            };
            document.querySelector("input[name=allLeads]").onclick = function(e) {
                var marcar = e.target.checked;
                var lista = document.querySelectorAll(".leads");
                for ( var i = 0 ; i < lista.length ; i++ )
                    lista[i].checked = marcar;
            };
		</script>
	</body>
	<!--end::Body-->
</html>