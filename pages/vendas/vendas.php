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
                        <h1 class="mt-4">Gestão de Vendas</h1>
                        <ol class="breadcrumb mb-4">
                             <button class="btn btn-primary" data-toggle="modal" data-target="#modalBV">Novo BV</button>
					    </ol>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Agenda
                                    </div>
                                    <div class="card-body">
                                    <div id='calendar'>
                                    </div>
                                </div>
                            </div>
							</div>
							
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Mapa 
                                    </div>
                                    <div class="card-body">
									<div class="table-responsive">
                                          <div id="mapa">
                                    </canvas>
                                        </div>
										</div>
                                    </div>
                                </div>
                            </div>
                        
                       
                    </div>
					
					 <div class="row">
					 <div class="col-xl-12">
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Controle Cliente em Rota
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                     <table class="table table-bordered" id="listar-bv" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Cliente</th>
                                                <th>Pedido(R$)</th>
                                                <th>PProd.Maior Venda</th>
                                                <th>Participação</th>
                                                <th>SKU'S</th>
                                                <th>Meta(R$)</th>
                                                <th>Meta(MIX)</th>
                                            </tr>
                                        </thead>
                                    </table>
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


               <!-- INSERIR Fornecedor -->
               <div class="modal fade" id="modalBV" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Cadastro BV</h4>
									</div>
								<div class="modal-body">
								<form role="form" name="formBV" id="formBV" method="post">
									<input type="hidden" name="id" id="idGV" />
                                    <input type="hidden" name="idColaborador" id="idColaborador"/>
                                    <input type="hidden" name="idCliente" id="idCliente"/>
                                    <input type="hidden" name="idRota" id="idRota"/>
                                    <input type="hidden" name="idProduto" id="idProduto"/>

                                <div class="row">
							         <div class="form-group col-md-4">
                                        <label for="example-datetime-local-input">Data/Hora Inicial</label>
                                        <input class="form-control" type="datetime-local" value="" id="dataVenda">
                                     </div>
                                     <div class="form-group col-md-4">
                                            <br>
                                            <button class="btn btn-success" onclick="getLocation()">Check-in</button>
                                        </div>
                                </div>

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
                                
                                <div class="row">
									<div class="form-group col-md-3">
										<label for="nome">Pedido(R$)</label>
									   <input class="form-control" name="valorVenda" id="valorVenda">
                        			</div>
                                          <!-- PESQUISAR PDROUTOS -->
									<div class="form-group col-md-6">
										<label for="nome">Prod.Maior Venda</label>
										   <input class="form-control" name="descricaoProduto" id="descricaoProduto">
                        			</div>
                                    <!-- % PRODUTO NA VENDA -->
									<div class="form-group col-md-3">
										<label for="nome">Participação</label>
										   <input class="form-control" name="participacao" id="participacao">
                        			</div>
                                </div>

                                
                                <div class="row">
                                
                                    <div class="form-group col-md-4">
										<label for="nome">SKU</label>
										   <input class="form-control" name="mixCliente" id="mixCliente" placeholder="Qtd. prod. loja">
                        			</div>
									<div class="form-group col-md-4">
										<label for="nome">Meta(R$)</label>
                                        <input class="form-control" name="projecaoMetaVenda" id="projecaoMetaVenda">
                        			</div>
                                    <!-- % PRODUTO NA VENDA -->
									<div class="form-group col-md-4">
										<label for="nome">Meta Mix</label>
										   <input class="form-control" name="projecaoMetaMix" id="projecaoMetaMix">
                        			</div>
                                </div>


                                <div class="modal-footer">
										<button type="submit" class="btn btn-success">Salvar</button>
										<button type="button" class="btn btn-default"  id="inserirBV" value="inserirBV" data-dismiss="modal">Fechar</button>
								</div>	
								</form>
							</div>
						</div>
					</div>
				</div>	

                </div>
                <div class="modal fade" id="modalRelatorio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Relatório</h4>
									</div>
									<div class="modal-body">
								 <form role="form" action="./.php" method='post' enctype="multipart/form-data">
					
								<div class="row">
							             <div class="form-group col-md-6">
                                            <label for="example-datetime-local-input">Data/Hora Inicial</label>
                                            <input class="form-control" type="datetime-local" value="" id="start_date_report">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="example-datetime-local-input">Data/Hora Inicial</label>
                                            <input class="form-control" type="datetime-local" value="" id="end_date_report">
                                        </div>
                             	</div> 
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
										<button  type="button" id="btnVisualizar" class="btn btn-primary" title="Relatório" onclick="relatorios()">Imprimir </button>
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

     <!-- FULL CALENDAR -->
    <link href='../../dist/css/fullcalendar.min.css' rel='stylesheet' />
	<link href='../../dist/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<script src='../../dist/js/moment.min.js'></script>
	<script src='../../dist/js/fullcalendar.min.js'></script>
	<link href='../../dist/css/personalizado.css' rel='stylesheet' />
    <script src='../../dist/locale/pt-br.js'></script>

<!-- TRABALIHAR COM MOEDAS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
	 


    <script>
    	$(document).ready(function() {
			$('#listar-bv').DataTable({			
				"processing": true,
				"serverSide": true,
				"dom": 'Bfrtip',
        		"buttons": [
                    {
					 extend: 'excel',
                     exportOptions: {
				    columns: [0,1,2]
					 }
					 },
					 {
                    extend: 'pdf',
                     exportOptions: {
                    columns: [0,1,2]
					}
					},
					 {
					 extend: 'print',
                     exportOptions: {
                    columns: [0,1,2]
					 }
					},
					{
						text: 'Relatório',
						action: function ( e, dt, node, config ) {
									$("#modalRelatorio").modal();
					}
					}
                  	],
				"ajax": {
					"url": "procGV.php",
					"type": "POST"
                }
                
			});
		} );
    </script>



<script>
			$(document).ready(function(){
			 $('#formReceita').on("submit", function(event){  
			 event.preventDefault();
				$.ajax({  
				url:"sqlBV.php",  
				method:"POST",  
                data: {submit : $("#inserirBV").val(), 
                                  
                    descricao : $("#descricao").val(), dataRecebimento : $("#dataRecebimento").val(),  dataVencimento : $("#dataVencimento").val(),  valor : $('#valor').maskMoney('unmasked')[0],
					valorRecebido : $('#valorVenda').maskMoney('unmasked')[0], desconto : $('#desconto').maskMoney('unmasked')[0], saldoDevedor : $('#saldoDevedor').maskMoney('unmasked')[0], formaPagamento : $("#formaPagamento").val(),
					 statusPagamento : $("#inputStatusPagamento").val(),  tipo : $("#tipo").val()},
				beforeSend:function(){  
				},  
				success:function(data){  
				 $('#formBV')[0].reset();  
				 $('#modalBV').modal('hide'); 
				 $('#listar-bv').DataTable().ajax.reload();
				// $('#resultado').html(data); 
				}  
			   });  
				}); 
			 });
	</script>
	

<script>
	function relatorios() {
		$(document).on('click','#btnVisualizar',function(e){
			e.preventDefault();
                    var start = $('#start_date_report').val();
                  	var date = new Date(start);
					var start_date = date.getFullYear()+'-'+(date.getMonth() + 1) + '-' + date.getDate();
                    
					var end = $('#end_date_report').val();
					var date = new Date(end);
					var end_date = date.getFullYear()+'-'+(date.getMonth() + 1) + '-' + date.getDate();
					window.open("relatorioGV.php?start_date="+start_date+"&end_date="+end_date);
					
					});
				}
</script>
    <script>
   	    $(document).ready(function() {
            $("#valorVenda").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});
            $("#projecaoMetaVenda").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});
		

            $('#calendar').fullCalendar({
            dayClick: function() {
                alert('DIA CLICADO!');
            }
            });
       });
    </script>

        <script>
            function getLocation(){
                alert("LOCALIZAÇÃO");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
              } else { 
                x.innerHTML = "Geolocalização não é suportada";
            }
            }

            function showPosition(position) {
                var latlon = position.coords.latitude + "," + position.coords.longitude;
                var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&zoom=14&size=500x500&sensor=false&key=AIzaSyBSTBLow19ZFCBiAWbbWxgRt6f6ILS31Hs";
                document.getElementById("mapa").innerHTML = "<img src='"+img_url+"' width=620 height=380>";
            }
                
            </script>

        <script>
            $(document).ready(function() {
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            
            } else { 
                x.innerHTML = "Geolocalização não é suportada";
            }
            });
        </script>


<script>
	// search CLIENTE
	 $( function() {
      $( "#nomeFantasiaCliente" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "pesqClientesRota.php",
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
			appendTo: "#modalBV",
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
                    url: "pesqClientesRota.php",
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
			appendTo: "#modalBV",
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
   // search PRODUTO
	 $( function() {
      $( "#descricaoProduto" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "pesqProdutosProprios.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        searchProduto: request.term		
                    },
                    success: function( data ) {
                        response( data );
			        }
                });
            },
			appendTo: "#modalBV",
            select: function (event, ui) {
				$('#idProduto').val(ui.item.value);	
        	    $('#descricaoProduto').val(ui.item.label); // display the selected text
		      	return false;
            }
        });
    });	
	</script>
    </body>
</html>
