<?php
use App\Models\Material;
$page = $_GET['page'] - 1;
if($page < 0){
	$page = 0;
}
$quantity = 9;
$max_pages = 5;

$query = "status = 'Ativo'";

$posts = Material::paginate($page,$quantity,$query,' id DESC');
$count = Material::count($query,"OTIMIZEmateriais");
$pages = ceil($count/$quantity);
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
		<style>
		   .card-template1, .card-template2, .card-template3, .card-template4 {
		       text-align:center;
		   }
		   .card-template1 .card-title{ font-size:14px; }
		   .card-template2 .card-title{ font-size:14px; }
		   .card-template3 .card-title{ font-size:14px; }
		   .card-template4 .card-title{ font-size:14px; }
		   .card-template1 img{ height:200px; }
		   .card-template2 img{ height:200px; }
		   .card-template3 img{ height:200px; }
		   .card-template4 img{ height:200px; }
		   .card-template1 button{ width:70%; }
		   .card-template2 button{ width:70%; }
		   .card-template3 button{ width:70%; }
		   .card-template4 button{ width:70%; }
		   .posts img{
		       width:100%;
		   }
		   .posts a{
		       color:#000000;
		       text-decoration:none;
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
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Card-->
								<div class="row subheader-internas">
								    <div class="col-xl-12">
    								    <div class="subheader-background" style="position: relative; background:url(<?=BASE?>imagens/agendar.jpg)">
    								    </div>
    								    <div class="subheader-titulo">
        							        <h1>Materiais</h1>
        							        <h3>Transforme oportunidades em negócios, oferecendo a solução certa no momento ideal, com abordagens estratégicas que convertem.</h3>
    						            </div>
    						        </div>
								</div>

								<div class="row">
								     <?php
                                        if(count($posts) ==0){
                                            echo '<div class="col-md-12"><p style="text-align:center;">Nenhum Material encontrado.</p></div>';
                                        } else {
                                            foreach($posts as $v){ 
                                    ?>
                                	<div class="col-xl-4">
                                		<!--begin::Base Table Widget 2-->
                                        <div class="card card-custom card-stretch gutter-b">
                                        <!--begin::Body-->
                                            <div class="card-body posts">
                                                
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Base Table Widget 2-->
                                	</div>
                                	<? } } ?>
                                </div>
								
								<div class="row">
								    <div class="col-md-12">
                                        <div class="example example-basic mt-10">
                                            <div class="example-preview">
                                                <!--begin::Pagination-->
                                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                    <div class="d-flex flex-wrap py-2 mr-3">
                                                        <?php
                                                            $quant_pg = $pages;
                                                            $quant_pg++;
                                                            if($pages < $page) {
                                                                $pg = 0;
                                                            } else {
                                                                $pg = $page;
                                                            }
                                                            if($pg > 0){ ?>
                                                                <a href="<?=DASHBOARD?>capacitacao/materiais/<?=$pg?>" class="btn btn-icon btn-sm btn-light-danger mr-2 my-1"><i class="ki ki-bold-arrow-back icon-xs"></i></a>
                                                            <? } else { ?>
                                 
                                                            <? }
                                                                for ($i_pg = $pg+1; $i_pg < $pg+$max_pages+1; $i_pg++) {
                                                                if($pg == ($i_pg-1)){ ?>
                                                                    <? if($i_pg != 1){ ?>
                                                                         <a href="<?=DASHBOARD?>capacitacao/materiais/<?=$i_pg-1?>" class="btn btn-icon btn-sm border-0 btn-hover-danger mr-2 my-1"><?=$i_pg-1?></a>
                                                                    <? } ?>
                                                                    <a href="javascript:void(0)" class="btn btn-icon btn-sm border-0 btn-hover-danger active mr-2 my-1"><?=$i_pg?></a>
                                                            <?  } else if($i_pg-1 < $pages){
                                                                    $i_pg2 = $i_pg-1; ?>
                                                                   
                                                                     <a href="<?=DASHBOARD?>capacitacao/materiais/<?=$i_pg2+1?>" class="btn btn-icon btn-sm border-0 btn-hover-danger mr-2 my-1"><?=$i_pg?></a>
                                                            <?  }
                                                            }
                                                            if(($pg+2) < $quant_pg){ ?>
                                                                <a href="<?=DASHBOARD?>capacitacao/materiais/<?=$pg+2?>" class="btn btn-icon btn-sm btn-light-danger mr-2 my-1"><i class="ki ki-bold-arrow-next icon-xs"></i></a>
                                                        <? } else { ?>
                                
                                                        <? } ?>   
                                                    </div>
                                                </div>
                                                <!--end:: Pagination-->
                                            </div>
                                        </div>
                                    </div>
								</div>
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
        <!--begin::Page Scripts(used by this page)-->
	</body>
	<!--end::Body-->
</html>
