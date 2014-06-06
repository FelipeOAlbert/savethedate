<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="pt">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="pt">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="pt">  <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title><?=$title?></title>
	
	<meta name="description" content="<?=$description;?>" />
	<meta name="keywords" content="<?=$keywords;?>" />
	<meta name="author" content="<?=AUTHOR;?>" />
	<meta name="revisit-after" content="1 Days" />
	<meta name="robots" content="index,follow" />
	<meta name="googlebot" content="index,follow" />
	<meta name="audience" content="all" />
	
	<!--[if IE]><link rel="shortcut icon" href="<?=site_url('assets/img/favicon.ico');?>"><![endif]-->
	<link rel="icon" href="<?=site_url('assets/img/favicon.ico');?>" />
	
	<!-- Smartphone -->
	
	<!-- css -->
	<link rel="stylesheet" href="<?=site_url('assets/css/site/style.css');?>" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	
	<!-- JS Banner -->
	<script type="text/javascript" src="<?=site_url('assets/js/jquery.js');?>"></script>
	<script type="text/javascript" src="<?=site_url('assets/js/site/jquery.aw-showcase.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/jquery.mask.j');?>s"></script>
	<script type="text/javascript" src="<?=site_url('assets/js/site/custom.js');?>"></script>
	<link rel="stylesheet" href="<?=site_url('assets/css/site/banner.css');?>" media="screen" />
	
</head>

<body>
    <? $this->load->view('site/common/header'); ?>