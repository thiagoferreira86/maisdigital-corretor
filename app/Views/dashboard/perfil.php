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
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Perfil</span>
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
														<span class="nav-text font-size-lg">Dados de Cadastro</span>
													</a>
												</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="nav-item mr-3">
													<a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/dashboard/media/svg/icons/Communication/Shield-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
																		<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
																		<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
														<span class="nav-text font-size-lg">Alterar Senha</span>
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
											    <form class="form" id="formAlterarDados">
												    <div class="card-body">
    													<!--begin::Row-->
    													<div class="row">
    														<div class="col-xl-2"></div>
    														<div class="col-xl-7 my-2">
    															<!--begin::Row-->
    															<div class="row">
    																<label class="col-3"></label>
    																<div class="col-9">
    																	<h6 class="text-dark font-weight-bold mb-10">Dados:</h6>
    																</div>
    															</div>
    															<!--end::Row-->
    															<!--begin::Group-->
    															<div class="form-group row">
    																<label class="col-form-label col-4 text-lg-right text-left">Nome*</label>
    																<div class="col-8">
    																	<input class="form-control form-control-lg form-control-solid" type="text" id="nome" name="nome" value="<?=$usuario->nome?>" required/>
    																</div>
    															</div>
    															<!--end::Group-->
    															<!--begin::Group-->
    															<div class="form-group row">
    																<label class="col-form-label col-4 text-lg-right text-left">CPF*</label>
    																<div class="col-8">
    																	<input class="form-control cpf form-control-lg form-control-solid" type="text" maxlength="11" readonly disabled value="<?=$usuario->cpf?>" />
    																</div>
    															</div>
    															<!--end::Group-->
    															<!--begin::Group-->
    															<div class="form-group row">
    																<label class="col-form-label col-4 text-lg-right text-left">Telefone/Whatsapp</label>
    																<div class="col-8">
    																	<div class="input-group input-group-lg input-group-solid">
    																		<div class="input-group-prepend">
    																			<span class="input-group-text">
    																				<i class="la la-phone"></i>
    																			</span>
    																		</div>
    																		<input type="text" class="form-control form-control-lg telefone form-control-solid" id="telefone" name="telefone" value="<?=$usuario->telefone?>" placeholder="Telefone" />
    																	</div>
    																</div>
    															</div>
    															<!--end::Group-->
    															<!--begin::Group-->
    															<div class="form-group row">
    																<label class="col-form-label col-4 text-lg-right text-left">E-mail*</label>
    																<div class="col-8">
    																	<div class="input-group input-group-lg input-group-solid">
    																		<div class="input-group-prepend">
    																			<span class="input-group-text">
    																				<i class="la la-at"></i>
    																			</span>
    																		</div>
    																		<input type="email" class="form-control form-control-lg form-control-solid" id="email" name="email" value="<?=$usuario->email?>" required/>
    																	</div>
    																</div>
    															</div>
    															<!--end::Group-->
    													
    														</div>
    													</div>
    													<!--end::Row-->
													</div>
													<!--begin::Footer-->
													<div class="card-footer pb-0">
														<div class="row">
															<div class="col-xl-2"></div>
															<div class="col-xl-7">
																<div class="row">
																	<div class="col-3"></div>
																	<div class="col-9 text-right">
																		<button class="btn btn-mapfre font-weight-bold btn-sm px-3 font-size-base" type="submit">Salvar</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												    <!--end::Footer-->
												</form>
											</div>
											<!--end::Tab-->
											<!--begin::Tab-->
											<div class="tab-pane px-7" id="kt_user_edit_tab_3" role="tabpanel">
												<!--begin::Body-->
												<form class="form" id="formAlterarSenha">
													<div class="card-body">
														<!--begin::Row-->
														<div class="row">
															<div class="col-xl-2"></div>
															<div class="col-xl-7">
																<!--begin::Row-->
																<div class="row">
																	<label class="col-3"></label>
																	<div class="col-9">
																		<h6 class="text-dark font-weight-bold mb-10">Altere sua Senha</h6>
																	</div>
																</div>
																<!--end::Row-->
																<!--begin::Group-->
																<div class="form-group row">
																	<label class="col-form-label col-4 text-lg-right text-left" for="senhaAtual">Senha atual</label>
																	<div class="col-8">
    																	<div class="input-group">
    																		<input type="password" class="form-control form-control-solid" id="senha_atual" name="senha_atual" required>
    																	</div>
    																</div>
																</div>
																<!--end::Group-->
																<div class="form-group row">
                                                                    <label class="col-form-label col-4 text-lg-right text-left" for="novaSenha">Nova senha</label>
                                                                    <div class="col-8">
                                                                        <div class="input-group">
                                                                          <input type="password" class="form-control form-control-solid" id="novaSenha" name="nova_senha" required minlength="8" maxlength="20">
                                                                          <div class="input-group-append">
                                                                            <button class="btn btn-secondary" type="button" id="mostrarSenha">
                                                                              <i class="fas fa-eye"></i>
                                                                            </button>
                                                                          </div>
                                                                        </div>
                                                                        <small id="forcaSenha" class="form-text text-muted"></small>
                                                                    </div>
                                                                </div>
																<!--end::Group-->
																<div class="form-group row">
                                                                    <label class="col-form-label col-4 text-lg-right text-left" for="confirmar_nova_senha">Confirmar nova senha</label>
                                                                    <div class="col-8">
                                                                        <input type="password" class="form-control form-control-solid" id="confirmar_nova_senha" name="confirmar_nova_senha" required>
                                                                        <small id="mensagemSenha" class="form-text"></small>
                                                                    </div>
                                                              </div>
															</div>
														</div>
														<!--end::Row-->
													</div>
													<!--end::Body-->
													<!--begin::Footer-->
													<div class="card-footer pb-0">
														<div class="row">
															<div class="col-xl-2"></div>
															<div class="col-xl-7">
																<div class="row">
																	<div class="col-3"></div>
																	<div class="col-9  text-right">
																		<button class="btn btn-mapfre font-weight-bold btn-sm px-3 font-size-base" type="submit">Salvar</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												    <!--end::Footer-->
												</form>
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
                $erros = 'Antes de começar a utilizar o '.TITULO.', você precisa:<br><br>';
                if(!password_verify(SENHA_PADRAO, $usuario->senha)){
                    $erros .= '<b>- Criar uma nova Senha</b>';
                    $e++;
                }
                if($usuario->email == ''){
                    $erros .= '<br><b>- Cadastrar um e-mail</b>';
                    $e++;
                } 
                if($e>0){
                    echo 'Swal.fire({title: "Atenção!", html: "'.$erros.'", icon: "warning"});';
                }
            ?>
        </script>
        <script>
        // Validador de senha forte
        function senhaForte(s) {
          const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,20}$/;
          return regex.test(s);
        }
        
        // Mostrar/ocultar senha
        $('#mostrarSenha').on('click', function () {
          const input = $('#novaSenha');
          const tipo = input.attr('type') === 'password' ? 'text' : 'password';
          input.attr('type', tipo);
          $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });
        
        // Validação em tempo real
        function atualizarMensagens() {
          const senha = $('#novaSenha').val();
          const confirmar = $('#confirmar_nova_senha').val();
          const forcaMsg = $('#forcaSenha');
          const confMsg = $('#mensagemSenha');
        
          if (senha.length === 0) {
            forcaMsg.text('').removeClass('text-danger text-success');
          } else if (!senhaForte(senha)) {
            forcaMsg.text('Senha fraca: mínimo 8 caracteres, 1 maiúscula, 1 minúscula, 1 número e 1 caractere especial.')
              .removeClass('text-success')
              .addClass('text-danger');
          } else {
            forcaMsg.text('Senha forte.')
              .removeClass('text-danger')
              .addClass('text-success');
          }
        
          if (confirmar.length === 0) {
            confMsg.text('').removeClass('text-success text-danger');
          } else if (senha === confirmar) {
            confMsg.text('Senhas coincidem.').removeClass('text-danger').addClass('text-success');
          } else {
            confMsg.text('As senhas não coincidem.').removeClass('text-success').addClass('text-danger');
          }
        }
        
        $('#novaSenha, #confirmar_nova_senha').on('input', atualizarMensagens);
        
        // Envio via AJAX
        $('#formAlterarSenha').on('submit', function (e) {
            e.preventDefault();
        
            const senhaAtual = $('#senha_atual').val();
            const novaSenha = $('#novaSenha').val();
            const confirmarNovaSenha = $('#confirmar_nova_senha').val();
        
            if (!senhaForte(novaSenha)) {
                Swal.fire('Erro!', 'A nova senha não é forte o suficiente.', 'error');
                return;
            }
            if (novaSenha !== confirmarNovaSenha) {
                Swal.fire('Erro!', 'As senhas não coincidem.', 'error');
                return;
            }
            $.ajax({
                url: 'dashboard/perfil/atualiza-senha',
                method: 'POST',
                data: {
                    senha_atual: senhaAtual,
                    nova_senha: novaSenha
                },
                success: function (data) {
                    if (data.sucesso) {
                        Swal.fire('Salvo!', data.mensagem || 'Senha alterada com sucesso!', 'success');
                        $('#formAlterarSenha')[0].reset();
                        $('#forcaSenha, #mensagemSenha').text('').removeClass('text-danger text-success');
                        if(data.redirect){
                            setTimeout(function(){ location.href=data.redirect; }, 1000);
                        }
                    } else {
                        Swal.fire('Erro!', data.erro || 'Erro ao alterar a senha.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Erro!', 'Erro de comunicação com o servidor.', 'error');
                }
            });
        });
        </script>
        <script>
            $("#formAlterarDados").submit(function(e){
                e.preventDefault();
                formDados = $(this).serialize();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "dashboard/perfil/atualiza-dados",
                    data: formDados,
                    processData: true,
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            Swal.fire("Salvo!", "Dados atualizados com Sucesso!", "success");
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