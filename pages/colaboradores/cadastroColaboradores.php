
<?php 
session_start();
if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['idEmpresa']) == true))
{
  unset($_SESSION['user']);
  unset($_SESSION['idEmpresa']);
  session_destroy();
  header('location:../login.php');
  }
 

include '../opendb.php';
include_once('../func.php');

$row=null;
	
if(isset($_GET["id"])) {
	$result = mysqli_query($mysql_conn, "select * from colaboradores where idColaborador=".$_GET["id"]);
	$row	= mysqli_fetch_array($result);;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../../dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>

        <?php include_once('../menu.php'); ?>
        <div id="layoutSidenav_content">
                <main>
				<div class="container-fluid">
                        <h1 class="mt-4">Colaboradores</h1>
               			<div class="row">
                  			<div class="col-xl-8">
									<div class="card mb-8">
										<div class="card-header">
											<i class="fas fa-user mr-1"></i> <p id="exibirNome"> Colaborador :</p>
										</div>
										<div class="card-body"><canvas id="cardColaboradores" width="100%" height="40"></canvas>
										<ul class="nav nav-tabs" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" href="#dadosCadastrais" role="tab" data-toggle="tab">Dados Cadastrais</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#carteira" role="tab" data-toggle="tab" id="navCarteira">Carteira</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#rotas" role="tab" data-toggle="tab" id="navRota">Rotas</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#metas" role="tab" data-toggle="tab" id="navMeta">Metas</a>
											</li>
											</ul>

											<!-- Tab panes -->
											<div class="tab-content">
											<div role="tabpanel" class="tab-pane fadein active" id=dadosCadastrais>
										 		<?php include_once('dadosCadastraisColaboradores.php') ?>
						  					</div>
											  
											<div role="tabpanel" class="tab-pane fade" id="carteira">
												<?php include_once('carteiraColaboradores.php') ?>	
             							    </div>

											 <div role="tabpanel" class="tab-pane fade" id="rotas">
												 <?php include_once('rotaColaboradores.php') ?>	
             							    </div>
											 <div role="tabpanel" class="tab-pane fade" id="metas">
												 <?php include_once('metaColaboradores.php') ?>		
             							    </div>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Desenvolvido por GXtec 2020</div>
                            <div>
                                <a href="#">Poltícia de Privacidade</a>
                                &middot;
                                <a href="#">Termos &amp; Condições</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- INSERIR CLIENTE -->
    <div class="modal fade" id="modalFornecedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Inserir Produto</h4>
									</div>
							
							</div>
						</div>
					</div>
				</div>	
<!-- /INSERIR CLIENTE -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

<!-- AUTOCOMPLETE BOOTSTRAP -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../../dist/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

<!-- IMPORT BUTTONS DATATABLES EXPORT EXCEL, PDF, PRINT, COPY, CSV -->
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js" crossorigin="anonymous"></script>


        <script>
    	$(document).ready(function() {
			$('#listar-colaboradores').DataTable({			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "procColaboradores.php",
					"type": "POST"
				}
			});
		});
        </script>

	<script>
		$(document).ready(function() {
			document.getElementById("exibirNome").innerHTML = "Colaborador: "+ document.getElementById("nome").value;	
		});
	</script>

	<script>
		$(document).ready(function() {
		var tabCarteira = document.getElementById("navCarteira");
		var tabRota = document.getElementById("navRota");
		var tabMeta = document.getElementById("navMeta");
		
		if (document.getElementById("nome").value == "") {
			tabCarteira.classList.add("disabled");
			tabRota.classList.add("disabled");
			tabMeta.classList.add("disabled");
			}
		else {
			tabCarteira.classList.remove("disabled");
			tabRota.classList.remove("disabled");
			tabMeta.classList.remove("disabled");
			}
		});
    </script>

    </body>
</html>
