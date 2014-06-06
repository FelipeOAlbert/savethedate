<div id="sidebar-nav">
	<ul id="dashboard-menu">
		<li>
			<a href="javascript:" class="dropdown-toggle dropdown-hover"> <i class="icon-tasks"></i> <span>Banner</span>
				<i class="icon-chevron-down"></i>
			</a>
			<ul class="submenu">
				<li>
					<a href="<?=site_url('banner/index');?>">Listagem</a>
				</li>
				<li>
					<a href="<?=site_url('banner/create');?>">Adicionar</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="<?=site_url('business/update/1');?>" class=""><i class="icon-edit"></i> <span>Empresa</span></a>
		</li>
		<li>
			<a href="javascript:" class="dropdown-toggle"> <i class="icon-tasks"></i> <span>Serviços</span>
				<i class="icon-chevron-down"></i>
			</a>
			<ul class="submenu">
				<li>
					<a href="<?=site_url("service/index");?>">Listagem</a>
				</li>
				<li>
					<a href="<?=site_url("service/create");?>">Adicionar</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="javascript:" class="dropdown-toggle"> <i class="icon-tasks"></i> <span>Notícias</span>
				<i class="icon-chevron-down"></i>
			</a>
			<ul class="submenu">
				<li>
					<a href="<?=site_url('notice/index');?>">Listagem</a>
				</li>
				<li>
					<a href="<?=site_url('notice/create');?>">Adicionar</a>
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