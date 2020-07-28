
<?php 
	$idColaborador = $_GET['id'];
?>
                    <div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
							<button class="btn btn-primary" data-toggle="modal" data-target="#modalMeta">Nova Meta</button>
					    </ol>
                        
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Carteira
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="listar-meta" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
												<th>ID</th>
                                                <th>Meta</th>
                                                <th>Data Inicial</th>
												<th>Data Final</th>
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
 					   <div class="modal fade" id="modalMeta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Cadastro Metas</h4>
									</div>
								<div class="modal-body">
								<form role="form" action="./sqlMetas.php" method='post' enctype="multipart/form-data">
									<input type="hidden" name="id" id="idMeta" />
 									<input type="hidden" name="idColaborador" id="idColaborador" value="<?=$idColaborador?>">

								<div class="row">
									
									<div class="form-group  col-md-6">
										<label for="rota">Descrição</label>
										<input class="form-control" name="descricaoMeta" id="descricaoMeta">
									</div>
								

									<div class="form-group  col-md-4">
									<label for="grupoDoCliente">Grupo Cliente</label>
									<select id="idGrupoClienteMeta" name="idGrupoClienteMeta"  class="form-control"  onchange="numeroCliente()" required> 
											<option value="0"></option>
											
										<?php 
											$query = "SELECT * FROM grupocliente"; 
											$result = mysqli_query($mysql_conn,$query);
											while($row = mysqli_fetch_assoc($result)){
												?>
												<option value="<?php echo $row['idGrupoCliente'] ?>"><?php echo $row['descricaoGrupoCliente']; ?></option>
												<?php } ?>
											</select>
									</div>
									<div class="form-group  col-md-2">
										<label for="rota">Clientes/Grupo</label>
										<input class="form-control" name="numeroClientesGrupo" id="numeroClientesGrupo" disabled>
									</div>
								</div>

								<div class="row">
							        <div class="form-group col-md-4">
                                         <label for="example-datetime-local-input">Período Inicial</label>
                                            <input class="form-control" type="date" value="" id="dataHoraInicioMeta">
                                    </div>
                                    <div class="form-group col-md-4">
                                            <label for="example-datetime-local-input">Periodo Final</label>
                                            <input class="form-control" type="date" value="" id="dataHoraFimMeta">
                                    </div>
									<div class="form-group  col-md-4">
										<label for="tipoCliente">Tipo</label>
										<select id="periodoRota" name="tipoMeta"  class="form-control"> 
											<option value="0">Mensal</option>
											<option value="1">Anual</option>
											<option value="">Diária</option>
										</select>
									</div>
                             	</div> 	
							
								<div class="row">
									<div class="form-group  col-md-4">
										<label for="rota">Meta Vendas</label>
										<input class="form-control" name="metaVenda" id="metaVenda" onchange="calculaTicketMedio()">
									</div>
									
									<div class="form-group  col-md-4">
										<label for="rota">Meta Positivação</label>
										<input class="form-control" name="metaPositivacao" id="metaPositivacao">
									</div>
								
									<div class="form-group  col-md-4">
										<label for="rota">Meta Mix</label>
										<input class="form-control" name="metaMix" id="metaMix">
									</div>
								</div>
								<div class="row">
									<div class="form-group  col-md-4">
										<label for="rota">Meta Tkt Médio</label>
										<input class="form-control" name="metaTicketMedio" id="metaTicketMedio" disabled>
									</div>
									
									<div class="form-group  col-md-4">
										<label for="rota">Meta Cobertura</label>
										<input class="form-control" name="metaCobertura" id="metaCobertura">
									</div>
								
									<div class="form-group  col-md-4">
										<label for="rota">Meta Prospeção</label>
										<input class="form-control" name="metaProspeccao" id="metaProspeccao">
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

<!-- DATA OPERATIONS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script> 


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
			$('#listar-meta').DataTable({			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "procMetas.php",
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
			$('#modalMeta').on('hidden.bs.modal', function () {
			document.getElementById("idMeta").value = null;
			$(this).find('form').trigger('reset');
			$(this).find('img').attr('src',null);
			});
		});
	</script>



	<script>
		function numeroCliente() {
			var x = document.getElementById("idGrupoClienteMeta").value;
			document.getElementById("numeroClientesGrupo").value = x;
		}
	</script>

	
<script>
		function calculaTicketMedio() {
		var now = moment(new Date()); // Data de hoje
		var past = moment("2014-07-07"); // Outra data no passadov
		var duration = moment.duration(now.diff(past));

// Mostra a diferença em dias
var days = duration.asDays();
			var metaVenda = document.getElementById("metaVenda").value;
			document.getElementById("metaTicketMedio").value = metaVenda/days;
		}
	</script>



