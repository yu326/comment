<?php
/**
 * Created by PhpStorm.
 * User: koreyoshi
 * Date: 2017/7/12
 * Time: 10:30
 */
ini_set("error_reporting", "E_ALL & ~E_NOTICE");
include_once("../util/include.php");
initLogger(LOGNAME_ADD_COMMENT);//使用同步模块的日志配置

$dsql = new DB_MYSQL(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_COMMENT, FALSE);
if ($_POST) {
    //todo   安全验证
    $data = $_POST;
    $logger->info("the post data is:" . var_export($data, true));
    $uid = $data['uid'];


    if (isset($data['content']) && !empty($data['content'])) {
        $commentContent = $data['content'];
        $filterContent = filterString($commentContent);
        $data['content'] = $filterContent;
        $res = addComment($data);
        if ($res) {
            echo true;
        } else {
            echo false;
        }
        die;
    } else {
        echo false;
        die;
    }


}
if (!empty($_GET)) {
    $type = $_GET['type'];
    switch ($type) {
        case  "getCommentData":
            getCommentData($_GET);
            break;
        default;
            break;
    }
}


function getCommentData()
{
    global $logger;
    $aid = $_GET['aid'];
    $logger->info("the aid is :" . var_export($aid, true));
    $commentData = getCommentData($_GET);
    $logger->info("the commentData is:" . var_export($commentData, true));
}





