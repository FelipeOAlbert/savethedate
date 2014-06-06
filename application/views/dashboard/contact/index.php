<? $this->load->view('dashboard/template/header');?>

<body>

	<? $this->load->view('dashboard/template/navbar');?>
	<? $this->load->view('dashboard/template/sidebar');?>

	<!-- main container -->
    <div class="content">

        <div id="pad-wrapper" class="users-list">
			
			<? if($this->session->userdata('mensagem')){

				$mensagem  = $this->session->userdata('mensagem');
				$class 		= 'erro';
				
				$this->session->unset_userdata('mensagem');
				
				if($mensagem['retorno'] == 1 || $mensagem['retorno'] == 'sucess'){
					$class = 'alert alert-success';
				}
				?>
				
				<div class="<?=$class;?>">
					<p><?=$mensagem['mensagem'];?></p>
				</div>
			
			<? } ?>
            
			<div class="row">
                <h2 class="col-md-10 col-sm-10 col-xs-10">Contatos</h2> 
            </div>
			<br />
			
            <?php if( $list!=false ){ ?>
            <!-- Users table -->
            <div class="row">
                <div class="col-md-12">
				  
				  <div class="panel panel-default">
					
					<?  $metodo = ($this->uri->segment(2) == NULL) ? 'index' : $this->uri->segment(2); ?>
					
                    <table class="table table-striped table-hover table-bordered table-condensed table-responsive">
                        <thead>
                            <tr>
                                <th class="col-md-1">#</th>
                                <th class="col-md-2">Nome</th>
								<th class="col-md-2">Email</th>
								<th class="col-md-2">Telefone</th>
								<th class="col-md-2">Cidade</th>
								<th class="col-md-2">Assunto</th> 
								<th class="col-md-2">Mensagem</th> 
                                <th class="col-md-2">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
							<tr>
								<form role="form" method="get" id="frmBusca" action="<?=site_url($this->uri->segment(1).'/'.$metodo.'/1');?>">
									<td>
										<input type="text" name="id" value="<?=@$search['id'];?>" placeholder="Filtrar por ID" class="form-control numeric" />
									</td>
									<td>
										<input type="text" name="name" value="<?=@$search['name'];?>" placeholder="Filtrar por Nome" class="form-control" />
									</td>
									<td>
										<input type="text" name="email" value="<?=@$search['email'];?>" placeholder="Filtrar por Email" class="form-control" />
									</td>
									<td>
										<input type="text" name="phone" value="<?=@$search['phone'];?>" placeholder="Filtrar por Telefone" class="form-control" />
									</td>
									<td>
										<input type="text" name="city" value="<?=@$search['city'];?>" placeholder="Filtrar por Cidade" class="form-control" />
									</td>
									<td>
										<input type="text" name="subject" value="<?=@$search['subject'];?>" placeholder="Filtrar por Assunto" class="form-control" />
									</td>
									<td>
										<input type="text" name="message" value="<?=@$search['message'];?>" placeholder="Filtrar por Mensagem" class="form-control" />
									</td>
									<td>
										<input type="submit" name="btSubmit" value="Filtrar" class="btn btn-primary" id="buscar" />
										<input type="button" name="btClear" value="Limpar" class="btn btn-info" id="limpa_busca" />
									</td>
								</form>
							</tr>
							
							<? foreach($list as $row){ ?>
							   <!-- row -->
							   <tr class="first">
									<td>
									   <?=$row['id'];?>
									</td>
									<td>
									   <?=$row['name'];?>
									</td>
									<td>
									   <?=$row['email'];?>
									</td>
									<td>
									   <?=$row['phone'];?>
									</td>
									<td>
									   <?=$row['city'];?>
									</td>
									<td>
									   <?=word_limiter($row['subject'], 20);?>
									</td>
									<td>
									   <?=word_limiter($row['message'], 20);?>
									</td>
									<td>
										<a href="<?=site_url($this->router->class."/view/".$row['id']);?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Visualizar</a>
										<a href="<?=site_url($this->router->class.'/delete/'.$row['id']);?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Apagar</a>
									</td>
							   </tr>
						   <?php }?>
                        </tbody>
                    </table>
					</div>
                </div>
            </div>

            <?php }else{ ?>
               <p> Nenhuma Mensagem cadastrado.</p>
            <?php } ?>

            <?=$paginacao?>

            <!-- end users table -->
        </div>
    </div>
    <!-- end main container -->

<? $this->load->view('dashboard/template/footer');?>