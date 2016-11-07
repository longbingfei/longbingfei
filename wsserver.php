<?php
use Workerman\Worker;
use App\Models\Article;
require_once __DIR__ . '/vendor/workerman/workerman/Autoloader.php';
$ws = new Worker("websocket://10.0.5.233:2348");
$ws->count = 4;
$ws->onMessage = function($connection, $data) {
    $res = Article::where('id',1)->first()->content;
    $connection->send($res);
};

Worker::runAll();
