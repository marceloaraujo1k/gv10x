
<?php 
session_start();
if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['idempresa']) == true))
{
  unset($_SESSION['user']);
  unset($_SESSION['idempresa']);
  session_destroy();
  header('location:../login.php');
  }
 
include '../opendb.php';
include_once('../func.php');
$estados = array("","RO","AC","AM","RR","PA","AP","TO","MA","PI",
				"CE","RN","PB","PE","AL","SE","BA","MG",
				"ES","RJ","SP","PR","SC","RS","MS",
				"MT","GO","DF");	
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
                        <h1 class="mt-4">Clientes</h1>
                        <ol class="breadcrumb mb-4">
                             <button class="btn btn-primary" data-toggle="modal" data-target="#modalCliente">Novo Cliente</button>
					    </ol>
                        
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Clientes
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="listar-clientes" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Razão Social/Nome</th>
                                                <th>CNPJ/CPF</th>
                                                <th>Telefone</th>
                                                <th>Filial</th>
                                                <th> </th>
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
        <!-- INSERIR CLIENTE -->
    <div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Cadastro Cliente</h4>
									</div>
								<div class="modal-body">
							    <form role="form" action="./sqlClientes.php" method='post' enctype="multipart/form-data">
									<input type="hidden" name="id" id="idCliente" />
								<div class="row">
									<div class="form-group col-md-12">
										<label for="nome">Razão Social/Nome</label>
										   <input class="form-control" name="nomeRazaoSocialCliente" required id="nomeRazaoSocialCliente">
                        			</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-8">
										<label>Nome Fantasia</label>
										 <input class="form-control" name="nomeFantasiaCliente" id="nomeFantasiaCliente">
									</div>
									
								<div class="form-group col-md-4">
										<label>CNPJ/CPF</label>
										<input class="form-control" name="cpfCnpjCliente" required id="cpfCnpjCliente">
									</div>
								</div>
				<div class="row">
					<div class="form-group  col-md-4">
					<label for="tipoCliente">Pessoa</label>
					<select id="tipoCliente" name="tipoCliente"  class="form-control" required> 
						<option value="Física">Física</option>
						<option value="Jurídica">Jurídica</option>
					</select>
                    </div>
					<div class="form-group col-md-4">
							<label>Insc.Estadual</label>
							<input class="form-control" name="inscEstadual" id="inscEstadual">
					</div>		
					<div class="form-group col-md-4">
							<label>Insc.Municipal</label>
							<input class="form-control" name="inscMunicipal" id="inscMunicipal">
						</div>
					</div>
					<div class="row">	
					<div class="form-group col-md-6">
						<label for="inputCity">Endereço</label>
						<input class="form-control" name="enderecoCliente" id="enderecoCliente">
					</div>
					<div class="form-group col-md-2">
						  	<label for="numero">Número</label>
							<input class="form-control" name="numeroCasaCliente" id="numeroCasaCliente">
					</div>
						 <div class="form-group col-md-4">
						  <label for="bairroCliente">Bairro</label> 
						  <input class="form-control" name="bairroCliente" id="bairroCliente">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
						  	<label for="municipioCliente">Munícipio</label>
							<input class="form-control" name="municipioCliente" id="municipioCliente" >
						</div>
						<div class="form-group col-md-4">
							<label for="cepCliente">CEP</label>
							 <input class="form-control" name="cepCliente" id="cepCliente">
						</div>
						<div class="form-group col-md-2">
							  <label for="estado">Estado</label>
							  <select id="ufCliente"  name="ufCliente" class="form-control">
									<?php
									for($i=0; $i<count($estados); $i++)
									{		
									if($form["estado"] == $estados[$i])
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
									<input class="form-control" name="telefoneCliente" required id="telefoneCliente">
								</div>
								<div class="form-group col-md-3">
									<label for="celular">Celular</label>
									<input class="form-control" name="celularCliente" id="celularCliente">	
								</div>
								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input class="form-control" name="emailCliente" required id="emailCliente">	
								</div>
							</div>
							<div class="row">
								<div class="form-group  col-md-6">
									<label for="tipoDoCliente">Tipo Cliente</label>
									<select id="idTipoCliente" name="idTipoCliente"  class="form-control" required> 
										<?php 
											$query = "SELECT * FROM tipocliente"; 
											$result = mysqli_query($mysql_conn,$query);
											while($row = mysqli_fetch_assoc($result)){
												?>
												<option value="<?php echo $row['idTipoCliente'] ?>"><?php echo $row['descricao']; ?></option>
												<?php } ?>
											</select>
									</div>
									<div class="form-group  col-md-6">
									<label for="grupoDoCliente">Grupo Cliente</label>
									<select id="idGrupoCliente" name="idGrupoCliente"  class="form-control" required> 
										<?php 
											$query = "SELECT * FROM grupocliente"; 
											$result = mysqli_query($mysql_conn,$query);
											while($row = mysqli_fetch_assoc($result)){
												?>
												<option value="<?php echo $row['idGrupoCliente'] ?>"><?php echo $row['descricaoGrupoCliente']; ?></option>
												<?php } ?>
											</select>
									</div>
							</div>
							<div class="row">
									<div class="form-group col-md-6">
										<label>Contato</label>
										<input class="form-control" name="contatoCliente" required id="contatoCliente">
									</div>
									<div class="form-group col-md-6">
										<label for="nome">Data Nasc.</label>
										<input type="date" id="dataNascimentoCliente" name="dataNascimentoCliente"  placeholder="data" class="form-control" value="<?= date("d-m-Y")?>">
									</div>
								</div>	
								<div class="row">
									<div class="form-group col-md-12">
										<label for="observacao">Observação</label>
										<input class="form-control" name="observacaoCliente" id="observacaoCliente">	
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
			$('#listar-clientes').DataTable({			
				"processing": true,
				"serverSide": true,
				"dom": 'Bfrtip',
        		"buttons": [
           			'copy', 'csv', 'excel', 'pdf', 'print'
        		],
				"ajax": {
					"url": "procClientes.php",
					"type": "POST"
				}
			});
		} );
    </script>
    
<script>
		$(document).on('click','#btnExcluir',function(e){
            e.preventDefault();
		var id = $(this).data('id');
		 confirm("Excluir CLIENTE ? " +id);
		location.assign("deleteClientes.php?id="+id);
		});
	</script>	
	
	
	<script>
		$(document).on('click','#btnEditar',function(e){
        e.preventDefault();
		var id = $(this).data('id');
		confirm("Editar CLIENTE ? " +id);
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		var result = JSON.parse(this.responseText);
		
		document.getElementById("idCliente").value = id;
		document.getElementById("nomeRazaoSocialCliente").value = result[0][1];
		document.getElementById("nomeFantasiaCliente").value = result[0][2];
		document.getElementById("cpfCnpjCliente").value = result[0][3];
		document.getElementById("tipoCliente").value = result[0][4];
		document.getElementById("inscEstadual").value = result[0][5];
		document.getElementById("inscMunicipal").value = result[0][6];
		document.getElementById("emailCliente").value = result[0][7];
		document.getElementById("enderecoCliente").value = result[0][8];
		document.getElementById("numeroCasaCliente").value = result[0][9];
		document.getElementById("bairroCliente").value = result[0][10];
		document.getElementById("cepCliente").value = result[0][11];
		document.getElementById("telefoneCliente").value = result[0][12];
		document.getElementById("celularCliente").value = result[0][13];
		document.getElementById("ufCliente").options[document.getElementById("ufCliente").selectedIndex].text = result[0][14];
		document.getElementById("municipioCliente").value = result[0][15];
	    document.getElementById("contatoCliente").value = result[0][16];
		document.getElementById("dataNascimentoCliente").value = result[0][17];
		document.getElementById("observacaoCliente").value = result[0][18];
		document.getElementById("idTipoCliente").value = result[0][19];
		document.getElementById("idGrupoCliente").value = result[0][20];
	
		}
		};
		xmlhttp.open("GET","operClientes.php?id="+id, true);
		xmlhttp.send();
		$("#modalCliente").modal();
		});
	
	</script>	

	
<script type="text/javascript">
$("#cpfCnpjCliente").focusout(function(){
	
	
	$.ajax({
		
		//concatenar o valor digitado no CNPJ, porque está sendo passado um $_REQUEST no PHP
		url: 'cnpj.php?cnpj='+$("#cpfCnpjCliente").val(),
		
		//Tipo de dados que será lido
		dataType: 'json', 

		//resposa é o nome da variável usada para ler o objeto. Pode ser qualquer uma
		success: function(resposta){
			//Confere se houve erro e o imprimir
			if(resposta.status == "ERROR"){
				alert(resposta.message + "\nPor favor, digite os dados manualmente.");
				$("#nomeRazaoSocialCliente").focus().select();
				return false;
			}
			
			$("#nomeRazaoSocialCliente").val(resposta.nome);
			$("#nomeFantasiaCliente").val(resposta.fantasia);
			//$("#atividade").val(resposta.atividade_principal[0].text + " (" + resposta.atividade_principal[0].code + ")");
			$("#telefoneCliente").val(resposta.telefone);
			$("#emailCliente").val(resposta.email);
			$("#enderecoCliente").val(resposta.logradouro);
			//$("#complemento").val(resposta.complemento);
			$("#bairroCliente").val(resposta.bairro);
			$("#municipioCliente").val(resposta.municipio);
			$("#ufCliente").val(resposta.uf);
			$("#cepCliente").val(resposta.cep);
			$("#numeroCasaCliente").val(resposta.numero);
		}
	});
	var cpf = ($('#cpfCnpjCliente').val().length);
	if(cpf >= 14){
		$("#tipoCliente").val("Jurídica");
	}
}); //CNPJ PARA TESTE: 47960950000121


</script>

    </body>
</html>
