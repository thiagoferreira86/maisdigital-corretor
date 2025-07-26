<?php
use App\Models\TemplateEmail;
use App\Models\EmailMarketing;
use App\Models\EmailMarketingVariaveis;

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
            function criarEmail(id){
                id = id;
                Swal.fire({
                    title: "Tem certeza que deseja escolher esse Template?",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sim, Tenho certeza!",
                    cancelButtonText: "Não, cancelar!",
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "dashboard/email-marketing/criarEmail",
                                data: { id:id },
                                processData: true,
                                success: function(data){
                                    console.log(data)
                                    if(data.sucesso == true){
                                        Swal.fire("Sucesso!", "Criado com Sucesso!", "success");
                                        setTimeout(function(){ location.href="dashboard/email-marketing/seus-emails" }, 1000);
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
