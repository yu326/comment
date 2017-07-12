<?php
/**
 * Created by PhpStorm.
 * User: koreyoshi
 * Date: 2017/7/12
 * Time: 11:05
 */

/**
 * 过滤非法字符
 *
 * @param $content    带过滤的字符串
 * @return string    过滤后的内容
 */
function filterString($content)
{
    $realvalue = iconv("UTF-8", "UCS-2//IGNORE", $content);//忽略非法字符
    $realvalue = iconv("UCS-2", "UTF-8", $realvalue);//转回utf8
    return $realvalue;
}