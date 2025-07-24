<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title><?=TITULO?></title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="<?=BASE?>" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <script src="https://www.google.com/recaptcha/api.js?render=<?=RECAPTCHA_SITEKEY?>"></script>
		<!--end::Global Theme Styles-->
        <link rel="shortcut icon" href="<?=FAVICON?>" />
        <script>
            let recaptcha_sitekey = '<?=RECAPTCHA_SITEKEY?>';
        </script>
		<style>
        	.box-cookies.hide {
                display: none !important;
            }
		    .text-primary{ color:#da1e05 !important; }
		    .box-cookies {
                position: fixed;
                background: #f6f6f6;
                width: 100%;
                z-index: 998;
                bottom: 0;
                text-align: center;
                padding: 20px 0;
            }
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<!--begin::Aside -->
				<div class="login-aside d-flex flex-column flex-row-auto" style="background:#D81E05;">
					<!--begin::Aside Top-->
					<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
						<!--begin::Aside header-->
						<a href="#" class="text-center mb-10"><img src="<?=LOGOTIPO_BRANCO?>" class="max-h-70px" alt="" /></a>
						<!--end::Aside header-->
						<!--begin::Aside title-->
						<!--<a href="https://bit.ly/4jK1Ulx" target="_blank" rel="nofollow"><img src="imagens/masterclass.png" alt="" style="width:80%; margin-left:10%"/></a>-->
						<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;"><br /></h3>
						<!--end::Aside title-->
					</div>
					<!--end::Aside Top-->
					
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-center">
						<!--begin::Signin-->
						<div class="login-form login-signin">
							<!--begin::Form-->
							<form class="form" novalidate="novalidate" id="kt_login_signin_form">
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
									<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Bem vindo(a) a MAPFRE</h3>
									<span class="text-muted font-weight-bold font-size-h4">
									<!--<a href="javascript:;" id="kt_login_signup" class="text-primary font-weight-bolder">Criar uma Conta</a></span>-->
								</div>
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">CPF</label>
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text" name="loginCPF" id="loginCPF" autocomplete="off" placeholder="Somente os números" required/>
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Senha</label>
										<a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Recuperar Senha ?</a>
									</div>
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" name="loginSenha" id="loginSenha" autocomplete="off" required/>
								</div>
								<div class="form-group">
								    <input type="hidden" name="recaptcha_token" id="recaptcha_token" class="recaptcha_token">
								</div>
								<div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
									<button type="button" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Entrar</button>
								</div>
								
								
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
						<!--begin::Forgot-->
						<div class="login-form login-forgot">
							<!--begin::Form-->
							<form class="form" novalidate="novalidate" id="kt_login_forgot_form">
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
									<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Esqueceu sua Senha ?</h3>
									<p class="text-muted font-weight-bold font-size-h4">Digite seu CPF de cadastro</p>
								</div>
								<!--end::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="text" placeholder="CPF somente os números" name="recuperaCPF" id="recuperaCPF" autocomplete="off" required/>
								</div>
								<div class="form-group">
								    <input type="hidden" name="recaptcha_token" id="recaptcha_token" class="recaptcha_token">
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group d-flex flex-wrap pb-lg-0">
									<button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Recuperar</button>
									<button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancelar</button>
								</div>
								<!--end::Form group-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Forgot-->
					</div>
					<!--end::Content body-->
					<!--begin::Content footer-->
					<div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
						<div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
							<span class="mr-1"><?=date("Y")?>©</span>
							<a href="" target="_blank" class="text-dark-75 text-hover-primary"><?=TITULO?></a>
						</div>
						<a href="<?=TERMOS_E_CONDICOES?>" target="_blank" rel="nofollow" class="text-primary font-weight-bolder font-size-lg">Termos & Condições</a>
						<a href="contato" class="text-primary ml-5 font-weight-bolder font-size-lg">Contato</a>
					</div>
					<!--end::Content footer-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/custom/login/login-general.js?v=<?=CSS_VERSION?>"></script>
		<!--end::Page Scripts-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<div class="box-cookies hide">
        	<p class="msg-cookies">
        	    Utilizamos <strong>cookies</strong> para personalizar anúncios e melhorar a sua experiência no site. Ao continuar, você aceita a nossa <a href="politicas-de-privacidade" target="_blank"><b>política de privacidade.</b></a>
        	 </p>
             <button type="button" class="btn-cookies cookies-aceitar botao-continuar btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Continuar</button>
             <button type="button" class="btn-cookies cookies-rejeitar botao-rejeitar btn btn-warning font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Rejeitar</button>
        </div>
        <script>
            (function ($) {
                (() => {
                  if(!localStorage.pureJavaScriptCookies) {
                     document.querySelector(".box-cookies").classList.remove('hide');
                  }
                  const acceptCookies = () => {
                    document.querySelector(".box-cookies").classList.add('hide');
                    localStorage.setItem("pureJavaScriptCookies", "accept");
                  };
                  
                  const rejectCookies = () => {
                    location.href="https://google.com/";
                  };
                  
                  const btnCookies = document.querySelector(".cookies-aceitar");
                  const btnCookiesRejeitar = document.querySelector(".cookies-rejeitar");
                  
                  btnCookies.addEventListener('click', acceptCookies);
                  btnCookiesRejeitar.addEventListener('click', rejectCookies);
                })();
            })(jQuery)
        </script>
	</body>
	<!--end::Body-->
</html>