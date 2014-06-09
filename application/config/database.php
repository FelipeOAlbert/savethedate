<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group   = ENVIRONMENT;
$active_record  = TRUE;

$db['development']['hostname']  = 'localhost';
$db['development']['username']  = 'root';
$db['development']['password']  = '123qwe';
$db['development']['database']  = 'savethedate';
$db['development']['dbdriver']  = 'mysql';
$db['development']['dbprefix']  = '';
$db['development']['pconnect']  = TRUE;
$db['development']['db_debug']  = TRUE;
$db['development']['cache_on']  = FALSE;
$db['development']['cachedir']  = '';
$db['development']['char_set']  = 'utf8';
$db['development']['dbcollat']  = 'utf8_general_ci';
$db['development']['swap_pre']  = '';
$db['development']['autoinit']  = TRUE;
$db['development']['stricton']  = FALSE;

$db['testing']['hostname']      = 'rds-1.c3jvxejdpzv9.us-east-1.rds.amazonaws.com';
$db['testing']['username']      = 'rds';
$db['testing']['password']      = 'felipe2345';
$db['testing']['database']      = 'save_2';
$db['testing']['dbdriver']      = 'mysql';
$db['testing']['dbprefix']      = '';
$db['testing']['pconnect']      = TRUE;
$db['testing']['db_debug']      = TRUE;
$db['testing']['cache_on']      = FALSE;
$db['testing']['cachedir']      = '';
$db['testing']['char_set']      = 'utf8';
$db['testing']['dbcollat']      = 'utf8_general_ci';
$db['testing']['swap_pre']      = '';
$db['testing']['autoinit']      = TRUE;
$db['testing']['stricton']      = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */