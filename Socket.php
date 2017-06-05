<?php
/**
 * 将workerman Liunx代码部署到服务器 开启服务器对应的2345和5678端口
 * 修改php.ini的配置 开启socket
 * php server.php start -d
 * 运行Socket.php 测试uid已经写死 可以手动传值 将webSocket.js引入html 可对应id接受数据
 */


// 建立socket连接到内部推送端口
$client = stream_socket_client('tcp://xx.xxx.xxx.xx:5678', $errno, $errmsg, 1);
// 推送的数据，包含uid字段，表示是给这个uid推送
$data = array('uid'=>'100001', 'data'=>'消息推送');
// 发送数据，注意5678端口是Text协议的端口，Text协议需要在数据末尾加上换行符
fwrite($client, json_encode($data)."\n");
// 读取推送结果
echo fread($client, 8192);

