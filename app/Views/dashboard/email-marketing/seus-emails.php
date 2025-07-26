<?php
use App\Models\EmailsMarketing;
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">E-mail Marketing</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total"> Total</span>
									</div>
									<div class="d-flex- align-items-center flex-wrap mr-2 d-none" id="kt_subheader_group_actions">
										<div class="text-dark-50 font-weight-bold">
										<span id="kt_subheader_group_selected_rows">23</span>Selected:</div>
										<div class="d-flex ml-6">
											<div class="dropdown mr-2" id="kt_subheader_group_actions_status_change">
												<button type="button" class="btn btn-light-primary font-weight-bolder btn-sm dropdown-toggle" data-toggle="dropdown">Update Status</button>
												<div class="dropdown-menu p-0 m-0 dropdown-menu-sm">
													<ul class="navi navi-hover pt-3 pb-4">
														<li class="navi-header font-weight-bolder text-uppercase text-primary font-size-lg pb-0">Change status to:</li>
														<li class="navi-item">
															<a href="#" class="navi-link" data-toggle="status-change" data-status="1">
																<span class="navi-text">
																	<span class="label label-light-success label-inline font-weight-bold">Approved</span>
																</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link" data-toggle="status-change" data-status="2">
																<span class="navi-text">
																	<span class="label label-light-danger label-inline font-weight-bold">Rejected</span>
																</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link" data-toggle="status-change" data-status="3">
																<span class="navi-text">
																	<span class="label label-light-warning label-inline font-weight-bold">Pending</span>
																</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link" data-toggle="status-change" data-status="4">
																<span class="navi-text">
																	<span class="label label-light-info label-inline font-weight-bold">On Hold</span>
																</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
											<button class="btn btn-light-success font-weight-bolder btn-sm mr-2" id="kt_subheader_group_actions_fetch" data-toggle="modal" data-target="#kt_datatable_records_fetch_modal">Fetch Selected</button>
											<button class="btn btn-light-danger font-weight-bolder btn-sm mr-2" id="kt_subheader_group_actions_delete_all">Delete All</button>
										</div>
									</div>
									<!--end::Group Actions-->
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
											<h3 class="card-label">Gerenciamento de E-mails Marketing
											<span class="d-block text-muted pt-2 font-size-sm">Edite e exclua E-mails Marketing</span></h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Button-->
											<a href="email-marketing/templates" class="btn btn-mapfre font-weight-bolder">
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
											</span>Novo E-mail Marketing</a>
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
            												<th>Título</th>
            												<th>Template</th>
            												<th class="text-center">Data Atualização</th>
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
        <!-- Modal-->
        <!-- Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alterar nome</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form id="form-email">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="hidden" class="modalId" id="id" name="id" value="">
                                <input type="hidden" id="classe" name="classe" value="EmailsMarketing">
                                <input type="hidden" id="campo" name="campo" value="titulo">
                                <input type="text" class="form-control" id="valor" name="valor" value="" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold btn-modal-dismiss" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary font-weight-bold">Salvar</button>
                        </div>
                    </form>
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
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!--end::Page Scripts-->
		<script>
		    $(document).ready(function() {
                $('#tabela').DataTable({
                    dom: 'Bfrtip',
                    buttons: [ 'copy', 'excel', 'pdf' ],
                    "order": [[ 0, "desc" ]],
                    columnDefs: [{ className: 'text-right', targets: [4] }, { className: 'text-center', targets: [3] } ],
                    "processing": true,
                    "serverSide": true,
                    "ajax": "dashboard/email-marketing/listaEmails",
                    "language": { "url": "assets/js/traducao.json" },
                });
		    });
        </script>
        <script>
            function excluir(id){
                id = id;
                Swal.fire({
                    title: "Tem certeza que deseja Excluir?",
                    text: "Toda a personalização será perdida",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sim, Tenho certeza!",
                    cancelButtonText: "Não, cancelar!",
                    }).then(function(isConfirm){
                        if(isConfirm){
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "dashboard/email-marketing/excluiEmail",
                                data: { id:id },
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
		</script>
		<script>
		    function abreModal(titulo, id){
		        id = id;
		        titulo = titulo;
		        $("#valor").val(titulo);
		        $(".modalId").val(id);
		    }
            $("#form-email").submit(function(e){
                e.preventDefault();
                formDados = $(this).serialize();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/email-marketing/salvaEmail",
                    data: formDados,
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            Swal.fire("Atualizado!", "Atualizado com Sucesso!", "success");
                            setTimeout(function(){ location.reload(); }, 1000);
                        } else {
                            Swal.fire("Erro!", "Ocorreu um erro ao atualizar!", "error");
                        }
                    }
                }); 
            });
		</script>
	</body>
	<!--end::Body-->
</html>
