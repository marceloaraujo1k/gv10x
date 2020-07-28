
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

$estados = array("","ACRE","ALAGOAS","AMAPÁ","AMAZONAS","BAHIA","CEARÁ","DISTRITO FEDERAL","ESPIRITO SANTO","GOIÁS",
				"MARANHÃO","MATO GROSSO DO SUL","MATO GROSSO","MINAS GERAIS","PARÁ","PARAÍBA","PARANÁ","PERNAMBUCO",
				"PIAUÍ","RIO DE JANEIRO","RIO GRANDE DO NORTE","RIO GRANDE DO SUL","RONDÔNIA","RORAIMA","SANTA CATARINA",
				"SÃO PAULO","SERGIPE","TOCANTINS");	
$tipofornecedor = getItensTable($mysql_conn,"tipofornecedor");
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
                        <h1 class="mt-4">Fornecedores</h1>
                        <ol class="breadcrumb mb-4">
                             <button class="btn btn-primary" data-toggle="modal" data-target="#modalFornecedor">Novo Fornecedor</button>
					    </ol>
                        
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Fornecedores
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="listar-fornecedores" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Razão Social</th>
                                             	<th>Nome Fantasia</th>
												<th>CNPJ/CPF</th>
												<th> </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                    </table>
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
        <!-- INSERIR Fornecedor -->
    <div class="modal fade" id="modalFornecedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Cadastro Fornecedor</h4>
									</div>
								<div class="modal-body">
								<form role="form" action="./sqlFornecedores.php" method='post' enctype="multipart/form-data">
									<input type="hidden" name="id" id="idFornecedor" />
								<div class="row">
									<div class="form-group col-md-12">
										<label for="nome">Razão Social/Nome</label>
										   <input class="form-control" name="razaoSocialFornecedor" required id="razaoSocialFornecedor">
                        			</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-12">
										<label>Nome Fantasia</label>
										 <input class="form-control" name="nomeFantasiaFornecedor" id="nomeFantasiaFornecedor">
									</div>
									
								</div>
								<div class="row">
									<div class="form-group col-md-4">
										<label>CNPJ</label>
										<input class="form-control" name="cnpjCPFFornecedor" required id="cnpjCPFFornecedor">
									</div>
									<div class="form-group col-md-4">
										<label>Insc.Estadual</label>
										 <input class="form-control" name="inscEstadualFornecedor" id="inscEstadualFornecedor">
									</div>		
									<div class="form-group col-md-4">
										<label>Insc.Municipal</label>
										 <input class="form-control" name="inscMunicipalFornecedor" id="inscMunicipalFornecedor">
									</div>
								</div>
							<div class="row">	
							<div class="form-group col-md-8">
								<label for="inputCity">Endereço</label>
								<input class="form-control" name="enderecoFornecedor" id="enderecoFornecedor">
							</div>
							<div class="form-group col-md-4">
									<label for="numero">Número</label>
									<input class="form-control" name="numeroFornecedor" id="numeroFornecedor">
							</div>
						</div>
					
					<div class="row">
							<div class="form-group col-md-6">
								<label for="bairroFornecedor">Bairro</label> 
								<input class="form-control" name="bairroFornecedor" id="bairroFornecedor">
							</div>
							<div class="form-group col-md-6">
								<label for="bairroFornecedor">Complemento</label> 
								<input class="form-control" name="complementoFornecedor" id="complementoFornecedor">
							</div>
  					</div>
						
					<div class="row">
						<div class="form-group col-md-6">
						  	<label for="municipioFornecedor">Munícipio</label>
							<input class="form-control" name="municipioFornecedor" id="municipioFornecedor" >
						</div>
						<div class="form-group col-md-2">
							<label for="cepFornecedor">CEP</label>
							 <input class="form-control" name="cepFornecedor" id="cepFornecedor">
						</div>
						<div class="form-group col-md-4">
							  <label for="estado">Estado</label>
							  <select id="ufFornecedor"  name="ufFornecedor" class="form-control">
			 						<?php
									for($i=0; $i<count($estados); $i++)
									{		
									if($estados == $estados[$i])
									{
									?>
									<option value="<?=$estados[$i]?>" selected><?=$estados[$i]?></option>
									<?php
									}
									else
									{
									?>
									<option value="<?=$estados[$i]?>"><?=$estados[$i]?></option>
									<?php
									}
									}
									?>		
							</select>
							</div>
					</div>
					<div class="row"> 
						
							<div class="form-group col-md-3">
									<label for="telefone">Telefone</label>
									<input class="form-control" name="telefoneFornecedor" id="telefoneFornecedor" value="">
							</div>
							<div class="form-group col-md-3">
									<label for="celular">Celular</label>
									<input class="form-control" name="celularFornecedor" id="celularFornecedor">	
							</div>

							<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input class="form-control" name="emailFornecedor" required id="emailFornecedor">	
							</div>
							</div>		
								<div class="row">
									<div class="form-group  col-md-6">
									<label for="tipoDoFornecedor">Tipo Fornecedor</label>
									<select id="tipoFornecedor" name="idTipoFornecedor" class="form-control">
											<option value=""></option>
											<?php
											for($i=0; $i<count($tipofornecedor); $i++)
											{
											if($tipoFornecedor == $tipofornecedor[$i]['idTipoFornecedor'])
											{	
											?>
											<option value="<?=$tipofornecedor[$i]['idTipoFornecedor']?>"><?=$tipofornecedor[$i]['descricaoTipoFornecedor']?></option>
											<?php
											}
											else
											{
											?>
											<option value="<?=$tipofornecedor[$i]['idTipoFornecedor']?>" ><?=$tipofornecedor[$i]['descricaoTipoFornecedor']?></option>
											<?php
											}
											}
											?>
										</select>
									</div>
									<div class="form-group  col-md-6">
										<label for="contatoFornecedor">Contato</label>
										<input class="form-control" name="contatoFornecedor" id="contatoFornecedor">	
									</div>
								</div>				
								<div class="row">				
									<div class="form-group col-md-12">
										<label for="observacao">Observação</label>
										<input class="form-control" name="observacaoFornecedor" id="observacaoFornecedor">	
									</div>
								</div>
								<div class="modal-footer">
										<button type="submit" class="btn btn-success">Salvar</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									</div>	
								</form>
							</div>
						</div>
					</div>
				</div>	
<!-- /INSERIR Fornecedor -->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
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
			$('#listar-fornecedores').DataTable({			
				"processing": true,
				"serverSide": true,
				"dom": 'Bfrtip',
        		"buttons": [
           			'copy', 'csv', 'excel', 'pdf', 'print'
        		],
				"ajax": {
					"url": "procFornecedores.php",
					"type": "POST"
				}
			});
		} );
        </script>
    <script>
		$(document).on('click','#btnExcluir',function(e){
            e.preventDefault();
		var id = $(this).data('id');
		 confirm("Excluir FORNECEDOR ? " +id);
		location.assign("deleteFornecedores.php?id="+id);
		});
	</script>	
	
	
	<script>
		$(document).on('click','#btnEditar',function(e){
        e.preventDefault();
		var id = $(this).data('id');
		confirm("Editar FORNECEDOR ? " +id);
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		var result = JSON.parse(this.responseText);
		
		document.getElementById("idFornecedor").value = id;
		document.getElementById("razaoSocialFornecedor").value = result[0][1];
		document.getElementById("nomeFantasiaFornecedor").value = result[0][2];
		document.getElementById("cnpjCPFFornecedor").value = result[0][3];
		document.getElementById("inscEstadualFornecedor").value = result[0][4];
		document.getElementById("inscMunicipalFornecedor").value = result[0][5];
		document.getElementById("enderecoFornecedor").value = result[0][6];
		document.getElementById("numeroFornecedor").value = result[0][7];
		document.getElementById("bairroFornecedor").value = result[0][8];
		document.getElementById("complementoFornecedor").value = result[0][9];
		document.getElementById("municipioFornecedor").value = result[0][10];
		document.getElementById("cepFornecedor").value = result[0][11];
		document.getElementById("ufFornecedor").options[document.getElementById("ufFornecedor").selectedIndex].text = result[0][12];
		document.getElementById("telefoneFornecedor").value = result[0][13];
		document.getElementById("emailFornecedor").value = result[0][14];
	    document.getElementById("contatoFornecedor").value = result[0][15];
		document.getElementById("tipoFornecedor").selectedIndex = result[0][16];
		document.getElementById("observacaoFornecedor").value = result[0][17];
		
		}
		};
		xmlhttp.open("GET","operFornecedores.php?id="+id, true);
		xmlhttp.send();
		$("#modalFornecedor").modal();
		});
	
	</script>	
	
		
	<script>
	$('[data-dismiss=modal]').on('click', function (e) {
		$('#modalFornecedor').on('hidden.bs.modal', function () {
		document.getElementById("idFornecedor").value = null;
		$(this).find('form').trigger('reset');
		});
	});
	</script>
    
    </body>
</html>
