<?php
/**
 * Created by PhpStorm.
 * User: koreyoshi
 * Date: 2017/7/12
 * Time: 15:36
 */

/**
 *  获取全部文章
 */
function getAllArticleData()
{
    global $logger, $dsql;
    $result = array();
    //todo  type 类型暂时不考虑
    $sql = "SELECT id,title,content FROM  " . DATABASE_ARTICLE . " WHERE is_show = " . COMMENT_ISSHOW . " ORDER BY created_on DESC";
    $logger->info("log : " . __FILE__ . " -> " . __FUNCTION__ . " -> " . __LINE__ . " : the getAllArticleData sql is :" . var_export($sql, true));
    $qr = $dsql->ExecQuery($sql);
    if (!$qr) {
        $logger->error("log : " . __FUNCTION__ . " sqlerror:" . $sql . " - " . $dsql->GetError());
    } else {
        while ($r = $dsql->GetArray($qr)) {
            $result[] = $r;
        }

    }
    $logger->info("log : getArticleData result is:" . var_export($result, true));
    return $result;
}


function getOneArticle($uid)
{
    global $logger, $dsql;
    $result = array();
    //todo  type 类型暂时不考虑
    $sql = "SELECT uid,title,content FROM  " . DATABASE_ARTICLE . " WHERE is_show = " . COMMENT_ISSHOW . " AND id = " . $uid;
    $logger->info("log : " . __FILE__ . " -> " . __FUNCTION__ . " -> " . __LINE__ . " : the getOneArticle sql is :" . var_export($sql, true));
    $qr = $dsql->ExecQuery($sql);
    if (!$qr) {
        $logger->error("log : " . __FUNCTION__ . " sqlerror:" . $sql . " - " . $dsql->GetError());
    } else {
        while ($r = $dsql->GetArray($qr)) {
            $result[] = $r;
        }

    }
    $logger->info("log : getArticleData result is:" . var_export($result, true));
    return $result;
}