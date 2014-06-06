<div id="sidebar-nav">
	<ul id="dashboard-menu">
		<li>
			<a href="javascript:" class="dropdown-toggle dropdown-hover"> <i class="icon-group"></i> <span>Clientes</span>
				<i class="icon-chevron-down"></i>
			</a>
			<ul class="submenu">
				<li>
					<a href="<?=site_url('client/index');?>">Listagem</a>
				</li>
				<li>
					<a href="<?=site_url('client/create');?>">Adicionar</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="<?=site_url("user/index")?>" class="dropdown-toggle"> <i class="icon-group"></i> <span>Usuários</span>
				<i class="icon-chevron-down"></i>
			</a>
			<ul class="submenu">
				<li>
					<a href="<?=site_url('user/index');?>">Listagem</a>
				</li>
				<li>
					<a href="<?=site_url('user/create');?>">Adicionar</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="<?=site_url('contact/index')?>"> <i class="icon-group"></i><span>Contato</span></a>
		</li>
	</ul>
</div>