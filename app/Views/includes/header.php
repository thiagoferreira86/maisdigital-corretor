<?php
if($usuario->primeiro_acesso == 's' && $subativo != 'Perfil' && $usuario->validado == 'n'){
    header("Location: dashboard/perfil");
    exit;
} elseif($usuario->primeiro_acesso == 'n' && $subativo != 'Aceite' && $usuario->validado == 'n'){
    header("Location: dashboard/aceite-termos");
    exit;
}
?>
<!--begin::Header-->
<div id="kt_header" class="header flex-column header-fixed">
	<div class="header-top">
		<div class="container">
			<div class="d-none d-xl-flex align-items-center">
				<a href="" class="mr-20"><img alt="Logo" src="<?=LOGOTIPO_BRANCO?>" class="max-h-35px" /></a>
				<?php if($usuario->primeiro_acesso == 'n' && $usuario->validado == 's'){ ?>
				<ul class="header-tabs nav align-self-end font-size-sm" role="tablist">
					<li class="nav-item">
						<a href="<?=BASE?>" class="nav-link py-4 px-6 <? if($ativa == 'Home'){ echo 'active'; } ?>" role="button"><i class="flaticon-home-1"></i>&nbsp; Início</a>
					</li>
					<li class="nav-item">
						<a href="dashboard/agenda" class="nav-link py-4 px-4 <? if($ativa == 'Agenda'){ echo 'active'; } ?>" role="button"><i class="far fa-calendar-alt"></i>&nbsp; Agenda</a>
					</li>
					<li class="nav-item">
						<a href="dashboard/redes-sociais" class="nav-link py-4 px-4 <? if($ativa == 'Redes Sociais'){ echo 'active'; } ?>" role="button"><i class="fas fa-share-alt"></i>&nbsp;Redes Sociais</a>
					</li>
					<li class="nav-item">
						<a href="dashboard/pagina-de-vendas" class="nav-link py-4 px-4 <? if($ativa == 'Página de Vendas'){ echo 'active'; } ?>" data-toggle="tab" data-target="#kt_header_tab_5" role="tab"><i class="fas fa-equals"></i>&nbsp;Página de Vendas</a>
					</li>
					<li class="nav-item">
						<a href="dashboard/cartoes-digitais" class="nav-link py-4 px-4 <? if($ativa == 'Cartões Digitais'){ echo 'active'; } ?>" data-toggle="tab" data-target="#kt_header_tab_6" role="tab"><i class="fas fa-equals"></i>&nbsp;Cartões Digitais</a>
					</li>
					<li class="nav-item">
						<a href="dashboard/email-marketing" class="nav-link py-4 px-4 <? if($ativa == 'E-mail Marketing'){ echo 'active'; } ?>" data-toggle="tab" data-target="#kt_header_tab_9" role="tab"><i class="flaticon2-send-1"></i>&nbsp;E-mail Marketing</a>
					</li>
					<li class="nav-item">
						<a href="dashboard/lista-de-contatos" class="nav-link py-4 px-4 <? if($ativa == 'Lista de Contatos'){ echo 'active'; } ?>" data-toggle="tab" data-target="#kt_header_tab_8" role="tab"><i class="fas fa-user-friends"></i>&nbsp;Lista de Contatos</a>
					</li>
					<li class="nav-item">
						<a href="dashboard/tutoriais" class="nav-link py-4 px-4 <? if($ativa == 'Tutoriais'){ echo 'active'; } ?>" data-toggle="tab" data-target="#kt_header_tab_7" role="tab"><i class="fas fa-book-reader"></i>&nbsp;Tutoriais</a>
					</li>
				</ul>
				<? } ?>
			</div>
			<div class="topbar bg-primary">
				<div class="dropdown">
					<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
						<div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-white">
							<span class="svg-icon svg-icon-xl">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
										<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
									</g>
								</svg>
							</span>
							<span class="pulse-ring"></span>
						</div>
					</div>
					<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
						<form>
							<div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(assets/media/misc/bg-1.jpg)">
								<h4 class="d-flex flex-center rounded-top">
									<span class="text-white">Notificações</span>
									<span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">0</span>
								</h4>
							</div>
							<div class="tab-content">
								<div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
									<!--<div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">
										<div class="d-flex align-items-center mb-6">
											<div class="symbol symbol-40 symbol-light-primary mr-5">
												<span class="symbol-label">
													<span class="svg-icon svg-icon-lg svg-icon-primary">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
																<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
															</g>
														</svg>
													</span>
												</span>
											</div>
											<div class="d-flex flex-column font-weight-bold">
												<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Cool App</a>
												<span class="text-muted">Marketing campaign planning</span>
											</div>
										</div>
									</div>-->
									<div class="d-flex flex-center pt-7">
										<a href="#" class="btn btn-light-primary font-weight-bold text-center">Ver todas</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="topbar-item">
					<div class="btn btn-icon btn-hover-transparent-white w-sm-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
						<div class="d-flex flex-column text-right pr-sm-3">
							<span class="text-white opacity-50 font-weight-bold font-size-sm d-none d-sm-inline"><?=$corretoraNome[0]?></span>
							<span class="text-white font-weight-bolder font-size-sm d-none d-sm-inline"><?=$corretoraNome[1] ?? ''?></span>
						</div>
						<span class="symbol symbol-35">
							<span class="symbol-label font-size-h5 font-weight-bold text-white bg-white-o-30"><?=substr($corretoraNome[0], 0, 1)?></span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header-bottom">
		<div class="container">
		    <?php if($usuario->primeiro_acesso == 'n' && $usuario->validado == 's'){ ?>
			<div class="header-navs header-navs-left" id="kt_header_navs">
			    
				<ul class="header-tabs p-5 p-lg-0 d-flex d-lg-none nav nav-bold nav-tabs " role="tablist">
					<li class="nav-item mr-2">
						<a href="<?=BASE?>" class="nav-link btn btn-clean <? if($ativa == 'Home'){ echo 'active'; } ?>" role="button"><i class="flaticon-home-1"></i>&nbsp;&nbsp; Início</a>
					</li>
					<li class="nav-item mr-2">
						<a href="dashboard/agenda" class="nav-link btn btn-clean <? if($ativa == 'Agenda'){ echo 'active'; } ?>" role="button"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp; Agenda</a>
					</li>
					<li class="nav-item mr-2">
						<a href="dashboard/redes-sociais" class="nav-link btn btn-clean <? if($ativa == 'Redes Sociais'){ echo 'active'; } ?>" role="button"><i class="fas fa-share-alt"></i>&nbsp;&nbsp; Redes Sociais</a>
					</li>
					<li class="nav-item">
						<a href="dashboard/pagina-de-vendas" class="nav-link btn btn-clean <? if($ativa == 'Página de Vendas'){ echo 'active'; } ?>" data-toggle="tab" data-target="#kt_header_tab_5" role="tab"><i class="fas fa-equals"></i>&nbsp;Página de Vendas</a>
					</li>
					<li class="nav-item">
						<a href="dashboard/cartao-digital" class="nav-link btn btn-clean <? if($ativa == 'Página de Vendas'){ echo 'active'; } ?>" data-toggle="tab" data-target="#kt_header_tab_6" role="tab"><i class="fas fa-equals"></i>&nbsp;Cartão Digital</a>
					</li>
					<li class="nav-item">
						<a href="dashboard/email-marketing" class="nav-link btn btn-clean <? if($ativa == 'E-mail Marketing'){ echo 'active'; } ?>" data-toggle="tab" data-target="#kt_header_tab_9" role="tab"><i class="flaticon2-send-1"></i>&nbsp;E-mail Marketing</a>
					</li>
					<li class="nav-item mr-2">
						<a href="dashboard/lista-de-contatos" class="nav-link btn btn-clean <? if($ativa == 'Lista de Contatos'){ echo 'active'; } ?>" data-toggle="tab" data-target="#kt_header_tab_8" role="tab"><i class="fas fa-user-friends"></i>&nbsp;&nbsp; Lista de Contatos</a>
					</li>
					<li class="nav-item mr-2">
						<a href="dashboard/tutoriais" class="nav-link btn btn-clean <? if($ativa == 'Tutoriais'){ echo 'active'; } ?>" data-toggle="tab" data-target="#kt_header_tab_7" role="tab"><i class="fas fa-book-reader"></i>&nbsp;&nbsp; Tutoriais</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane py-5 p-lg-0 justify-content-between <? if($ativa == 'Página de Vendas'){ echo 'show active'; } ?>" id="kt_header_tab_5">
						<div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center">
							<a href="dashboard/pagina-de-vendas/suas-paginas" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Suas Páginas'){ echo 'subativo'; } ?>"><i class="fas fa-copy"></i> Suas Páginas</a>
							<a href="dashboard/pagina-de-vendas/modelos-prontos" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Modelos Prontos'){ echo 'subativo'; } ?>"> <i class="far fa-images"></i> Modelos Prontos</a>
					    </div>
					</div>
					<div class="tab-pane py-5 p-lg-0 justify-content-between <? if($ativa == 'Cartão Digital'){ echo 'show active'; } ?>" id="kt_header_tab_6">
						<div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center">
							<a href="dashboard/cartao-digital/seus-cartoes" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Seus Cartões'){ echo 'subativo'; } ?>"><i class="far fa-id-card"></i> Seus Cartões</a>
							<a href="dashboard/cartao-digital/modelos-prontos" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Modelos Prontos'){ echo 'subativo'; } ?>"> <i class="far fa-images"></i> Modelos Prontos</a>
						</div>
					</div>
			        <div class="tab-pane py-5 p-lg-0 justify-content-between <? if($ativa == 'Tutoriais'){ echo 'show active'; } ?>" id="kt_header_tab_7">
						<div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center">
							<a href="dashboard/tutoriais/treinamentos" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Treinamentos'){ echo 'subativo'; } ?>"><i class="fas fa-envelope-open-text"></i> Treinamentos</a>
							<a href="dashboard/tutoriais/digital-news" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Digital News'){ echo 'subativo'; } ?>"><i class="far fa-images"></i> Digital News</a>
							<a href="dashboard/tutoriais/materiais" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Materiais'){ echo 'subativo'; } ?>"><i class="far fa-file-pdf"></i> Materiais</a>
						</div>
					</div>
					<div class="tab-pane py-5 p-lg-0 justify-content-between <? if($ativa == 'Leads'){ echo 'show active'; } ?>" id="kt_header_tab_8">
						<div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center">
							<a href="dashboard/lista-de-contatos/meus-contatos" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Meus Leads'){ echo 'subativo'; } ?>"><i class="fas fa-users"></i> Meus Contatos</a>
							<a href="dashboard/lista-de-contatos/editar-varios-contatos" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Edição em Massa'){ echo 'subativo'; } ?>"><i class="fas fas fa-users-cog"></i> Editar vários Contatos</a>
							<a href="dashboard/lista-de-contatos/categorias" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Categorias'){ echo 'subativo'; } ?>"><i class="fas fa-th-list"></i> Categorias</a>
							<a href="dashboard/lista-de-contatos/importar-contatos" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Importar Contatos'){ echo 'subativo'; } ?>"><i class="fas fa-file-import"></i> Importar Contatos</a>
							<a href="dashboard/lista-de-contatos/suas-importacoes" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Suas Importações'){ echo 'subativo'; } ?>"><i class="fas fa-cloud-upload-alt"></i> Suas Importações</a>
						</div>
					</div>
				    <div class="tab-pane py-5 p-lg-0 justify-content-between <? if($ativa == 'E-mail Marketing'){ echo 'show active'; } ?>" id="kt_header_tab_9">
						<div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center">
							<a href="dashboard/email-marketing/seus-emails" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Meus E-mails'){ echo 'subativo'; } ?>"><i class="fas fa-envelope-open-text"></i> Seus E-mails</a>
							<a href="dashboard/email-marketing/modelos-prontos" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Modelos Prontos'){ echo 'subativo'; } ?>"><i class="far fa-images"></i> Modelos Prontos</a>
							<a href="dashboard/email-marketing/campanhas" class="btn btn-mapfre font-weight-bold mr-3 my-2 my-lg-0 <? if($subativo == 'Campanhas'){ echo 'subativo'; } ?>"><i class="far fa-calendar-alt"></i> Campanhas</a>
						</div>
						<!--end::Menu-->
					</div>
				</div>
			</div>
			<div class="header-navs-overlay"></div>
			<?php } ?>
		</div>
	</div>
</div>