<?php
use App\Models\LeadCategoria;
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
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css">
		<link href="assets/css/pages/wizard/wizard-3.css?v=7.2.9" rel="stylesheet" type="text/css"/>
		<?php include __DIR__.'/../../includes/tags.php'; ?>
		<style>
		    #form-dados{
		        display:none;
		    }
		    .inputFile {
              position: relative;
              display: inline-block;
              cursor: pointer;
              height: 40px;
              width:100%;
            }
            
            .inputFile input {
              margin: 0;
              filter: alpha(opacity=0);
              opacity: 0;
            }
            
            .inputFile-custom {
              text-align: left;
              position: absolute;
              top: 0;
              right: 0;
              left: 0;
              z-index: 5;
              height: 40px;
              padding: .5rem 1rem;
              line-height: 25px;
              color: #444;
              background-color: #f1f1f1;
              border: 1px solid #ddd;
              border-radius: 3px;
              box-shadow: inset 0 .5px .5px rgba(0, 0, 0, .05);
              user-select: none;
            }
            
            .inputFile-custom:before {
              position: absolute;
              top: 0;
              right: 0;
              bottom: 0;
              z-index: 6;
              display: block;
              content: "Procurar";
              height: 40px;
              padding: .5rem 1rem;
              line-height: 25px;
              color: #f1f1f1;
              background-color: #333;
              border: 1px solid #333;
              border-radius: 0 3px 3px 0;
            }
            
            .inputFile-custom:after {
              content: "Escolha o arquivo";
            }
            .dropzone-msg{
              align-items: center;
              justify-content: center;
              height: 100px;
              background: #f9f9f9;
            }
            .table-sm{
                width:100%;
            }
            input[type="file"] {
                left: 0;
                opacity: 0;
                top: 0;
                bottom: 0;
                width: 100%;
                position: absolute;
                cursor:pointer;
            }
            #filename{ text-align:center; font-weight:bold; }
            .divFile {
                width: 100%;
                text-align:center;
                align-items: center;
                justify-content: center;
                background: #ffffff;
                border: 1px dotted #bebebe;
                border-radius: 2px;
                height: 150px;
                display:inherit;
                padding-top:10%;
                cursor:pointer;
            }
            
            .dragAndDrop label {
                display: inline-block;
                position: relative;
                height: 150px;
                width: 400px;
            }
            
            .divFile.dragover {
                background-color: #aaa;
            }
  
            .table-sm th{ height:30px; font-weight:bold; font-size:14px; }
            .table-sm td{ height:30px; font-weight:normal; font-size:13px; }
            .btn.btn-light-danger { background-color: transparent !important; }
            .labelForFile{ width:60%; left:20%; margin-top:40px; text-align:center; position:absolute; }
		</style>
	</head>
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
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
						<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Details-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Importar Leads</h5>
									<!--end::Title-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--begin::Search Form
								</div>
								<!--end::Details-->
							</div>
						</div>
						<!--end::Subheader-->
						<div class="row">
						    
						</div>
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
							    <div class="card card-custom">
                                    <div class="card-body p-0">
                                        <!--begin: Wizard Body-->
                                        <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                                            <div class="col-xl-12 col-xxl-7">
                                                <!--begin: Wizard Form-->
                                                <form id="uploadForm" enctype="multipart/form-data">
                                                    <!--begin: Wizard Step 1-->
                                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                                        <h4 class="mb-10 font-weight-bold text-dark text-center">Faça o upload do seu arquivo .csv</h4>
                                                        <div class="row">
                                            				<div class="col-lg-12 col-md-12 col-sm-12 text-center dragAndDrop">
                                            				    <label for="test">
                                                                    <div class="divFile">
                                                                        <svg aria-hidden="true" focusable="false" class="uppy-c-icon uppy-DragDrop-arrow" width="16" height="16" viewBox="0 0 16 16">
                                        				                <path d="M11 10V0H5v10H2l6 6 6-6h-3zm0 0" fillRule="evenodd"></path>
                                        				                </svg>
                                                                        <br>
                                            				            <br>
                                            				            Solte seu arquivo aqui ou clique para procurar
                                            				        </div>
                                                                    <input type="file" id="file" name="file" required>
                                                                </label>
                                                                <p id="filename"></p>
                                    						   
                                    						    <span class="dropzone-msg-desc text-center">As colunas devem seguir a ordem: nome, e-mail, telefone e origem(opcional)</span>
                                            				</div>
                                                        </div>
                                                    </div>
                                                    <!--end: Wizard Step 1-->
                                                    <!--begin: Wizard Actions-->
                                                    <div class="d-flex justify-content-center border-top mt-5 pt-10">
                                                        <div>
                                                            <button type="button" class="btn btn-mapfre btn-enviar btn-sm font-weight-bolder text-uppercase px-9 py-4">Enviar</button>
                                                        </div>
                                                    </div>
                                                    <!--end: Wizard Actions-->
                                                </form>
                                            </div>
                                            <div class="col-md-12 col-xxl-9">
                                                <!--end: Wizard Form-->
                                                <form id="form-dados" enctype="multipart/form-data">
                                                    <!--begin: Wizard Step 1-->
                                                    <h4 class="mb-10 font-weight-bold text-dark text-center">Contatos processados</h4>
                                                    <p><span class="dropzone-msg-desc text-center">Foram processados o total de <a href="javascript:void(0)" class="btn btn-icon btn-light-primary pulse pulse-primary">
                                                    <span class="pulse-ring"></span> <span class="countLeads"></span></a> Contatos. Verifique a lista abaixo, e ao final, clique em finalizar para salvar.</span></p>

                                                    <div class="dados-importacao" style="max-height:1200px; overflow-x:hidden;  overflow-y:scroll;">
                                                        
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                        <h4 class="mb-10 font-weight-bold text-dark text-center">Categorias</h4>
                                                        <p><span class="dropzone-msg-desc text-center">Selecione as categorias que você deseja vincular os contatos importados</span></p>
                                                        <br>
                                                        <div class="checkbox-list">
                                                            <?
                                                                $categorias = LeadCategoria::find(0, array("corretora = '".$_SESSION['corretora_id']."'"));
                                                                if(count($categorias) >=1){
                                                                    foreach($categorias as $categoria){
                                                            ?>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="categoria[]" id="categoria[]" value="<?=$categoria->id?>">
                                                                            <span></span>
                                                                           <?=$categoria->nome?>
                                                                        </label>
                                                            <?      }
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <!--end: Wizard Step 1-->
                                                    <!--begin: Wizard Actions-->
                                                    <div class="d-flex justify-content-center border-top mt-5 pt-10">
                                                        <div>
                                                            <button type="button" class="btn btn-warning btn-cancelar btn-sm font-weight-bolder text-uppercase px-9 py-4">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary btn-finalizar btn-sm font-weight-bolder text-uppercase px-9 py-4">Finalizar</button>
                                                        </div>
                                                    </div>
                                                    <!--end: Wizard Actions-->
                                                </form>
                                            </div>
                                        </div>
                                        <!--end: Wizard Body-->
                                    </div>
                                    <!--end: Wizard-->
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
	<script type="text/javascript">
	    var fileInput = document.querySelector('input[type=file]');
        var filenameContainer = document.querySelector('#filename');
        var dropzone = document.querySelector('div');
        
        fileInput.addEventListener('change', function() {
        	filenameContainer.innerText = fileInput.value.split('\\').pop();
        });
        
        fileInput.addEventListener('dragenter', function() {
        	dropzone.classList.add('dragover');
        });
        
        fileInput.addEventListener('dragleave', function() {
        	dropzone.classList.remove('dragover');
        });

        $(document).ready(function(){
            $('.btn-enviar').click(function(){
                $("#form-dados").hide();
                $(".dados-importacao").html('');
                $('.btn-enviar').attr("disabled", true);
                $('.btn-enviar').text("Carregando...");
                var form_data = new FormData();           
                form_data.append('file', $('#file').prop('files')[0]);                  
                $.ajax({
                    url: 'dashboard/lista-de-contatos/importaContatos',
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,  
                    type: 'post',
                    success: function(data){
                        console.log(data)
                        if(data.sucesso == true){
                            $(".countLeads").text(data.count);
                            $("#form-dados").show();
                            $(".dados-importacao").html(data.html);
                            $('.btn-enviar').hide();
                            $('#uploadForm').hide();
                        } else {
                            $('.btn-enviar').attr("disabled", false);
                            $('.btn-enviar').text("Enviar");
                            Swal.fire("Erro!", data.erro, "error");
                        }
                    }
                });
            });
        });
        $(".btn-cancelar").click(function(){
            $("#form-dados").hide();
            $(".dados-importacao").html('');
            $('#uploadForm').show();
            $('.btn-enviar').attr("disabled", false);
            $('.btn-enviar').text("Enviar");
        });
        function removeLead(elm){
            $(elm).closest('tr').remove();
        }
        $("#form-dados").submit(function(e){
            e.preventDefault();
            formDados = $("#form-dados").serialize();
            $('.btn-finalizar').attr("disabled", true);
            $('.btn-finalizar').text("Aguarde...");
            $.ajax({
                url: 'dashboard/lista-de-contatos/salvaContatos.php',
                dataType: "json",
                processData: true,
                data: formDados,  
                type: 'post',
                success: function(data){
                    console.log(data)
                    if(data.sucesso == true){
                        Swal.fire("Salvo!", data.relatorio, "success");
                        setTimeout(function(){ location.href='dashboard/lista-de-contatos/seus-contatos' }, 3000);
                    } else {
                        $('.btn-finalizar').attr("disabled", false);
                        $('.btn-finalizar').text("Finalizar");
                        Swal.fire("Erro!", data.erro, "error");
                    }
                }
            });
        });
    </script>
	</body>
	<!--end::Body-->
</html>