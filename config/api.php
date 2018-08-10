<?php
/**
 * api层定义写在这
 */
$scm_config = require(__DIR__ . '/scm_config.php');
return [
    'shandingApi' => [
        'class'    => 'app\components\api\QmsApi',
        'app_id'   => $scm_config['shanding.mi.com.qmsApi.app_id'],
        'host_url' => $scm_config['shanding.mi.com.qmsApi.host_url'],
        'app_key'  => $scm_config['shanding.mi.com.qmsApi.app_key'],
    ],
];