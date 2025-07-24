<!DOCTYPE html>
<html lang="pt-br">
	<head>
	    <base href="<?=BASE?>">
		<meta charset="utf-8" />
		<title><?=TITULO?></title>
		<meta name="description" content="<?=TITULO?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="<?=BASE?>" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="assets/dashboard/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dashboard/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dashboard/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<?php include __DIR__.'/../includes/tags.php'; ?>
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
		   .col-md-2 img{
		       width:100%;
		   }
		   .col-md-2{
		       text-align:center;
		   }
		   .col-md-2 .btn-mapfre{
		       margin: 10px 0 20px;
		   }
		</style>
		<style>
		    .btn-tipo{
		        font-weight:bold;
		    }
		    .btn-tipo.active{
		        background:#ffffff;
		        color:#D81E05;
		        font-weight:bold;
		    }
            .preloader {
                position: fixed;
                width: 100vw;
                height: 100vh;
                text-align: center;
                display:none;
                overflow: hidden;
                z-index: 9999;
                background-color: rgba(255, 255, 255, 0.8);
            }
            .preloaderImagem {
                width: 50%;
                height: 100vh;
                margin: auto;
                text-align: center;
                padding: 21% 0;
            }
            .preloaderImagem img{ width:10%; } 
            .btn-fechar{
                z-index: 9999999;
                position: absolute;
                top: unset !important;
                left: 0px;
                right: unset !important;
                cursor: pointer;
                transform: scale(1);
                transition: all 0.7s ease 0s;
                bottom: 0px;
                font-size:13px !important;
                padding: 10px 24px;
                background-color: red !important;
                color:white !important;
                border-top-left-radius: 0 !important;
                border-top-right-radius: 5px;
                box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 24px 2px;
                font-weight:bold;
            }
            .btn-fechar i{
                color:white !important;
                font-size:13px !important;
            }
            .format ul {
              list-style-type: none;
              display:flex;
            }
            .format  li {
              display: inline-block;
              width:25%;
              height:150px;
            }
            .label-img{
                width:100%; 
                height:150px; 
                text-align:center;
                line-height: 150px;
            }
            .label-title{ text-align:center; font-weight:bold; }
                input[type="checkbox"][id^="cb"] {
                  display: none;
            }
            .format label {
                height:110px;
                  border: 1px solid #fff;
                  padding: 10px;
                  display: block;
                  position: relative;
                  margin: 10px;
                  cursor: pointer;
                  -webkit-touch-callout: none;
                  -webkit-user-select: none;
                  -khtml-user-select: none;
                  -moz-user-select: none;
                  -ms-user-select: none;
                  user-select: none;
            }
            .formato-active{
                background: #f7f7f7;
                border: 1px solid #D81E05 !important;
                color:#D81E05;
            }
            .format{ width:100%; }
            .formato{ 
                width:90%; 
                margin: 0 5%; 
                border: 1px solid #f7f7f7;
                height:200px;
                cursor:pointer;
                border-radius:15px;
            }
            .formato:hover{ 
                background: #f7f7f7;
            }
            .div-formatos, .div-temas, .div-artes{
                display:none;
            }
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed">
			<!--begin::Logo-->
			<a href="">
				<img alt="Logo" src="assets/dashboard/media/logos/Logo.png" class="max-h-30px" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/dashboard/media/svg/icons/General/User.svg-->
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
					<?php include __DIR__.'/../includes/header.php'; ?>
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
        							        <h1>Redes Sociais</h1>
        							        <h3>Use as peças prontas para mostrar sua presença nas redes. <br>Publique com frequência e mantenha sua marca sempre visível!</h3>
    						            </div>
    						        </div>
								</div>

								<div class="row">
                                	<div class="col-xl-12">
                                		<!--begin::Base Table Widget 2-->
                                        <div class="card card-custom card-stretch gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-dark">Modelos para postar nas redes sociais</span>
                                                </h3>
                                                <hr>
                                            </div>
                                            <!--end::Header-->
                                        
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <div class="row">
        								            <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4>Qual o seu objetivo hoje?</h4>
                                                                <p>Publique com propósito e conquiste atenção!</p>
                                                                <br>
                        									    <input type="hidden" id="tipo" name="tipo" value="">
                        									    <div class="row">
                            									    <div class="col-md-4">
                            									        <button class="btn btn-mapfre btn-tipo btn-block" data-value="atrair" type="button">Atrair</button>
                            									    </div>
                                                                    <div class="col-md-4">
                            									        <button class="btn btn-mapfre btn-tipo btn-block" data-value="atrair" type="button">Relacionar</button>
                            									    </div>
                                                                    <div class="col-md-4">
                            									        <button class="btn btn-mapfre btn-tipo btn-block" data-value="atrair" type="button">Vender</button>
                            									    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br> <br>
                                                        <div class="row">
                        									<div class="col-md-12 div-formatos">
                        									    <div class="form-group">
                            									    <h4>Formatos</h4>
                            									    <p>Selecione o melhor formato para postar nas Redes Sociais:</p>
                            									    <br>
                            									    <input type="hidden" id="formato" name="formato" value="">
                            									    <input type="hidden" id="page" name="page" value="">
                            									    <div class="row format" id="format">
                            									        <div class="col formats">
                            									            <div class="formato" onclick="selecionaFormato('Quadrado', this)">
                            									                <div class="label-img">
                            									                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="54" height="47" viewBox="0 0 54 47">
                                                                                      <g id="Group_6693" data-name="Group 6693" transform="translate(-83 -982)">
                                                                                        <g id="Rectangle_4450" data-name="Rectangle 4450" transform="translate(83 982)" fill="none" stroke="#3b3a77" stroke-width="1" opacity="0.5">
                                                                                          <rect width="54" height="47" rx="5" stroke="none"></rect>
                                                                                          <rect x="0.5" y="0.5" width="53" height="46" rx="4.5" fill="none"></rect>
                                                                                        </g>
                                                                                        <rect id="Rectangle_4451" data-name="Rectangle 4451" width="44" height="34" rx="5" transform="translate(88 991)" fill="#dce1f7"></rect>
                                                                                        <circle id="Ellipse_718" data-name="Ellipse 718" cx="2.5" cy="2.5" r="2.5" transform="translate(88 985)" fill="#3b3a77" opacity="0.5"></circle>
                                                                                      </g>
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="label-title">Quadrado(1080x1080px)</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col formats">
                                                                            <div class="formato" onclick="selecionaFormato('Vertical', this)">
                                                                                <div class="label-img">
                                                                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="64" height="89" viewBox="0 0 64 89">
                                                                                      <g id="Group_6692" data-name="Group 6692" transform="translate(-159 -416)">
                                                                                        <g id="Group_6691" data-name="Group 6691" transform="translate(159 416)">
                                                                                          <g id="Rectangle_4139" data-name="Rectangle 4139" fill="none" stroke="#3B3A77" stroke-width="1" opacity="0.5">
                                                                                            <rect width="64" height="89" rx="5" stroke="none" fill="none"></rect>
                                                                                            <rect x="0.5" y="0.5" width="63" height="88" rx="4.5" fill="none" stroke="#3B3A77"></rect>
                                                                                          </g>
                                                                                          <rect id="Rectangle_4417" data-name="Rectangle 4417" width="58" height="73" rx="5" transform="translate(3 10)" fill="#DCE1F7"></rect>
                                                                                          <circle id="Ellipse_705" data-name="Ellipse 705" cx="2.5" cy="2.5" r="2.5" transform="translate(3 4)" fill="#3B3A77" opacity="0.5"></circle>
                                                                                        </g>
                                                                                      </g>
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="label-title">Vertical(1080x1350px)</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col formats">
                                                                            <div class="formato" onclick="selecionaFormato('Horizontal', this)">
                                                                                <div class="label-img">
                                                                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="75.334" height="50.812" viewBox="0 0 75.334 50.812">
                                                                                        <g id="Group_6692" data-name="Group 6692" transform="matrix(-0.017, 1, -1, -0.017, 75.334, 1.3)">
                                                                                            <g id="Group_6691" data-name="Group 6691" transform="translate(0 0)">
                                                                                              <g id="Rectangle_4139" data-name="Rectangle 4139" fill="none" stroke="#3B3A77" stroke-width="1" opacity="0.5">
                                                                                                <rect width="49.519" height="74.481" rx="5" stroke="none" fill="none"></rect>
                                                                                                <rect x="0.5" y="0.5" width="48.519" height="73.481" rx="4.5" fill="none" stroke="#3B3A77"></rect>
                                                                                              </g>
                                                                                              <rect id="Rectangle_4417" data-name="Rectangle 4417" width="36.47" height="65.023" rx="5" transform="translate(8.32 4.729)" fill="#DCE1F7"></rect>
                                                                                              <circle id="Ellipse_705" data-name="Ellipse 705" cx="1.478" cy="1.478" r="1.478" transform="translate(4.755 68.109)" fill="#3B3A77" opacity="0.5"></circle>
                                                                                            </g>
                                                                                        </g>
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="label-title">Horizontal(1200x800px)</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col formats">
                                                                            <div class="formato" onclick="selecionaFormato('Stories', this)">
                                                                                <div class="label-img">
                                                                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="64" height="126" viewBox="0 0 64 126">
                                                                                        <g id="Group_6692" data-name="Group 6692" transform="translate(-159 -415.652)">
                                                                                            <g id="Group_6691" data-name="Group 6691" transform="translate(159 416)">
                                                                                              <g id="Rectangle_4139" data-name="Rectangle 4139" transform="translate(0 -0.348)" fill="none" stroke="#3B3A77" stroke-width="1" opacity="0.5">
                                                                                                <rect width="64" height="126" rx="5" stroke="none" fill="none"></rect>
                                                                                                <rect x="0.5" y="0.5" width="63" height="125" rx="4.5" fill="none" stroke="#3B3A77"></rect>
                                                                                              </g>
                                                                                              <rect id="Rectangle_4417" data-name="Rectangle 4417" width="58" height="110" rx="5" transform="translate(3 9.652)" fill="#DCE1F7"></rect>
                                                                                              <circle id="Ellipse_705" data-name="Ellipse 705" cx="2.5" cy="2.5" r="2.5" transform="translate(3 3.652)" fill="#3B3A77" opacity="0.5"></circle>
                                                                                            </g>
                                                                                        </g>
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="label-title">Stories (1080x1920px)</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <br>
                                                        <div class="row">
                                                            <div class="col-md-3 div-temas">
                        									    <div class="form-group">
                            									    <h4>Temas</h4>
                            									    <p>Transforme sua presença online com conteúdos que conectam e inspiram.</p>
                            									    <br>
                            									    <select class="form-control" id="tema" name="tema">
                            									        <option value="">Selecione o Tema</option>
                            									        <?php 
                            									            if(count($temas) >0){
                            									                foreach($temas as $tema){ 
                            									        ?>
                            									                    <option value="<?=$tema->id?>"><?=$tema->nome?></option>
                            									            <? } ?>
                            									        <? } ?>
                            									    </select>
                        									    </div>
                        									    <div class="form-group">
                        									        <button class="btn btn-mapfre btn-buscar" style="width:100%;">Buscar</button>
                        									    </div>
                        									 </div>
                                                        </div> 
                                                        <div class="div-artes">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h3>Artes</h3>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                            <div class="row artes">
                                                               
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="example example-basic mt-10">
                                                                        <div class="example-preview">
                                                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                                                <div class="d-flex flex-wrap py-2 mr-3 paginacao">
    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div> 
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Base Table Widget 2-->
                                	</div>
                                </div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php include  __DIR__.'/../includes/footer.php'; ?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
        <?php  include __DIR__.'/../includes/quickUser.php'; ?>

		<!--begin::Scrolltop-->
		<?php include __DIR__.'/../includes/scrollToTop.php'; ?>
		<!--end::Scrolltop-->
        <!-- Modal-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/dashboard/plugins/global/plugins.bundle.js?v=7.2.9"></script>
		<script src="assets/dashboard/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.9"></script>
		<script src="assets/dashboard/js/scripts.bundle.js?v=7.2.9"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/dashboard/js/pages/widgets.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!--end::Page Scripts-->
        <!--begin::Page Scripts(used by this page)-->
        <script>
            $(".btn-tipo").click(function(){
                var tipo = $(this).data("value");
                $("#tipo").val(tipo);
                $('.btn-tipo').each(function(){
                    $(this).removeClass("active");    
                });
                $(this).addClass("active");
                $(".div-formatos").show();
                $(".div-temas").show();
            });
            function selecionaFormato(nome, elm){
                if($(elm).hasClass("formato-active")){
                    $(elm).removeClass( "formato-active" );
                    $("#formato").val('');
                } else {
                    $( ".formato" ).each(function() {
                      $( this ).removeClass( "formato-active" );
                    });
                    $("#formato").val(nome);
                    $(elm).addClass('formato-active');
                }
            }
            function buscarArtes(){
                $(".artes").html('');
                tipo = $("#tipo").val();
                formato = $("#formato").val();
                tema = $("#tema").val();  
                page = $("#page").val();  
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "redes-sociais/lista-artes",
                    data: { tipo:tipo, formato:formato, tema:tema, page:page },
                    processData: true,
                    success: function(data){
                        if(data.sucesso == true){
                            $(".artes").html(data.artes);
                            $(".paginacao").html(data.paginacao);
                            $(".div-artes").show();
                        } else {
                            Swal.fire("Erro!", "Ocorreu um erro!", "error");
                        }
                    }
                }); 
            }
        </script>
        <script>
            $(".btn-buscar").click(function(){
                buscarArtes();
            });
            function mudaPage(page){
                $("#page").val(page);   
                buscarArtes();
            }
		</script>
	</body>
	<!--end::Body-->
</html>
