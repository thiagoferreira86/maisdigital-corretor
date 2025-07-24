<!DOCTYPE html>
<html lang="pt-br">
	<head>
	    <base href="<?=BASE?>">
		<meta charset="utf-8" />
		<title><?=TITULO?></title>
		<meta name="description" content="Dashboard Otimize" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="<?=BASE?>" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="assets/dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="assets/dashboard/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dashboard/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dashboard/css/style.bundle.css?v=1" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<style>
    		.btn-mapfre:hover{
    		    background:#ffffff !important;
    		    color:#D81E05 !important;
    		    border: 1px solid #D81E05;
    		}
    		.btn-lancamento:hover{
    		    background:#d81e051f !important;
    		    color:#D81E05 !important;
    		    border: 1px solid #D81E05;
    		}
		    .banner-item a{
		        text-decoration:none;
		        color: #ffffff;
		    }
		    .videos iframe{
		        width:100% !important;
		    }
		    .btn-lancamento{
		        border:none;
		        background:transparent;
		        width:100%;
		        height:100%;
		        padding:0;
		        padding: 15px 10px;
		        border: 1px solid #d81e051f;
		        border-radius:5px;
		    }
		    .lancamento-item form{
		        width:100%;
		        height:100%;
		    }
		    .lancamento-item{
		        align-content:center;
		        padding: 5px;
		    }

		</style>
		<?php include 'includes/tags.php'; ?>
    </head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
	    
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<?php include 'includes/header-mobile.php'; ?>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<?php include 'includes/header.php'; ?>
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Dashboard-->
								<br>
								<!--begin::Row-->
								<div class="row">
								    <div class="col-xl-12 banners">
                                        <!--begin::Nav Panel Widget 1-->
                                        <? 
                                            
                                            if(count($slides) >0){
                                                foreach($slides as $s){
                                        ?>    
                                        <div class="banner-item">
                                            <a href="<?=$s->link?>" target="_blank">
                                            <div class="banner" style="background: url(<?=BASE?>imagens/<?=$s->imagem?>)">
                                              
                                            </div>
                                            </a>
                                            <div class="banner-legenda">
                                                <h2><a href="<?=$s->link?>" target="_blank"><?=$s->titulo?></a></h2>
                                                <h3><a href="<?=$s->link?>" target="_blank"><?=$s->subtitulo?></a></h3>
                                            </div>
                                        </div>
                                        <? } }  ?>
                                    </div>
								</div>							
								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
						
						<div class="content d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
							    <div class="row">
            						<div class="col-xl-4">
                                        <div class="card card-custom card-stretch gutter-b">
                                            <div class="card-body d-flex p-0">
                                                <div class="flex-grow-1 p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url(<?=BASE?>imagens/Atrair.png)">
                                        
                                                    <h4 class="text-dark mt-2 font-weight-bolder">Planeje e agende</h4>
                                        
                                                    <p class="text-dark my-6">Organize e programe sua <br> campanha</p>
                                        
                                                    <a href="estrategias/atrair" class="btn btn-mapfre font-weight-bold py-2 px-6">Acessar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="card card-custom card-stretch gutter-b">
                                            <div class="card-body d-flex p-0">
                                                <div class="flex-grow-1 p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url(<?=BASE?>imagens/Relacionar.png)">
                                        
                                                    <h4 class="text-dark mt-2 font-weight-bolder">Divulgue nas redes sociais</h4>
                                        
                                                    <p class="text-dark my-6">Crie e publique posts em <br> suas redes socais</p>
                                        
                                                    <a href="estrategias/relacionar" class="btn btn-mapfre font-weight-bold py-2 px-6">Acessar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="card card-custom card-stretch gutter-b">
                                            <div class="card-body d-flex p-0">
                                                <div class="flex-grow-1 p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url(<?=BASE?>imagens/Vender.png)">
                                        
                                                    <h4 class="text-dark mt-2 font-weight-bolder">Crie sua página</h4>
                                        
                                                    <p class="text-dark my-6">Promova seu produto criando<br>  sua página</p>
                                        
                                                    <a href="estrategias/vender" class="btn btn-mapfre font-weight-bold py-2 px-6">Acessar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
            						<div class="col-xl-12">
                                        <div class="card card-custom card-stretch gutter-b">
                                            <div class="card-body d-flex p-0">
                                                <div class="flex-grow-1 p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url(<?=BASE?>imagens/Atrair.png)">
                                        
                                                    <h4 class="text-dark mt-2 font-weight-bolder">Envie e-mail Marketing</h4>
                                        
                                                    <p class="text-dark my-6">Comunique-se com seus contatos, criando e-mail personalizado dos seus produtos e campanhas.</p>
                                        
                                                    <a href="estrategias/atrair" class="btn btn-mapfre font-weight-bold py-2 px-6">Acessar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
							    
                            </div>
                        </div>
                        <div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
							    <div class="row">
                                    <div class="col-lg-8">
                                		<!--begin::Base Table Widget 2-->
                                        <div class="card card-custom card-stretch gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-dark">Últimos Lançamentos</span>
                                                    <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
                                                </h3>
                                            </div>
                                            <!--end::Header-->
                                        
                                            <!--begin::Body-->
                                            <div class="card-body pt-2 pb-0 mt-n3">
                                                <div class="row lancamentos">
                                                    <? 
                                                        
                                                        if(count($artes) >0){
                                                            foreach($artes as $a){
                                                    ?>    
                                                    <div class="col-md-3 lancamento-item">
                                                        <form action="estrategias/arte" method="post"><input type="hidden" id="id" name="id" value="<?=$a->id?>"><button class="btn-lancamento" type="submit"><img src="<?=BASE?>imagens/artes/<?=$a->imagem?>"></button></form>
                                                    </div>
                                                    <? } } ?>
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                    <!--end::Base Table Widget 2-->
                                	</div>
                                	<div class="col-lg-4">
                                		<!--begin::Base Table Widget 2-->
                                        <div class="card card-custom card-black card-stretch gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-white">Aprenda mais</span>
                                                    <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
                                                </h3>
                                            </div>
                                            <!--end::Header-->
                                        
                                            <!--begin::Body-->
                                            <div class="card-body pt-2 pb-0 mt-n3">
                                                <div class="row videos">
                                                    <? 
                                                        if(count($videos) >0){
                                                            foreach($videos as $v){
                                                    ?>    
                                                    <div class="col-md-12">
                                                        <?=$v->iframe?>
                                                    </div>
                                                    <? } } ?>
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                    <!--end::Base Table Widget 2-->
                                	</div>
                                </div>
                            </div>
                        </div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php include 'includes/footer.php'; ?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
        <?php  include 'includes/quickUser.php'; ?>

		<!--begin::Scrolltop-->
		<?php include 'includes/scrollToTop.php'; ?>
		<!--end::Scrolltop-->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/dashboard/plugins/global/plugins.bundle.js?v=7.2.9"></script>
		<script src="assets/dashboard/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.9"></script>
		<script src="assets/dashboard/js/scripts.bundle.js?v=7.2.9"></script>
		<!--end::Global Theme Bundle-->
		
		<script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
		<!--begin::Page Vendors(used by this page)-->
		<script src="assets/dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.2.9"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script>
            $('.banners').slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-angle-left"></i></</button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fas fa-angle-right"></i></button>',
                responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
            });
        </script>
	</body>
	<!--end::Body-->
</html>