<?php 


 
$sexo = array("","MASCULINO","FEMININO");
		
$estados = array("","RO","AC","AM","RR","PA","AP","TO","MA","PI",
				"CE","RN","PB","PE","AL","SE","BA","MG",
				"ES","RJ","SP","PR","SC","RS","MS",
				"MT","GO","DF");	
	
$funcoes = getItensTable($mysql_conn, "funcoes");


?>


<form role="form" action="./sqlColaboradores.php" method="post">
	<input type="hidden" name="id" id="idColaborador" value="<?php echo $row['idColaborador']?>"> 
		<br>
		<div class="row">
			<div class="form-group col-md-4">
				<label>Nome</label>
				<input class="form-control" name="nome" id="nome" value="<?php echo $row['nome']?>" required>
			</div>
			<div class="form-group col-md-2">
				<label for="sexo">Sexo</label>
				<select id="sexo" name="sexo"  class="form-control" required> 
				<?php
					for($i=0; $i<count($sexo); $i++)
					{
					if($row['sexo'] == $sexo[$i])
					{
				?>
					<option value="<?=$sexo[$i]?>" selected><?=$sexo[$i]?></option>
				<?php
					}
				else
					{
				?>
					<option value="<?=$sexo[$i]?>"><?=$sexo[$i]?></option>
				<?php
					}
					}
				?>
				</select>
			</div>
			<div class="form-group col-md-3">
				<label for="datanascimento">Data Nascimento</label>
				<input type="date" id="nascimento" class="form-control" name="dataNascimento" value="<?php echo $row['dataNascimento'] ?>">
			</div>
		</div>
											
		<div class="row">
			<div class="form-group col-md-1">
				<label for="conselho">Conselho</label>
				<input class="form-control" name="conselho" id="conselho" value="<?php echo $row['conselho'] ?>">
			</div>

											<div class="form-group col-md-2">
												<label for="pis">Pis</label>
												<input class="form-control" name="pis" id="pis" value="<?php echo $row['pis'] ?>">
												</div>
											<div class="form-group col-md-2">
												<label for="cpf">CPF</label>
												<input class="form-control" name="cpf" id="cpf" value="<?php echo $row['cpf'] ?>">
											</div>

											<div class="form-group col-md-2">
												<label for="rg">RG</label>
												<input class="form-control" name="rg" id="rg" value="<?php echo $row['rg'] ?>">
											</div>
											
											<div class="form-group col-md-2">
												<label for="emissor">Emissor</label>
												<input class="form-control" name="emissor" id="emissor" value="<?php echo $row['emissor'] ?>">
											</div>
											
											
										</div>
													
										<div class="row">
											<div class="form-group col-md-3">
												<label for="dataEmissao">Data Emissão</label>
												<input type="date" id="dataEmissao" class="form-control" name="dataEmissao" value="<?php echo $row['dataEmissao'] ?>">
											</div>	
											<div class="form-group col-md-2">
												<label for="cep">CEP</label>
												<input class="form-control" name="cep" id="cep" value="<?php echo $row['cep'] ?>">
											</div>

											<div class="form-group col-md-4">
												<label for="endereco">Endereço</label> 
												<input class="form-control" name="endereco" id="endereco" value="<?php echo $row['endereco'] ?>">
											</div>
										</div>

										<div class="row">
											<div class="form-group col-md-1">
												<label for="numero">Número</label>
												<input class="form-control" name="numero" id="numero" value="<?php echo $row['numero'] ?>">
											</div>
											<div class="form-group col-md-2">
												<label for="complemento">Complemento</label> 
												<input class="form-control" name="complemento" id="complemento" value="<?php echo $row['complemento'] ?>">
											</div>
											<div class="form-group col-md-2">
												<label for="bairro">Bairro</label>
												<input class="form-control" name="bairro" id="bairro" value="<?php echo $row['bairro'] ?>">
											</div>
											<div class="form-group col-md-2">
												<label for="inputEstado">UF</label>
												<select id="inputEstado"  name="uf" class="form-control">
														<?php
														for($i=0; $i<count($estados); $i++)
														{		
														if($row["uf"] == $estados[$i])
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
											<div class="form-group col-md-2">
												<label for="cidade">Cidade</label>
												<input class="form-control" name="cidade" id="cidade" value="<?php echo $row['cidade'] ?>">
											</div>
										</div>
									<div class="row"> 
											<div class="form-group col-md-2">
													<label for="telefone">Telefone</label>
													<input class="form-control" name="telefone" id="telefone" value="<?php echo $row['telefone'] ?>">
												</div>

												<div class="form-group col-md-2">
													<label for="numeroCelular">Número Celular</label>
													<input class="form-control" name="numeroCelular" id="numeroCelular" value="<?php echo $row['numeroCelular'] ?>">	
												</div>
												
												<div class="form-group col-md-2">
													<label for="radio">Rádio</label>
													<input class="form-control" name="radio" id="radio" value="<?php echo $row['radio'] ?>">	
											</div>

											<div class="form-group col-md-3">
												<label for="cargo">Cargo</label>
												<input class="form-control" name="cargo" id="cargo" value="<?php echo $row['cargo'] ?>">	
											</div>
											</div>

											<div class="row"> 
														<div class="form-group col-md-4">
															<label for="emailPessoal">Email</label>
															<input class="form-control" name="email" id="email" value="<?php echo $row['email'] ?>">	
														</div>

														<div class="form-group col-md-2">
															<label for="senha">Senha</label>
															<input class="form-control" name="senha" id="senha" value="<?php echo $row['senha'] ?>" type="password">	
														</div>

														<div class="form-group col-md-3">
															<label for="funcao">Função</label>
															<select id="idFuncao" name="idFuncao" class="form-control" required>
															<option value=""></option>
																	<?php
																	for($i=0; $i<count($funcoes); $i++)
																	{
																	if($row["idFuncao"] == $funcoes[$i]['idFuncao'])
																	{	
																	?>
																	<option value="<?=$funcoes[$i]['idFuncao']?>" selected><?=$funcoes[$i]['funcao']?></option>
																	<?php
																	}
																	else
																	{
																	?>
																	<option value="<?=$funcoes[$i]['idFuncao']?>" ><?=$funcoes[$i]['funcao']?></option>
																	<?php
																	}
																	}
																	?>
															</select>
														</div>
												</div>
												<div class="row">
													<div class="form-group col-md-9">
														<label>Observações</label>
														<textarea class="form-control" name="observacao" id="observacao" rows="2" ><?php echo $row['observacao'] ?></textarea>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-3">
														<label for="dataAdmissao">Data Admissao</label>
														<input type="date" id="dataAdmissao" class="form-control" name="dataAdmissao" value="<?php echo  $row['dataAdmissao'] ?>">
													</div>	

														<div class="form-group col-md-2">
															<label for="salarioInicial">Salário Inicial</label>
														<input class="form-control" name="salarioInicial" id="salarioInicial" value="<?php echo number_format($row['salarioInicial'], 2, ',', ''); ?>">
														</div>

														<div class="form-group col-md-2">
															<label for="salarioAtual">Salário Atual</label>
														<input class="form-control" name="salarioAtual" id="salarioAtual" value="<?php echo number_format($row['salarioAtual'], 2, ',', ''); ?>">
														</div>

														<div class="form-group col-md-2">
															<label for="convenioColaborador">Convênio Fun</label>
														<input class="form-control" name="convenioColaborador" id="convenioColaborador" value="<?php echo number_format($row['convenioColaborador'], 2, ',', ''); ?>">
														</div>

													</div>
													<div class="row">
													<div class="form-group col-md-2">
														<label for="convenioFamilia">Convênio Família</label>
														<input class="form-control" name="convenioFamilia" id="convenioFamilia" value="<?php echo number_format($row['convenioFamilia'], 2, ',', ''); ?>">
													</div>  
													<div class="form-group col-md-2">
														<label for="convenioOdonto">Convênio Odonto</label>
														<input class="form-control" name="convenioOdonto" id="convenioOdonto" value="<?php echo number_format($row['convenioOdonto'], 2, ',', ''); ?>">
													</div>   
													<div class="form-group col-md-2">
															<label for="vrDia">VR Dia</label>
															<input class="form-control" name="vrDia" id="vrDia" value="<?php echo number_format($row['vrDia'], 2, ',', ''); ?>">
													</div>  
													<div class="form-group col-md-3">
															<label for="vtDia">VT Dia</label>
															<input class="form-control" name="vtDia" id="vtDia" value="<?php echo number_format($row['vtDia'], 2, ',', ''); ?>">
														</div>  
													</div>

													<div class="row">
														<div class="form-group col-md-3">
															<label for="exameAdmissional">Exame Admissional</label>
															<input type="date" id="exameAdmissional" class="form-control" name="exameAdmissional" value="<?php echo $row['exameAdmissional'] ?>">
														</div>	

														<div class="form-group col-md-3">
															<label for="examePeriodico">Exame Periódico</label>
															<input type="date" id="examePeriodico" class="form-control" name="examePeriodico" value="<?php echo $row['examePeriodico'] ?>">
														</div>     

														<div class="form-group col-md-3">
															<label for="dataDemissao">Data Demissão</label>
															<input type="date" id="dataDemissao" class="form-control" name="dataDemissao" value="<?php echo $row['dataDemissao'] ?>">
														</div>     
													</div>

													<div class="row"> 
														<div class="form-group col-md-4">
															<button type="submit" name="submit" value="salvar" class="btn btn-success">Salvar</button>
														</div>				
													</div>
												</form>
										