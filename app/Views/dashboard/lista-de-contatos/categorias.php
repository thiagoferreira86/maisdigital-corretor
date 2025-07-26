
<?php
use App\Models\LeadCategoria;
use App\Models\LeadToCategoria; 
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
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css">
		<?php include __DIR__.'/../../includes/tags.php'; ?>
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Categorias</h5>
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
											<h3 class="card-label">Gerenciamento de Categorias
											<span class="d-block text-muted pt-2 font-size-sm">Cadastre, edite e exclua categorias</span></h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Button-->
											<a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-mapfre font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<circle fill="#000000" cx="9" cy="15" r="6"></circle>
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>Nova Categoria</a>
											<!--end::Button-->
										</div>
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body">
										<!--begin: Datatable-->
										<div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
										   <div class="table-responsive">
            									<table id="tabela" class="display table" style="width:100%">
            										<thead>
            											<tr class="text-left">
            											    <th>Id</th>
            												<th>Nome</th>
            												<th class="pr-0 text-right">Ações</th>
            											</tr>
            										</thead>
            										<tbody>
            										</tbody>
            									</table>
        								    </div>
									    </div>
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
		
		<div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-content">
                        <form id="form-categoria">
                            <input type="hidden" id="id" name="id" value="">
                            <input type="hidden" id="classe" name="classe" value="LeadCategoria">
                            <input type="hidden" id="corretora" name="corretora" value="<?=$_SESSION['corretora_id']?>">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Categorias</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nome da Categoria</label>
                                        <input type="text" class="form-control" id="nome" name="nome" required>
                                    </div> 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary btn-cancelar font-weight-bold" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Salvar</button>
                            </div>
                        </form>
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
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/widgets.js"></script>
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Scripts-->
		<script>
		    $(document).ready(function() {
                $('#tabela').DataTable({
                    dom: 'Bfrtip',
                    buttons: [ 'copy', 'excel', 'pdf' ],
                    "order": [[ 1, "asc" ]],
                    columnDefs: [{ className: 'text-right', targets: [2] } ],
                    "processing": true,
                    "serverSide": true,
                    "ajax": "dashboard/lista-de-contatos/listaCategorias",
                    "language": { "url": "assets/js/traducao.json" },
                });
		    });
        </script>
        <script>
            function editaCategoria(id, nome){
                $("#id").val(id);
                $("#nome").val(nome);
            }
            $("#form-categoria").submit(function(e){
                e.preventDefault();
                formDados = $("#form-categoria").serialize();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/lista-de-contatos/salvaCategoria",
                    data: formDados,
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            $(".btn-cancelar").click();
                            setTimeout(function(){ location.reload(); }, 1000);
                        } else {

                        }
                    }
                }); 
            });
            function excluir(id){
                id = id;
                classe = 'LeadCategoria';
                Swal.fire({
                    title: "Tem certeza que deseja Excluir?",
                    text: "Essa ação não poderá ser revertida.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sim, Tenho certeza!",
                    cancelButtonText: "Não, cancelar!",
                    }).then(function(result) {
                            if (result.value) {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "dashboard/lista-de-contatos/excluirCategoria",
                                data: { id:id, classe:classe },
                                processData: true,
                                success: function(data){
                                    console.log(data)
                                    if(data.sucesso == true){
                                        Swal.fire("Excluído!", "Excluído com Sucesso!", "success");
                                        setTimeout(function(){ location.reload(); }, 1000);
                                    } else {
                                        Swal.fire("Erro!", "Ocorreu um erro ao excluir!", "error");
                                    }
                                }
                            }); 
                        } 
                    });
            }
            $(".btn-cancelar").click(function(){
                $("#form-categoria")[0].reset();
            });
		</script>
	</body>
	<!--end::Body-->
</html>