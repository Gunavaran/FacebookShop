<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/12/2018
 * Time: 2:55 PM
 */

require_once '../../../vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '373936209778018',
    'app_secret' => '72094c189a4e25895733e4d8b581707c',
    'default_graph_version' => 'v2.10'

]);

$helper = $fb->getRedirectLoginHelper();
