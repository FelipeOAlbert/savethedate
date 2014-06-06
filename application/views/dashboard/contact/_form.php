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
						<p><?=@$row['name'];?></p>
					</div>
				</div>
				
				<div class="col-md-12 field-box">
					<label for="name" class="col-md-2 control-label">Email:</label>
					<div class="col-md-8">
						<p><?=@$row['email'];?></p>
					</div>
				</div>
				
				<div class="col-md-12 field-box">
					<label for="name" class="col-md-2 control-label">Telefone:</label>
					<div class="col-md-8">
						<p><?=@$row['phone'];?></p>
					</div>
				</div>
				
				<div class="col-md-12 field-box">
					<label for="name" class="col-md-2 control-label">Cidade:</label>
					<div class="col-md-8">
						<p><?=@$row['city'];?></p>
					</div>
				</div>
				
				<div class="col-md-12 field-box">
					<label for="description" class="col-md-2 control-label">Assunto:</label>
					<div class="col-md-8">
						<div><?=@$row['subject']; ?></div>
					</div>
				</div>
				
				<div class="col-md-12 field-box">
					<label for="description" class="col-md-2 control-label">Mensagem:</label>
					<div class="col-md-8">
						<div><?=@$row['message']; ?></div>
					</div>
				</div>
				
				<div class="col-md-11 field-box actions">
                    <input type="reset" id="voltar" value="Voltar" class="reset">
                </div>
			</form>
		</div>
	</div>

	<!-- side right column -->
	<div class="col-md-3 form-sidebar pull-right"></div>
	
</div>