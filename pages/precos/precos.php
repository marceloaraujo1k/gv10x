
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

$clientes = getItensTable($mysql_conn,"clientes");
$fornecedores = getItensTable($mysql_conn,"fornecedores");
$categorias = getItensTable($mysql_conn,"categorias");
$produtos = getItensTable($mysql_conn,"produtos");

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
	
	<style>
	.maxSize {
		height: 200px;
		width: 200px; 
	}
   </style> 
   <script src="https://compressjs.herokuapp.com/compress.js"></script>  
 
	</head>

        <?php include_once('../menu.php'); ?>
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Preços</h1>
                        <ol class="breadcrumb mb-4">
                             <button class="btn btn-primary" data-toggle="modal" data-target="#modalPreco">Nova Pesquisa</button>
					    </ol>
                        
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Preços
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="listar-precos" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Registro</th>
                                                <th>Cliente</th>
                                                <th>Categoria</th>
                                                <th>Fornecedor</th>
								                <th>Produto</th>
												<th>Und.</th>
												<th>Qtd.</th>
												<th>Preço</th>
												<th>Precificação</th>
												<th>Evidência</th>
												<th>Observação</th>
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
    <div class="modal fade" id="modalPreco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Pesquisa Preço</h4>
									</div>
								<div class="modal-body">
							    <form role="form" action="./sqlPrecos.php" method='post' enctype="multipart/form-data">
									<input type="hidden" name="id" id="idPreco" />
								<div class="row">
									<div class="form-group col-md-6">
										<label for="nome">Data</label>
										<input type="datetime-local" id="dataPreco" name="dataPreco" placeholder="data" class="form-control" value="<?php echo date("Y-m-d h:i:sa")?>">
									</div>


								<div class="form-group col-md-6">
									<label for="cliente">Cliente</label>
									<select id="idCliente" name="idCliente" class="form-control">
											<option value=""></option>
											<?php
											for($i=0; $i<count($clientes); $i++)
											{
											if($form["idCliente"] == $clientes[$i]['idCliente'])
											{	
											?>
											<option value="<?=$clientes[$i]['idCliente']?>"><?=$clientes[$i]['nomeFantasiaCliente']?></option>
											<?php
											}
											else
											{
											?>
											<option value="<?=$clientes[$i]['idCliente']?>" ><?=$clientes[$i]['nomeFantasiaCliente']?></option>
											<?php
											}
											}
											?>
									</select>
									</div>
								</div>		
											
  							<div class="row">	
									<div class="form-group col-md-6">
									<label for="categoria">Categoria</label>
									<select id="idCategoria" name="idCategoria" class="form-control">
											<option value=""></option>
											<?php
											for($i=0; $i<count($categorias); $i++)
											{
											if($form["idCategoria"] == $categorias[$i]['idCategoria'])
											{	
											?>
											<option value="<?=$categorias[$i]['idCategoria']?>"><?=$categorias[$i]['descricao']?></option>
											<?php
											}
											else
											{
											?>
											<option value="<?=$categorias[$i]['idCategoria']?>" ><?=$categorias[$i]['descricao']?></option>
											<?php
											}
											}
											?>
									</select>
									</div>
								<div class="form-group col-md-6">
									<label for="fornecedor">Fornecedor</label>
									<select id="idFornecedor" name="idFornecedor" class="form-control">
											<option value=""></option>
											<?php
											for($i=0; $i<count($fornecedores); $i++)
											{
											if($form["idFornecedor"] == $fornecedores[$i]['idFornecedor'])
											{	
											?>
											<option value="<?=$fornecedores[$i]['idFornecedor']?>"><?=$fornecedores[$i]['nomeFantasiaFornecedor']?></option>
											<?php
											}
											else
											{
											?>
											<option value="<?=$fornecedores[$i]['idFornecedor']?>" ><?=$fornecedores[$i]['nomeFantasiaFornecedor']?></option>
											<?php
											}
											}
											?>
									</select>
									</div>
								</div>			
								
								<div class="row">	
									
									<div class="form-group col-md-6">
										<label for="descricaoProduto">Produto</label>
										<input class="form-control" name="descricaoProduto" id="descricaoProduto">
									</div>		
									<input type="hidden" name="idProduto" id="idProduto" />

									<div class="form-group col-md-6">
										<label for="codigoBarras">Cód.Barra</label>
										<input class="form-control" name="codigoBarra" id="codigoBarra">
									</div>
							</div>
										
							<div class="row">
								<div class="form-group col-md-2">
										<label for="unidade">Unidade</label>
										<input class="form-control" name="unidade" id="unidade">
								</div>
								<div class="form-group col-md-4">
									<label for="qtdPorUnidade">Quantidade</label> 
									<input class="form-control" name="qtdPorUnidade" id="qtdPorUnidade">
								</div>
								<div class="form-group col-md-3">
									<label for="vtDia">Preço</label>
									<input class="form-control" name="preco" id="preco" required>
								</div>  
								<div class="form-group  col-md-3">
								<label for="tipoPreco">Precificação</label>
								<select id="tipoPreco" name="tipoPreco"  class="form-control" required> 
									<option>REGULAR</option>
									<option>PROMOCIONAL</option>
									<option>ENCARTE</option>
									<option>PACK</option>
								</select>
                   				</div>  
							</div>

								<div class="row">
									<div class="form-group col-md-12">
										<label for="observacao">Observação</label>
										<input class="form-control" name="observacaoPreco" id="observacaoPreco" >
									</div>
								</div>
								<div class="row"> 
								<div class="form-group col-md-12">
										<label for="anexo1">Evidência</label>
									    <input type="file" class="form-control" name="anexo1" id="anexo1">
                        				</div>
								</div>
								<div class="row"> 
								<div class="form-group col-md-6">
										<img id="img" /> 
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
			$('#listar-precos').DataTable({			
				"processing": true,
				"serverSide": true,
				"dom": 'Bfrtip',
        		"buttons": [
           			'copy', 'csv', 'excel', 'pdf', 'print'
        		],
				"ajax": {
				"url": "procPrecos.php",
				"type": "POST"
				}
			});
		} );
        </script>
     <script>
		$(document).on('click','#btnExcluir',function(e){
            e.preventDefault();
		var id = $(this).data('id');
		 confirm("Excluir PREÇO ? " +id);
		location.assign("deletePrecos.php?id="+id);
		});
	</script>	
	
	
	<script>
		$(document).on('click','#btnEditar',function(e){
        e.preventDefault();
		var id = $(this).data('id');
		confirm("Editar PREÇO ? " +id);
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		var result = JSON.parse(this.responseText);
		
		document.getElementById("idPreco").value = id;
		document.getElementById("dataPreco").value = result[0][1];
		document.getElementById("idCliente").value = result[0][2];
		document.getElementById("idCategoria").value = result[0][3];
		document.getElementById("idFornecedor").value = result[0][4];
		document.getElementById("idProduto").value = result[0][5];
		document.getElementById("descricaoProduto").value = result[0][6];
		document.getElementById("codigoBarra").value = result[0][7];
		document.getElementById("unidade").value = result[0][8];
		document.getElementById("qtdPorUnidade").value = result[0][9];
		document.getElementById("preco").value = result[0][10];
		document.getElementById("tipoPreco").value = result[0][11];
		document.getElementById("observacaoPreco").value = result[0][13];
				
		}
		};
		xmlhttp.open("GET","operPrecos.php?id="+id, true);
		xmlhttp.send();
		$("#modalPreco").modal();
		});
	
	</script>	
	
		
	<script>
	$('[data-dismiss=modal]').on('click', function (e) {
		$('#modalPreco').on('hidden.bs.modal', function () {
		document.getElementById("idPreco").value = null;
		$(this).find('form').trigger('reset');
		$(this).find('img').attr('src',null);
		});
	});
	</script>
    
	<script>
// search PROCEDIMENTO
	 $( function() {
      $( "#descricaoProduto" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "pesqProdutos.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        searchProduto: request.term, 
						codigoBarra : $('#codigoBarra').val(),
						idCategoria : $('#idCategoria').val(),
						idFornecedor : $('#idFornecedor').val()
						
                    },
                    success: function( data ) {
                        response( data );
			        }
                });
            },
			appendTo: "#modalPreco",
            select: function (event, ui) {
				$('#idProduto').val(ui.item.value);	
        	    $('#descricaoProduto').val(ui.item.label); // display the selected text
		        $('#codigoBarra').val(ui.item.codigoBarra);	
                $('#unidade').val(ui.item.unidade);	
				$("#qtdPorUnidade").val(ui.item.qtdPorUnidade);
			  	return false;
            }
        });
    });	
	</script>

<script>
	$('[data-dismiss=modal]').on('click', function (e) {
		$('#modalProduto').on('hidden.bs.modal', function () {
		document.getElementById("idProduto").value = null;
		$(this).find('form').trigger('reset');
		$(this).find('img').attr('src',null);
		});
	});
	</script>
    
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#img').attr('src', e.target.result);
					$('#img').toggleClass('maxSize')
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#anexo1").change(function () {
			readURL(this);
		});
	</script>


	<script>
		var date1 = new Date("now");
		//date1 = new Date(date1.getFullYear(), date1.getMonth(), date1.getDate()); // input expects requires year, month, day
		document.getElementById("dataPreco").valueAsDate = date1;
	</script>

    </body>
</html>
