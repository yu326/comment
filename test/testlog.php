<?php

/*
 * 之前装的日志控件是seaslog，忽然想试下公司用的那个log4php就来试下
 *
 * */

include_once("../util/include.php");
initLogger(LOGNAME_TEST);


$logger->info(__FUNCTION__ . __FILE__ . __LINE__ . " the is a test info level data~");
$logger->debug(__FUNCTION__ . __FILE__ . __LINE__ . " the is a test debug level data~");