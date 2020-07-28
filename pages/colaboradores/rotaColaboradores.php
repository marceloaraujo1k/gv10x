
<?php 
	$idColaborador = $_GET['id'];
?>
                    <div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
							<button class="btn btn-primary" data-toggle="modal" data-target="#modalRota">Nova Rota</button>
					    </ol>
                        
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Rotas
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="listar-rotas" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
												<th>ID</th>
                                                <th>Rota</th>
                                                <th>Grupo Clientes</th>
												<th>Data Inicial</th>
												<th>Data Final</th>
												<th>Indeterminada</th>
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
      					  <!-- INSERIR cliente -->
 					   <div class="modal fade" id="modalRota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Cadastro Rota</h4>
									</div>
								<div class="modal-body">
								<form role="form" action="./sqlRotas.php" method='post' enctype="multipart/form-data">
									<input type="hidden" name="id" id="idRota" />

									<input type="hidden" name="idCliente" id="idCliente" />
									<input type="hidden" name="idColaborador" id="idColaborador" value="<?=$idColaborador?>">
								<div class="row">
									<div class="form-group  col-md-6">
										<label for="rota">Rota</label>
										<input class="form-control" name="descricaoRota" id="descricaoRota">
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
							        <div class="form-group col-md-4">
                                         <label for="example-datetime-local-input">Data/Hora Inicial</label>
                                            <input class="form-control" type="datetime-local" name="dataHoraInicioRota" id="dataHoraInicioRota">
                                    </div>
                                    <div class="form-group col-md-4">
                                            <label for="example-datetime-local-input">Data/Hora Inicial</label>
                                            <input class="form-control" type="datetime-local" name="dataHoraFimRota" id="dataHoraFimRota">
                                    </div>
									<div class="form-group  col-md-4">
										<label for="tipoCliente">Prazo (indeterminado)</label>
										<select id="prazoRota" name="prazoRota"  class="form-control"> 
											<option value="0">Sim</option>
											<option value="1">Não</option>
										</select>
									</div>
                             	</div> 
								 
								<div class="row">
							        <div class="form-group col-md-12">
										<label for="rota">Observação</label>
										<input class="form-control" name="observacaoRota" id="observacaoRota">
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
			$('#listar-rotas').DataTable({			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "procRotas.php",
					"data": function ( d ) {
             			   d.idColaborador = $('#idColaborador').val();
    	          },
					"type": "POST"
				}
			});
		} );
       </script>
    
	<script>
	$('[data-dismiss=modal]').on('click', function (e) {
		$('#modalRota').on('hidden.bs.modal', function () {
		document.getElementById("idRota").value = null;
		$(this).find('form').trigger('reset');
		$(this).find('img').attr('src',null);
		});
	});
	</script>