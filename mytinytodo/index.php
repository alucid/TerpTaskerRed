<?php
/*
	This file is part of myTinyTodo.
	(C) Copyright 2009-2010 Max Pozdeev <maxpozdeev@gmail.com>
	Licensed under the GNU GPL v3 license. See file COPYRIGHT for details.
*/

//echo "HEY";
require_once('/var/www/mytinytodo/init.php');
//require_once('./init.php');
//echo "HI";
$lang = Lang::instance();

if($lang->rtl()) Config::set('rtl', 1);

if(!is_int(Config::get('firstdayofweek')) || Config::get('firstdayofweek')<0 || Config::get('firstdayofweek')>6) Config::set('firstdayofweek', 1);

define('TEMPLATEPATH', MTTPATH. 'themes/'.Config::get('template').'/');
//define('MTTPATH', '/var/www/mytinytodo/');
//define('TEMPLATEPATH', MTTPATH. 'themes/'.Config::get('template').'/');

require(TEMPLATEPATH. 'index.php');

?>
