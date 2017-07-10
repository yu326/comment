<?php
/**
 * Created by PhpStorm.
 * User: koreyoshi
 * Date: 2017/7/10
 * Time: 16:29
 */


/*
 * 初始化记录日志的实例
 * author: Todd
 * param：$conf 日志配置名称
 * return：返回Logger实例
 */
function initLogger($conf)
{
    global $logger;
    $logger = Logger::getLogger($conf);
}


//链接数据库
function dbconnect()
{
    connectMysql(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_WEIBOINFO);
    mysql_query("SET NAMES utf8");
}

/*
 * 数据库连接函数
 */
function connectMysql($host, $user, $password, $table)
{
    global $link, $db;
    /*
     * 调用connectMysql时，还未对log类进行初始化
     */
    //set_log(DEBUG, "enter connectMysql", __FILE__, __LINE__);
    $link = mysql_connect($host, $user, $password) or die ("connect DB failed" . mysql_error());
    $db = mysql_select_db($table) or die ("select db failed " . mysql_error());
    //set_log(DEBUG, "exit connectMysql", __FILE__, __LINE__);
}

/*
 * 数据库关闭函数
 */
function closeMysql()
{
    global $link;
    mysql_close($link);
}


?>