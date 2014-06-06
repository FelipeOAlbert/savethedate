<? if(validation_errors()){ ?>
<div class="alert alert-danger">
	<?php echo validation_errors(); ?>
</div>
<? } ?>

<div class="row form-wrapper">
	
	<!-- left column -->
	<div class="col-md-9 with-sidebar">
		
		<div class="container">
			
			<form class="new_user_form" method="post" enctype="multipart/form-data" >
				
				<div class="col-md-12 field-box">
					<label for="name" class="col-md-2 control-label">Nome:</label>
					<div class="col-md-8">
						<input class="form-control" type="text" name="name" value="<?=set_value('name', @$row['name'], $this->input->post('name')); ?>" />
					</div>
				</div>
				
				<div class="col-md-12 field-box">
					<label for="name" class="col-md-2 control-label">Listar na Home:</label>
					<div class="col-md-8">
						
						<?
							$check = false;
							if(isset($row['list']) and $row['list'] == 1){
								$check = true;
							}elseif(isset($_POST['list'])){
								$check = true;
							}
						?>
						
						<input  type="checkbox" name="list" value='1' <? if($check){ ?> checked="checked" <? } ?>/>
					</div>
				</div>
				
				<div class="col-md-12 field-box">
					<label for="name" class="col-md-2 control-label">Gravidade para exibição:</label>
					<div class="col-md-8">
						<input class="form-control numeric" type="text" name="gravity" value="<?=set_value('gravity', @$row['gravity'], $this->input->post('gravity')); ?>" />
					</div>
				</div>
				
				<div class="col-md-12 field-box">
					<label for="image" class="col-md-2 control-label">Imagem:</label>
					<div class="col-md-8">
						<input type="file" name="image" placeholder="">
					</div>
					<? if(isset($row['image']) && strlen($row['image'])>4){ $row['image'] = explode('.', $row['image']); ?>
					<div class="col-md-11 field-box actions">
						<img id="thumb" src="<?=site_url('assets/uploads/service/'.$row['image'][0].'_thumb.'.$row['image'][1]);?>" />
						<input type="button" class="btn btn-danger delete_image" value="Apagar Foto" />
						<input type="hidden" value="0" id="delete_img" name="delete_img" />
					</div>
					<? } ?>
				</div>
				
				<div class="col-md-12 field-box">
					<label for="description" class="col-md-2 control-label">Descrição:</label>
					<div class="col-md-8">
						<textarea name="description" class="form-control" rows="5"><?=set_value('description', @$row['description'], $this->input->post('description')); ?></textarea>
					</div>
				</div>
				
				<div class="col-md-11 field-box actions">
                    <input type="submit" class="btn btn-primary btn-ls" value="<?=($this->router->method == 'update') ? 'Editar' : 'Cadastrar';?>">
                    <span>OU</span>
                    <input type="reset" id="voltar" value="Cancelar" class="reset">
                </div>
			</form>
		</div>
	</div>

	<!-- side right column -->
	<div class="col-md-3 form-sidebar pull-right"></div>
	
</div>