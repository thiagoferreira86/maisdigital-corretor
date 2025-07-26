<!DOCTYPE html>
<html lang="pt-br">
	<head>
	    <base href="<?=BASE?>">
		<meta charset="utf-8" />
		<title><?=TITULO?></title>
		<meta name="description" content="<?=TITULO?>" />
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
		<link href="assets/dashboard/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dashboard/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css">
		<?php include __DIR__.'/../includes/tags.php'; ?>
		<style>
		    .swal2-popup {
                display: flex !important;
                align-content: center;
                align-items: center;
            }
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<?php include __DIR__.'/../includes/header-mobile.php'; ?>
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
        							        <h1>Agenda Estratégica</h1>
        							        <h3>Organize seu calendário com dicas de conteúdos por dia da semana</h3>
    						            </div>
    						        </div>
								</div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card card-custom">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h3 class="card-label">Organize sua agenda</h3>
                                                </div>
                                                <div class="card-toolbar">
                                                    <a href="javascript:void(0)" class="btn btn-mais-evento btn-mapfre font-weight-bold">
                                                        <i class="ki ki-plus icon-md mr-2"></i> Adicionar Evento
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id='calendar'></div>
                                            </div>
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
                                                    <span class="card-label font-weight-bolder text-dark">Dicas de conteúdos</span>
                                                </h3>
                                            </div>
                                            <!--end::Header-->
                                        
                                            <!--begin::Body-->
                                            <div class="card-body pt-2 pb-0 mt-n3">
                                                <table class="tabela-dicas">
                                                    <tr>
                                                        <th>DOM</th>
                                                        <td>Postagens com tom mais leve. Lembre-se que domingo geralmente representa descanso para o seu cliente. Falar sobre curiosidades e atualidades.</td>
                                                    </tr>
                                                    <tr>
                                                        <th>SEG</th>
                                                        <td>Início da semana. Utilizar conteúdos que possam motivar e inspirar. Bastidores da sua corretora. Organização para a semana e frases motivacionais são um bom exemplo de conteúdo.</td>
                                                    </tr>
                                                    <tr>
                                                        <th>TER</th>
                                                        <td> Conteúdo sobre produto que comercializa. Benefícios atrativos, alguma promoção e/ou desconto, campanha. Que tal abrir para que seus clientes façam perguntas à você.</td>
                                                    </tr>
                                                    <tr>
                                                        <th>QUA</th>
                                                        <td>Continue com os conteúdos sobre produtos. Aborde agora depoimentos de clientes e novidades. Pense em conteúdo que interesse o público que pode contratar.</td>
                                                    </tr>
                                                    <tr>
                                                        <th>QUI</th>
                                                        <td>Dia do TBT. Descreva algum evento passado. Curso, eventos, palestras ou lembrança interessante. Diversifique, use videos e fotos reais da corretora.</td>
                                                    </tr>
                                                    <tr>
                                                        <th>SEX</th>
                                                        <td>O final de semana se aproxima. Que tal dar uma dica para seu cliente sobre filmes, livros ou um passeio? Conecte as necessidades a produtos. Continue a estimular o contato de seus clientes. Faça perguntas e enquetes.</td>
                                                    </tr>
                                                    <tr>
                                                        <th>SAB</th>
                                                        <td>Pense em conteúdos de entretenimento. Bastidores, seu cardápio de produtos, etc.</td>
                                                    </tr>
                                                </table>
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
					<?php include __DIR__.'/../includes/footer.php'; ?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
        <?php include __DIR__.'/../includes/quickUser.php'; ?>

        <!-- Modal-->
        <div class="modal fade" id="modalEvento" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Dados do Evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i aria-hidden="true" class="ki ki-close"></i></button>
                    </div>
                    <div class="modal-dica"></div>
                    <form id="form-info-evento">
                        <div class="modal-body">
                            <input type="hidden" id="id" name="id" value="">
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" class="form-control" id="title" name="title"  placeholder="Título do Evento" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Início</label>
                                        <input type="datetime-local" class="form-control" id="start" name="start" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fim</label>
                                        <input type="datetime-local" class="form-control" id="end" name="end" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cor</label>
                                        <input type="color" class="form-control" id="color" name="color" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Detalhes</label>
                                        <textarea class="form-control" id="detalhes" name="detalhes" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-danger font-weight-bold btn-excluir" onclick="excluirEvento(this)" data-id="">Excluir</button>
                            <button type="button" class="btn btn-light-warning font-weight-bold" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary font-weight-bold">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<!--begin::Scrolltop-->
		<?php include __DIR__.'/../includes/scrollToTop.php'; ?>
		<!--end::Scrolltop-->
        <!-- Modal-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/dashboard/plugins/global/plugins.bundle.js"></script>
		<script src="assets/dashboard/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/dashboard/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
	    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.4.2/main.min.css' rel='stylesheet' />
        <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.4.2/main.min.css' rel='stylesheet' />
        <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@4.4.2/main.min.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.4.2/main.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.4.2/main.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.4.2/main.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@4.4.2/main.min.js'></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/dashboard/js/pages/widgets.js"></script>
		<script src="assets/dashboard/plugins/custom/datatables/datatables.bundle.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<!--end::Page Scripts-->
        <!--begin::Page Scripts(used by this page)-->
        <script>
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');
            
            $(document).ready(function(){
                var calendarEl = document.getElementById('calendar');
                var form = $("#form-info-evento");
                var btnExcluir = $(".btn-excluir");
                var btnEvento = $(".btn-mais-evento");
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
                    defaultView: 'dayGridMonth',
                    defaultDate: TODAY,
                    views: {
                        dayGridMonth: { buttonText: 'mês' },
                        timeGridWeek: { buttonText: 'semana' },
                        timeGridDay: { buttonText: 'dia' }
                    },
                    locale: 'pt-br',
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    navLinks: true,
                    events:  'estrategias/actions/eventos.php',
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay',
                        
                    },
                    buttonText: { today:'Hoje' }
                });
                
                calendar.render();
                calendar.on('dateClick', function(info) {
                    $("#form-info-evento")[0].reset();
                    $(".btn-excluir").hide().data("id", '');
                    horario = info.dateStr.slice(0,19);                
                    funcao = 'dia';
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "estrategias/actions/evento.php",
                        data: {horario:horario, funcao:funcao },
                        processData: true,
                        success: function(data){
                            console.log(data)
                            if(data.sucesso == true){
                                $("#start").val(data.start);
                                $("#end").val(data.end);
                                $("#modalEvento").modal("show");
                            } else {
                                $("#id").val('');
                                $("#start").val(data.start);
                                $("#end").val(data.end);
                                $("#modalEvento").modal("show");
                            }
                        }
                    });
                });
                calendar.on('eventClick', function(info) {
                    console.log(info)
                    $("#form-info-evento")[0].reset();
                    $(".btn-excluir").hide().data("id", '');
                    id = info.event.id;     
                    funcao = 'evento';
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "estrategias/actions/evento.php",
                        data: {id:id, funcao:funcao },
                        processData: true,
                        success: function(data){
                            console.log(data)
                            if(data.sucesso == true){
                                $("#id").val(data.id);
                                $("#title").val(data.title);
                                $("#start").val(data.start);
                                $("#end").val(data.end);
                                $("#color").val(data.color);
                                $("#detalhes").val(data.detalhes);
                                $(".btn-excluir").show().data("id", data.id);
                                $("#modalEvento").modal("show");
                            } else {
                                $("#id").val('');
                                $("#start").val(data.start);
                                $("#end").val(data.end);
                                $("#modalEvento").modal("show");
                            }
                        }
                    });
                });
                
                
                $("#start").change(function(){
                    dt = $(this).val();
                    console.log(dt);
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "agenda/pegaDica",
                        data: {dt:dt},
                        processData: true,
                        success: function(data){
                            console.log(data)
                            if(data.sucesso == true){
                                $(".modal-dica").html(data.dica);

                            } else {
                                
                            }
                        }
                    })
                });
                
                
                form.submit(function(e){
                    e.preventDefault();
                    formDados = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "estrategias/actions/evento.php?funcao=salvar",
                        data: formDados,
                        processData: true,
                        success: function(data){
                            console.log(data)
                            if(data.sucesso == true){
                                $("#modalEvento").modal("hide");
                                calendar.refetchEvents();
                                $("#form-info-evento")[0].reset();
                                $(".btn-excluir").hide().data("id", '');
                            } else {
                                Swal.fire({
                                    title: "Ooops!",
                                    text: data.erro,
                                    icon: "error"
                                });
                            }
                        }
                    })
                });
                
                btnExcluir.on('click', function(){
                    id = $("#id").val();
                    Swal.fire({
                        title: "Tem certeza que deseja Excluir?",
                        text: "Essa ação não poderá ser revertida.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sim, Tenho certeza!",
                        cancelButtonText: "Não, cancelar!",
                        }).then(function(result) {
                            if (result.value) {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "estrategias/actions/evento.php?funcao=excluir",
                                data: { id:id },
                                processData: true,
                                success: function(data){
                                    console.log(data)
                                    if(data.sucesso == true){
                                        $("#modalEvento").modal("hide");
                                        calendar.refetchEvents();
                                        $("#form-info-evento")[0].reset();
                                        $(".btn-excluir").hide();
                                    } else {
                                        Swal.fire({
                                            title: "Ooops!",
                                            text: data.erro,
                                            icon: "error"
                                        });
                                    }
                                }
                            }); 
                        } 
                    });
                });
                btnEvento.on("click", function(){
                    $("#form-info-evento")[0].reset();
                    $("#modalEvento").modal("show");
                    $(".btn-excluir").hide();
                });
            });
        </script>
	</body>
	<!--end::Body-->
</html>
