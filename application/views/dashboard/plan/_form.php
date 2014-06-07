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
					<label>Nome:</label>
					<input class="form-control" type="text" name="name" value="<?=set_value('name', @$row['name'], $this->input->post('name')); ?>" />
				</div>
				
				<div class="col-md-12 field-box">
					<label>Descrição:</label>
					<textarea class="form-control" name="description"><?=set_value('description', @$row['description'], $this->input->post('description')); ?></textarea>
				</div>
				
				<div class="col-md-12 field-box">
					<label>Valor:</label>
					<input class="form-control money" type="text" name="value" value="<?=set_value('value', money(@$row['value']), $this->input->post('value')); ?>" />
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