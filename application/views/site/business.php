<!-- Conteudo -->

<div class="content">

    <div class="historico">

        <div id="margin"><div id="padding"><a href="<?=site_url('home');?>">Home</a> > Empresa</div></div>

    </div>

    <div id="margin">

        <div id="titulo-principal">
        	<div id="padding">

            	Empresa - <span>Carmaniacs Especialidades Automotivas</span>
			</div>
        </div>

        

        <div id="conteudo-administravel">
        	<div id="padding">

            	<?=(isset($row['description'])) ? $row['description'] : 'Dados não cadastrados';?>
            
            </div>

        </div>

        <div id="imagem-fixas">

            <? if(isset($row['image']) and !empty($row['image'])){ ?>

            <div id="foto-empresa">

                <img src="<?=site_url('assets/uploads/business/'.$row['image']);?>" />

            </div>

            <? } ?>

            <? if(isset($row['image2']) and !empty($row['image2'])){ ?>

            <div id="foto-empresa">

                <img src="<?=site_url('assets/uploads/business/'.$row['image2']);?>" />

            </div>

            <? } ?>

        </div>

    </div>

</div>

<!-- Fim Conteudo -->