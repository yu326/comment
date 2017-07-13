<?php
/**
 * Created by PhpStorm.
 * User: koreyoshi
 * Date: 2017/7/12
 * Time: 11:11
 */
/**
 * 评论数据
 *
 * @param $data   待入库数据
 * @return bool   入库结果
 */
function addComment($data)
{
    global $logger, $dsql;
    $res = true;
    $sql = "INSERT INTO " . DATABASE_COMMENT . "(aid,uid,pid,content,is_show,`level`,created_on) VALUES(" . $data['aid'] . "," . $data['uid'] . "," . $data['pid'] . ",'" . $data['content'] . "'," . COMMENT_ISSHOW . "," . COMMENT_LEVEL . "," . time() . ")";
    $logger->info("log : " . __FILE__ . " -> " . __FUNCTION__ . " -> " . __LINE__ . " : the addComment sql is :" . var_export($sql, true));
    $qr = $dsql->ExecQuery($sql);
    if (!$qr) {
        $res = false;
        $logger->error("log : " . __FUNCTION__ . " sqlerror:" . $sql . " - " . $dsql->GetError());
    } else {
        $id = $dsql->GetLastID($qr);
        $logger->info("log : add new comment is success! the id is:" . var_export($id, true) . ". the uid is:" . var_export($data['uid'], true) . ". the content is:" . var_export($data['content'], true));
    }
    return $res;
}


function getCommentData4db($data)
{
    global $logger, $dsql;
    $result = array();
    $sql = "SELECT cid,uid,content,floor,childFloor,created_on FROM  " . DATABASE_COMMENT . " WHERE is_show = " . COMMENT_ISSHOW . " AND aid = " . $data['aid'] . " AND pid = 0 limit 3";
    $logger->info("log : " . __FILE__ . " -> " . __FUNCTION__ . " -> " . __LINE__ . " : the getComment sql is :" . var_export($sql, true));
    $qr = $dsql->ExecQuery($sql);
    if (!$qr) {
        $logger->error("log : " . __FUNCTION__ . " sqlerror:" . $sql . " - " . $dsql->GetError());
    } else {
        while ($r = $dsql->GetArray($qr)) {
            $result[] = $r;
        }
    }
    $logger->info("log : getComment data is:" . var_export($result, true));
    return $result;
}