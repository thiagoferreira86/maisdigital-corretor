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
		<link href="assets/dashboard/css/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
		<link href="assets/dashboard/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dashboard/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dashboard/css/style.bundle.css?v=<?=CSS_VERSION?>" rel="stylesheet" type="text/css" />
		<?php include __DIR__.'/../includes/tags.php'; ?>
		<link href="assets/dashboard/dropzone/dropzone.css" rel="stylesheet">
		<style>
		     .perfil-imagem{
		         width:50%;
		         overflow:hidden;
		     }
		     .perfil-imagem img{
		         width:100%;
		     }
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled subheader-enabled page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<?php include __DIR__.'/../includes/header-mobile.php'; ?>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<?php include __DIR__.'/../includes/header.php'; ?>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Details-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Title-->
									<a href=""><h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Início</h5></a>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Termos de Uso</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Details-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Button-->
									
									<!--end::Button-->
								</div>
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Card-->
								<div class="card card-custom">
									<!--begin::Card header-->
									<div class="card-header card-header-tabs-line nav-tabs-line-3x">
										<!--begin::Toolbar-->
										<div class="card-toolbar">
											<ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
												<!--begin::Item-->
												<li class="nav-item mr-3">
													<a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/dashboard/media/svg/icons/Design/Layers.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
																		<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
														<span class="nav-text font-size-lg">Termos de Uso - Aceite</span>
													</a>
												</li>
												<!--end::Item-->
											</ul>
										</div>
										<!--end::Toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body">
										<div class="tab-content">
											<!--begin::Tab-->
											<div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
											    <div class="row">
											        <div class="col-md-12">
											            <h3>TERMO DE USO – PLATAFORMA DE MARKETING DIGITAL MAPFRE</h3>
											            <br>
                                                        <h4>1. OBJETIVO</h4>
                                                        <p>Este Termo de Uso regula o acesso e a utilização da plataforma de marketing digital
                                                        disponibilizada pela MAPFRE aos seus Corretores e Parceiros, com o objetivo de apoiar ações de
                                                        comunicação e divulgação de produtos e serviços da companhia.</p>
                                                        <h4>2. RESPONSABILIDADES DA MAPFRE</h4>
                                                        <p>A MAPFRE será responsável por fornecer os conteúdos institucionais, textos e materiais de apoio
                                                        a serem utilizados na plataforma, os quais serão enviados ao fornecedor responsável pela
                                                        operação técnica da ferramenta (Segbox).</p>
                                                        <h4>3. USO DA MARCA MAPFRE</h4>
                                                        <p>O uso da marca MAPFRE em campanhas de mídia paga está sujeito às seguintes condições:
                                                         É expressamente proibido o uso da marca ou qualquer referência à palavra 'MAPFRE' em</p>
                                                        campanhas de mídia paga realizadas pelos usuários da plataforma, salvo mediante</p>
                                                        autorização prévia e formal da companhia.</p>
                                                        <p> Em caso de uso indevido da marca, a MAPFRE se reserva o direito de solicitar a remoção
                                                        imediata do anúncio, bem como aplicar penalidades cabíveis, inclusive responsabilização
                                                        por eventuais danos causados à imagem institucional da empresa.</p>
                                                        <h4>4. PRIVACIDADE E DADOS PESSOAIS</h4>
                                                        <p>A MAPFRE declara que:</p>
                                                        <p> Não realizará qualquer tipo de tratamento, acesso, compartilhamento, armazenamento ou
                                                        análise dos dados importados ou inseridos na plataforma pelos Corretores e Parceiros.</p>
                                                        <p> A responsabilidade pelo tratamento de dados pessoais inseridos na plataforma é exclusiva
                                                        dos usuários, que devem garantir a conformidade com a legislação vigente, especialmente
                                                        a Lei Geral de Proteção de Dados (LGPD).</p>
                                                        <h4>5. DESATIVAÇÃO DE ACESSO</h4>
                                                        <p>O acesso à plataforma será automaticamente desativado após 90 (noventa) dias consecutivos de
                                                        inatividade do usuário. Para reativação, será necessário novo processo de credenciamento.</p>
                                                        <h4>6. ACEITE DO TERMO</h4>
                                                        <p>Ao acessar e utilizar a plataforma, o usuário declara estar ciente e de acordo com os termos aqui
                                                        descritos, comprometendo-se a utilizá-la de forma ética, responsável e em conformidade com as
                                                        diretrizes da MAPFRE. </p>
											        </div>
											        <div class="col-md-12 text-center">
											            <button class="btn btn-mapfre btn-aceitar-termos">Aceitar</button>
											        </div>
											    </div>
											</div>
											<!--end::Tab-->
										</div>
									</div>
									<!--begin::Card body-->
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php include __DIR__.'/../includes/footer.php'; ?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		
		<!-- begin::User Panel-->
		<?php include __DIR__.'/../includes/quickUser.php'; ?>
		<!-- end::User Panel-->

		<!--begin::Scrolltop-->
        <?php include __DIR__.'/../includes/scrollToTop.php'; ?>
		<!--end::Scrolltop-->

		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/dashboard/plugins/global/plugins.bundle.js"></script>
		<script src="assets/dashboard/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/dashboard/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/dashboard/js/pages/custom/user/edit-user.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script>
            <?php
                $e=0;
                $erros = 'Agora você só precisa ler e concordar os nossos Termos de Uso, e poderá iniciar a sua jornada no<br><b>  '.TITULO.'</b><br><br> Ao terminar de ler, clique em aceitar.';
            
                echo 'Swal.fire({title: "Atenção!", html: "'.$erros.'", icon: "info"});';
                
            ?>
        </script>
        <script>
            $(".btn-aceitar-termos").click(function(){
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/aceitar-termos",
                    processData: true,
                    success: function(data){
                        if(data.sucesso == true){
                            Swal.fire("Sucesso!", "Aceite salvo com com Sucesso!", "success");
                            if(data.redirect){
                                setTimeout(function(){ location.href=data.redirect; }, 1000);
                            }
                        } else {
                            Swal.fire("Erro!", data.erro, "error");
                        }
                    }
                }); 
            });
        </script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>