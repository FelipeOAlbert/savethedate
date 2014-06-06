<!-- Conteudo -->
<div class="content">
    <div class="historico">        
    	<div id="margin"><div id="padding"><a href="<?=site_url('home');?>">Home</a> > Contato</div></div>
     </div>
    
        <div id="margin">        
        	<div id="titulo-principal">
	            <div id="padding">       
            		Contato - <span>Carmaniacs Especialidades Automotivas</span>
                </div>     
            </div>                
            <div id="conteudo-contato">
                
            	<div id="coluna-contato">
                    <form action="<?=site_url('contato/rodape');?>" class="form_contato">
                    
                        <div id="linha">
                            <div id="text-form-rodape">Nome:</div>
                            <input type="text" name="nome" id="input-form-contato">
                        </div>
                        <div id="linha">
                            <div id="text-form-rodape">E-mail:</div>
                            <input type="text" name="queroveragora" id="input-form-contato">
							<input type="text" name="email" style="display: none;"> 
                        </div>
						<div id="linha">
                            <div id="text-form-rodape">Telefone:</div>
                            <input type="text" name="telefone" id="input-form-contato">
                        </div>
                        <div id="linha">
                            <div id="text-form-rodape">Assunto:</div>
                            <input type="text" name="assunto" id="input-form-contato">
                        </div>
                        <div id="linha">
                            <div id="text-form-rodape">Cidade:</div>
                            <input type="text" name="cidade" id="input-form-contato">
                        </div>
                        <div id="divisor-contato">
                            
                            <div id="linha">
                            <div id="text-form-rodape">Mensagem:</div>
                            <textarea name="contato_mensagem" cols="" rows="" id="textarea-form-contato"></textarea>
                            </div>
                            <div id="linha">
                            <input type="reset" name="limpar" id="contato-botao-contato" value="Limpar">
                            <input type="submit" name="enviar" id="contato-botao-contato" class="envia-contato" value="Enviar!">
                            </div>
                        </div>
                    </form>
                    
                
            </div>
            <div id="coluna-contato">
                <div id="text-contato">
                    <div id="sub-title-contato">Horário de Funcionamento</div>
                    <div id="linha">
                        Segunda - Sexta: 07h30 - 18:00
                    </div>
                    <div id="linha">
                        Sábado: 07h30 - 14h00
                    </div>
                </div>
                <div id="img-contato">
                    <img src="<?=site_url('assets/img/foto01.jpg');?>" alt="Carmaniacs - Troca de Óleo a Domicílo" />
                </div>
            </div>        
            </div>    
            </div>
    
    </div>
<!-- Fim Conteudo -->