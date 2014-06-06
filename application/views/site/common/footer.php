<!-- Rodapé -->

	<div class="rodape">

		<div id="margin">

			<? if($this->uri->segment(1) != 'contato'){ ?>
			<div id="coluna-formrodape">

				<div id="titulo-formrodape">Formulário</div>

                <form action="<?=site_url('contato/rodape');?>" id="formulario-rodape" class="form_contato" name="formulario-rodape">

                    <div id="divisor1">
                        <div id="linha">
                            <div id="text-form-rodape">Nome:</div>
                            <input type="text" name="nome" id="input-form-rodape">
                        </div>

                        <div id="linha">
                            <div id="text-form-rodape">E-mail:</div>
                            <input type="text" name="queroveragora" id="input-form-rodape">
							<input type="text" name="email" style="display: none;"> 
                        </div>
						
						<div id="linha">
                            <div id="text-form-rodape">Telefone:</div>
                            <input type="text" name="telefone" id="input-form-rodape">
                        </div>

                        <div id="linha">
                            <div id="text-form-rodape">Assunto:</div>
                            <input type="text" name="assunto" id="input-form-rodape">
                        </div>

                        <div id="linha">
                            <div id="text-form-rodape">Cidade:</div>
                            <input type="text" name="cidade" id="input-form-rodape">
                        </div>
                    </div>

                    <div id="divisor">
                        <div id="text-form-rodape">Mensagem:</div>
                        <textarea name="contato_mensagem" cols="" rows="" id="textarea-form-rodape"></textarea>
                        <input type="submit" name="enviar" id="contato-botao-rodape" class="envia-contato" value="Enviar!">
                    </div>

				</form>

			</div>

			<div id="coluna-redesrodape">
				
				<div id="titulo-redesrodape">Contato</div>

				<div id="linha">

					<div id="telefone-rodape">(11)94743-0612 | ID: 35*18*4113 |<br /> (11) 96453-7212</div>

				</div>

				<div id="linha">

					<div id="email-rodape">contato@carmaniacs.com.br</div>

				</div>

				<div id="titulo-redesrodape1">Redes Sociais</div>

				<div id="linha">
					<div id="redes-rodape">
						<div class="icones"><a href="http://www.facebook.com/carmaniacs.oil" target="_blank"><img src="<?=site_url('assets/img/icone-face-rodape.png');?>" /></a></div>
						<!--<div class="icones"><a href="#" target="_blank"><img src="<?=site_url('assets/img/icone-twitter-rodape.png');?>" /></a></div>-->
						<!--<div class="icones"><a href="#" target="_blank"><img src="<?=site_url('assets/img/icone-youtube-rodape.png');?>" /></a></div>-->
						<!--<div class="icones"><a href="#" target="_blank"><img src="<?=site_url('assets/img/icone-instagram-rodape.png');?>" /></a></div>-->
					</div>
				</div>

			</div>
			<? } ?>
		</div>

	</div>

	<div class="faixa-direitos">
		<div id="margin">
			<div id="ir-topo"><a id="top"><img src="<?=site_url('assets/img/ir-topo.png');?>" /></a></div>
			<div id="direitos">
				CARMANIACS OIL IN HOME 2014 - TODOS OS DIREITOS RESERVADOS
			</div>
			<div id="desenvolvimento">
				DESENVOLVIDO POR: <a href="http://wadtecnologia.com.br/" target="_blank">WAD TECNOLOGIA</a>
			</div>
		</div>
	</div>
<!-- fim Rodapé -->

<!-- Rodapé Mobile -->
<div class="rodape-mobile">
		<div id="margin">
			<div id="coluna-redesrodape">
				
                <div id="titulo-redesrodape">Contato</div>
				<div id="linha">
					<div id="telefone-rodape-mobile">(11)94743-0612 | ID: 35*18*4113 |<br /> (11) 96453-7212</div>
				</div>
				<div id="linha">
					<div id="email-rodape-mobile">contato@carmaniacs.com.br</div>
				</div>
				<div id="titulo-redesrodape1">Redes Sociais</div>
				<div id="linha">
					<div id="redes-rodape-mobile">
						<div class="icones"><a href="http://www.facebook.com/carmaniacs.oil" target="_blank"><img src="<?=site_url('assets/img/icone-face-rodape.png');?>" /></a></div>
						<!--<div class="icones"><a href="#" target="_blank"><img src="<?=site_url('assets/img/icone-twitter-rodape.png');?>" /></a></div>-->
                        <!--<div class="icones"><a href="#" target="_blank"><img src="<?=site_url('assets/img/icone-youtube-rodape.png');?>" /></a></div>-->
                        <!--<div class="icones"><a href="#" target="_blank"><img src="<?=site_url('assets/img/icone-instagram-rodape.png');?>" /></a></div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- -->
<div class="faixa-direitos-mobile">
    <div id="margin">
    	<div id="linha">
        	<div id="ir-topo-mobile"><a id="top"><img src="<?=site_url('assets/img/ir-topo.png');?>" /></a></div>
        </div>
        <div id="direitos-mobile">
            CARMANIACS OIL IN HOME 2014 - TODOS OS DIREITOS RESERVADOS
        </div>
        <div id="desenvolvimento-mobile">
            DESENVOLVIDO POR: <a href="http://wadtecnologia.com.br/" target="_blank">WAD TECNOLOGIA</a>
        </div>
    </div>
</div>
<!-- Fim Rodapé Mobile -->

</body>

</html>