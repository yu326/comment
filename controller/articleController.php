<?php
/**
 * Created by PhpStorm.
 * User: koreyoshi
 * Date: 2017/7/12
 * Time: 15:34
 */

ini_set("error_reporting", "E_ALL & ~E_NOTICE");
include_once("../util/include.php");
initLogger(LOGNAME_ARTICLE);//使用同步模块的日志配置

$dsql = new DB_MYSQL(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_COMMENT, FALSE);


if (!empty($_GET)) {
    $type = $_GET['type'];
    switch ($type) {
        case "getArticle";
            $res = getArticle($_GET);
            break;
        default;
            break;
    }
    echo json_encode($res, true);
    die;
}

function getArticle($getData)
{
    global $logger;
    $logger->info("here" . var_export($getData, true));
    if (isset($getData['uid']) && !empty($getData['uid'])) {
        $res = getOneArticle($getData['uid']);
    } else {
        $res = getAllArticleData();
    }

    return $res;
}


?>