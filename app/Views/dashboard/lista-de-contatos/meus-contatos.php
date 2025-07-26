<?php
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
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Meus Leads</h5>
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
						<div class="row">
						    
						</div>
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
							    <div class="d-flex flex-row">
									<!--begin::Aside-->
                                    <div class="col-xl-4">
                                        <!--begin::Stats Widget 15-->
                                        <div class="card card-custom bg-success card-stretch gutter-b">
                                            <!--begin::ody-->
                                            <div class="card-body">
                                                <span class="svg-icon svg-icon-2x svg-icon-info"><!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Communication/Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                                <?php $leads = Lead::find(0, array("corretora = '".$_SESSION['corretora_id']."'")); ?>
                                                
                                                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?=count($leads)?>/<?=$planoEmailMarketing->contatos?></span>
                                                <span class="font-weight-bold text-white font-size-sm">Total de Leads</span>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Stats Widget 15-->
                                    </div>
									<!--end::Aside-->
									<div class="col-xl-4">
                                        <!--begin::Stats Widget 20-->
                                        <div class="card card-custom bg-primary card-stretch gutter-b">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <span class="svg-icon svg-icon-2x svg-icon-white"><!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Communication/Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                                <?php $leadsDoMes = Lead::find(0, array("corretora = '".$_SESSION['corretora_id']."' AND data_cadastro LIKE '%".date("Y-m")."%'")); ?>
                                                <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block"><?=count($leadsDoMes)?></span>
                                                <span class="font-weight-bold text-white  font-size-sm">Novos Leads</span>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Stats Widget 20-->
                                    </div>
                                    <div class="col-xl-4">
                                        <!--begin::Stats Widget 23-->
                                        <div class="card card-custom bg-info card-stretch gutter-b">
                                            <!--begin::Body-->
                                            <div class="card-body my-4">
                                                <a href="javascript:void(0)" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Comparação Mês Anterior</a>
                                                <?php 
                                                    $hoje = date("Y-m-d");
                                                    $strto = strtotime($hoje . "- 1 month");
                                                    $mesPassado = date("Y-m", $strto);
                                                    $leadsDoMesPassado = Lead::find(0, array("corretora = '".$_SESSION['corretora_id']."' AND data_cadastro LIKE '%".$mesPassado."%'")); 
                                                    if(count($leadsDoMesPassado) >0){
                                                        $total = (count($leadsDoMes)/count($leadsDoMesPassado))*100;
                                                    } else {
                                                        $total = '100';
                                                    }
                                                    if(is_nan($total)){ $total = 0; }
                                                ?>
                                                <div class="font-weight-bold text-white font-size-sm"><span class="font-size-h2 mr-2"><?=round($total, 2)?>%</span><?=count($leadsDoMes)?> Leads</div>
                                        
                                                <div class="progress progress-xs mt-7  bg-white-o-90">
                                                    <div class="progress-bar bg-white" role="progressbar" style="width: <?=round($total, 2)?>%;" aria-valuenow="<?=round($total, 2)?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Stats Widget 23-->
                                    </div>
                                </div>
								<!--begin::Card-->
								<div class="card card-custom">
									<!--begin::Header-->
									<div class="card-header flex-wrap border-0 pt-6 pb-0">
										<div class="card-title">
											<h3 class="card-label">Gerenciamento de Leads
											<span class="d-block text-muted pt-2 font-size-sm">Cadastre, edite e exclua Leads</span></h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Button-->
											<a href="leads/lead" class="btn btn-mapfre font-weight-bolder">
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
											</span>Novo Lead</a>
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
            												<th>Nome</th>
            												<th>E-mail</th>
            												<th>Telefone</th>
            												<th>Origem</th>
            												<th>Data</th>
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
                    "order": [[ 4, "asc" ]],
                    columnDefs: [{ className: 'text-right', targets: [5] } ],
                    "processing": true,
                    "serverSide": true,
                    "ajax": "dashboard/lista-de-contatos/listaContatos",
                    "language": { "url": "assets/js/traducao.json" },
                });
		    });
        </script>
        <script>
            function excluir(id){
                id = id;
                classe = 'Lead';
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
                                url: "dashboard/lista-de-contatos/excluiContato",
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
		</script>
	</body>
	<!--end::Body-->
</html>