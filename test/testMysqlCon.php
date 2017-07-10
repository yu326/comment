<?php
/**
 * Created by PhpStorm.
 * User: koreyoshi
 * Date: 2017/7/10
 * Time: 16:26
 */
//手动设置错误显示级别
ini_set("error_reporting", "E_ALL & ~E_NOTICE");

include_once("../util/include.php");//引入文件
initLogger(LOGNAME_TEST);//使用同步模块的日志配置


$dsql = new DB_MYSQL(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_YU, FALSE);
$logger->info("the dsql is:" . var_export($dsql, true));
$result = test();
$logger->info("the result is:" . var_export($result, true));
/**
 *  测试方法
 */
function test()
{
    global $dsql, $logger;
    $result = array();
    $sql = 'SELECT * FROM  about';
    $qr = $dsql->ExecQuery($sql);
    $logger->info("the dsql is:" . var_export($dsql, true));
    if (!$qr) {
        $logger->error(" " . __FUNCTION__ . " sqlerror:" . $sql . " - " . $dsql->GetError());
    } else {
        while ($r = $dsql->GetArray($qr)) {
            //$r['taskparams'] = json_decode($r['taskparams']);
            $result[] = $r;
        }
    }
    return $result;
}


//$dsql->SelectDB(DATABASE_WEIBOINFO);


?>