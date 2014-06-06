<!-- Conteudo -->



<div class="content">



    



    <? if($row){ ?>



    <div class="historico">



        <div id="margin"><div id="padding"><a href="<?=site_url('home');?>">Home</a> > <a href="<?=site_url('noticias');?>">Notícias</a> > <?=$row['name'];?></div></div>



    </div>



    <div id="margin">



        <div id="titulo-principal">
        	<div id="padding">
	            Notícias - <span><?=$row['name'];?></span>
			</div>
        </div>



        <div id="imagem-destaque">



            <? if(!empty($row['image'])){ ?>



            <img src="<?=site_url('assets/uploads/notice/'.$row['image']);?>" />



            <? }else{ ?>

            

            <img src="<?=site_url('assets/img/imagem-padrao.jpg');?>" />

            

            <? } ?>



        </div>



        <div id="conteudo-administravel">
        
			<div id="padding">
	            <?=$row['description'];?>
			</div>
            
        </div>

        <div id="voltar-listagem">

            <a href="<?=site_url('noticias');?>">< Voltar</a>

        </div>



    </div>



    <? }else{ ?>



    <div class="historico">



        <div id="margin"><div id="padding"><a href="<?=site_url('home');?>">Home</a> > <a href="<?=site_url('noticias');?>">Serviços</a> Dados não encontrado</div></div>



    </div>



    <div id="margin">



        <div id="titulo-principal">

		<div id="padding">
            Notícias - <span>Dados não encontrado</span>
		</div>


        </div>



        <div id="conteudo-administravel">

			<div id="padding">
            	<p><b>Dados solicitados não foram encontrados. <a href="<?=site_url('noticias');?>">Clique aqui</a> para voltar a listagem.</b></p>
			</div>


        </div>

        <div id="voltar-listagem">

            <a href="<?=site_url('noticias');?>">< Voltar</a>

        </div>



    </div>



    <? } ?>



</div>



<!-- Fim Conteudo -->