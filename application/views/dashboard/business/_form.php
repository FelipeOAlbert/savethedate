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
					<label for="image" class="col-md-2 control-label">Imagem 1:</label>
					<div class="col-md-8">
						<input type="file" name="image" placeholder="">
					</div>
					<? if(isset($row['image']) && strlen($row['image'])>4){ $row['image'] = explode('.', $row['image']); ?>
					<div class="col-md-11 field-box actions">
						<img id="thumb_1" src="<?=site_url('assets/uploads/business/'.$row['image'][0].'_thumb.'.$row['image'][1]);?>" />
						<input type="button" class="btn btn-danger delete_image2" rel="1" value="Apagar Foto" />
						<input type="hidden" value="0" id="delete_img_1" name="delete_img_1" />
					</div>
					<? } ?>
				</div>
				
				<div class="col-md-12 field-box">
					<label for="image2" class="col-md-2 control-label">Imagem 2:</label>
					<div class="col-md-8">
						<input type="file" name="image2" placeholder="">
					</div>
					<? if(isset($row['image2']) && strlen($row['image2'])>4){ $row['image2'] = explode('.', $row['image2']); ?>
					<div class="col-md-11 field-box actions">
						<img id="thumb_2" src="<?=site_url('assets/uploads/business/'.$row['image2'][0].'_thumb.'.$row['image2'][1]);?>" />
						<input type="button" class="btn btn-danger delete_image2" rel="2" value="Apagar Foto" />
						<input type="hidden" value="0" id="delete_img_2" name="delete_img_2" />
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