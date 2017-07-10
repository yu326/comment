<?php
/**
 * Created by PhpStorm.
 * User: koreyoshi
 * Date: 2017/7/10
 * Time: 16:36
 */

//配置文件根定义
define('CONFIG_DIR', 'U:/comment');
define('LOG4PHP_DIR', CONFIG_DIR . '/util/log4php');//日志控件地址
//日志名定义
define("LOGNAME_TEST", "test");
define("LOGNAME_SUIXIN", "suixin");
//引入log4php
include_once(LOG4PHP_DIR . "/Logger.php");
Logger::configure(CONFIG_DIR . "/php_config/log4php.xml");


define('DATABASE_SERVER', 'localhost:3306');    //数据库server
define('DATABASE_USERNAME', 'root');    //用户名
define('DATABASE_PASSWORD', 'root');    //密码


?>