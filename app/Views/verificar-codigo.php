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
            .code-input {
                width: 50px;
                height: 55px;
                font-size: 24px;
                margin-right: 5px;
            }
            .code-input:last-child {
                margin-right: 0;
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
				<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-5 mx-auto">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-center">
						<!--begin::Forgot-->
						<div class="login-form login-verify">
							<!--begin::Form-->
							<form class="form" id="kt_login_verify_form">
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
									<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Autenticação de 2 fatores</h3>
									<p class="text-muted font-weight-bold font-size-h4">Digite o código de 6 dígitos enviado ao seu e-mail:</p>
								</div>
								<!--end::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="mb-3"></label>
                                      <div class="d-flex justify-content-center gap-2 mb-3">
                                        <input type="text" maxlength="1" class="form-control form-control-solid text-center code-input" name="code[]" autofocus>
                                        <input type="text" maxlength="1" class="form-control form-control-solid text-center code-input" name="code[]">
                                        <input type="text" maxlength="1" class="form-control form-control-solid text-center code-input" name="code[]">
                                        <input type="text" maxlength="1" class="form-control form-control-solid text-center code-input" name="code[]">
                                        <input type="text" maxlength="1" class="form-control form-control-solid text-center code-input" name="code[]">
                                        <input type="text" maxlength="1" class="form-control form-control-solid text-center code-input" name="code[]">
                                      </div>
								</div>
								<div class="form-group">
								    <input type="hidden" name="recaptcha_token" id="recaptcha_token" class="recaptcha_token">
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group pb-lg-0 text-center">
									<button type="button" id="kt_login_verify_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Verificar</button>
								</div>
								<!--end::Form group-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Forgot-->
					</div>
					<!--end::Content body-->
					
					<!--begin::Content footer-->
					<div class="d-flex justify-content-lg-start justify-content-center align-items-end py-5 py-lg-0">
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
		<script src="assets/js/pages/custom/login/verificacao.js?v=<?=CSS_VERSION?>"></script>
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
            })(jQuery);
            
            $('.code-input').on('input', function () {
              const val = $(this).val();
              if (val.length === 1) {
                $(this).next('.code-input').focus();
              }
            });
            
            // Voltar com backspace
            $('.code-input').on('keydown', function (e) {
              if (e.key === 'Backspace' && $(this).val() === '') {
                $(this).prev('.code-input').focus();
              }
            });
            
            // Cola múltiplos dígitos e preenche todos os campos
            $('.code-input').on('paste', function (e) {
              e.preventDefault();
              const pasteData = (e.originalEvent || e).clipboardData.getData('text').replace(/\D/g, '');
              const inputs = $('.code-input');
            
              for (let i = 0; i < inputs.length; i++) {
                inputs.eq(i).val(pasteData[i] || '');
              }
            
              // Foca no último preenchido
              for (let i = 0; i < inputs.length; i++) {
                if (inputs.eq(i).val() === '') {
                  inputs.eq(i).focus();
                  break;
                }
              }
            });
        </script>
	</body>
	<!--end::Body-->
</html>