
<?php 
	$idColaborador = $_GET['id'];
?>
                    <div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
						<div class="form-group col-md-3">
							<button class="btn btn-primary" data-toggle="modal" data-target="#modalCarteira">Nova Carteira</button>
					 	</div>
						</ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Carteira
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="listar-carteiras" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
												<th>ID</th>
                                                <th>Razão Social</th>
                                                <th>Fantasia</th>
												<th>CNPJ</th>
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
 					   <div class="modal fade" id="modalCarteira" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Cadastro Carteira</h4>
									</div>
								<div class="modal-body">
								<form role="form" action="./sqlCarteiras.php" method='post' enctype="multipart/form-data">
									<input type="hidden" name="id" id="idCarteira" />

									<input type="hidden" name="idCliente" id="idCliente" />
									<input type="hidden" name="idColaborador" id="idColaborador" value="<?=$idColaborador?>">
						
								<div class="row">
									<div class="form-group col-md-4">
										<label for="nome">CNPJ</label>
										   <input class="form-control" id="cpfCnpjCliente">
                        			</div>
									<div class="form-group col-md-8">
										<label for="nome">Cliente(Nome Fantasia/Razão Social)</label>
										   <input class="form-control" name="nomeFanasiaCLiente" id="nomeFantasiaCliente">
                        			</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="nome">Tipo</label>
										   <input class="form-control" name="tipoCliente" id="tipoCliente" disabled>
                        			</div>
									<div class="form-group col-md-6">
										<label for="nome">Grupo</label>
										   <input class="form-control" name="grupoCliente" id="grupoCliente" disabled>
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

						 <!-- MIGRAR CARTEIRA -->
						<div class="modal fade" id="modalMigrarCarteira" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Migrar Cliente da Carteira</h4>
									</div>
								<div class="modal-body">
								<form role="form" action="./sqlCarteiras.php" method='post' enctype="multipart/form-data">
									<input type="hidden" name="id" id="idCarteiraMigracao" />

									<input type="hidden" name="idCliente" id="idCliente" />
									<input type="hidden" name="idColaborador" id="idColaborador" value="<?=$idColaborador?>">
									
									<input type="hidden" name="idColaboradorMigracao" id="idColaboradorMigracao">
						
								<div class="row">
									<div class="form-group col-md-4">
										<label for="nome">CNPJ</label>
										   <input class="form-control" id="cpfCnpjClienteMigracao" disabled>
                        			</div>
									<div class="form-group col-md-8">
										<label for="nome">Cliente(Nome Fantasia/Razão Social)</label>
										   <input class="form-control" name="nomeFanasiaCLienteMigracao" id="nomeFantasiaClienteMigracao" disabled>
                        			</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="nome">Migrar para colaborador</label>
										   <input class="form-control" name="nomeColaboradorMigracao" id="nomeColaboradorMigracao">
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
			$('#listar-carteiras').DataTable({			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "procCarteiras.php",
					"data": function ( d ) {
             			   d.idColaborador = $('#idColaborador').val();
    	          },
					"type": "POST"
				}
			});
		} );
</script>
    
			
<script>
	// search CLIENTE
	 $( function() {
      $( "#nomeFantasiaCliente" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "pesqClientes.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        searchCliente: request.term
					
                    },
                    success: function( data ) {
                        response( data );
			        }
                });
            },
			appendTo: "#modalCarteira",
            select: function (event, ui) {
				$('#cpfCnpjCliente').val(ui.item.value);	
        	    $('#nomeFantasiaCliente').val(ui.item.label); // display the selected text
				$('#idCliente').val(ui.item.idCliente);
		        $('#tipoCliente').val(ui.item.tipoCliente);	
                $('#grupoCliente').val(ui.item.grupoCliente);	
			  	return false;
            }
        });
    });	
	</script>

			
<script>
	// search CLIENTE
	 $( function() {
      $( "#cpfCnpjCliente" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "pesqClientes.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        searchCpfCnpj: request.term
					
                    },
                    success: function( data ) {
                        response( data );
			        }
                });
            },
			appendTo: "#modalCarteira",
            select: function (event, ui) {
				$('#cpfCnpjCliente').val(ui.item.label);	
        	    $('#nomeFantasiaCliente').val(ui.item.value); // display the selected text
				$('#idCliente').val(ui.item.idCliente);
		        $('#tipoCliente').val(ui.item.tipoCliente);	
                $('#grupoCliente').val(ui.item.grupoCliente);	
			  	return false;
            }
        });
    });	
</script>


<script>
	// search COLABORADOR
	 $( function() {
      $( "#nomeColaboradorMigracao" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "pesqColaboradores.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        searchNomeColaborador: request.term
					
                    },
                    success: function( data ) {
                        response( data );
			        }
                });
            },
			appendTo: "#modalMigrarCarteira",
            select: function (event, ui) {
				$('#nomeColaboradorMigracao').val(ui.item.label);	
        	    $('#idColaboradorMigracao').val(ui.item.value); 
				// display the selected text
			
			  	return false;
            }
        });
    });	
</script>

<script>
	$('[data-dismiss=modal]').on('click', function (e) {
		$('#modalCarteira').on('hidden.bs.modal', function () {
		document.getElementById("idCarteira").value = null;
		$(this).find('form').trigger('reset');
		$(this).find('img').attr('src',null);
		});
	});
</script>


<script>
	$('[data-dismiss=modal]').on('click', function (e) {
		$('#modalMigrarCarteira').on('hidden.bs.modal', function () {
		document.getElementById("idCarteira").value = null;
		$(this).find('form').trigger('reset');
		$(this).find('img').attr('src',null);
		});
	});
</script>

<script>
	$(document).on('click','#btnMigrarCarteira',function(e){
        e.preventDefault();
		var id = $(this).data('id');
		confirm("migrar CLIENTE DA CARTEIRA ? " +id);
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		var result = JSON.parse(this.responseText);
		
		document.getElementById("idCarteiraMigracao").value = id;
		document.getElementById("cpfCnpjClienteMigracao").value = result[0][1];
		document.getElementById("nomeFantasiaClienteMigracao").value = result[0][2];	
		
		}
		};
		xmlhttp.open("GET","operCarteiras.php?id="+id, true);
		xmlhttp.send();
		$("#modalMigrarCarteira").modal();
	});
</script>	

<script>
		$(document).on('click','#btnExcluir',function(e){
            e.preventDefault();
		var idColaborador = $('#idColaborador').val();
		var id = $(this).data('id');
		 confirm("Excluir CLIENTE DA CARTEIRA DO COLABORADOR? " +id);
		location.assign("deleteCarteiras.php?id="+id+"&idColaborador="+idColaborador);
		
		});
</script>	