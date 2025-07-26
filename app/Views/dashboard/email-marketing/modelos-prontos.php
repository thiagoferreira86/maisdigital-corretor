<?php
include '../../classes/config.php';
include '../includes/sessao.php';
$ativa = 'E-mail Marketing';
$subativo = 'Templates';
Log::grava('Acesso '.$ativa.' '.$subativo);
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
		<?php include '../includes/tags.php'; ?>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed">
			<!--begin::Logo-->
			<a href="">
				<img alt="Logo" src="assets/media/logos/Logo.png" class="max-h-30px" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<?php include '../includes/header.php'; ?>
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
					    <div class="container">
					        <div class="row">
					            <?
					                $templates = TemplateEmail::find(0, array("status = 'Ativo'"));
					                if(count($templates) >=1){
					                    foreach($templates as $t){
					            ?>
					                
								<!--begin::Column-->
								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
									<!--begin::Card-->
									<div class="card card-custom gutter-b card-stretch">
										<!--begin::Body-->
										<div class="card-body text-center pt-4">
											<!--begin::User-->
											<div class="mt-7">
												<div class="symbol symbol-circle symbol-lg-90">
													<a href="<?=BASE?>imagens/<?=$t->imagem?>" target="_blank"><img src="<?=BASE?>imagens/<?=$t->imagem?>" style="height:300px;" alt="image"></a>
												</div>
											</div>
											<!--end::User-->
											<!--begin::Name-->
											<div class="my-4">
												<a href="javascript:void(0)" class="text-dark font-weight-bold text-hover-primary font-size-h4"><?=$t->nome?></a>
											</div>
											<!--end::Name-->
											<!--begin::Buttons-->
											<div class="mt-9">
												<a href="javascript:void(0)" class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase" onclick="criarEmail(<?=$t->id?>)">Criar E-mail</a>
											</div>
											<!--end::Buttons-->

										</div>
										<!--end::Body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Column-->
								<? } } ?>
							</div>
					    </div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php include '../includes/footer.php'; ?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
        <?php  include '../includes/quickUser.php'; ?>

		<!--begin::Scrolltop-->
		<?php include '../includes/scrollToTop.php'; ?>
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
            function criarEmail(id){
                id = id;
                classe = 'Email';
                Swal.fire({
                    title: "Tem certeza que deseja escolher esse Template?",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sim, Tenho certeza!",
                    cancelButtonText: "N達o, cancelar!",
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "email-marketing/actions/criar.php",
                                data: { id:id },
                                processData: true,
                                success: function(data){
                                    console.log(data)
                                    if(data.sucesso == true){
                                        Swal.fire("Sucesso!", "Criado com Sucesso!", "success");
                                        setTimeout(function(){ location.href="email-marketing" }, 1000);
                                    } else {
                                        Swal.fire("Erro!", data.erro, "error");
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
