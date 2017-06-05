//websocket接受消息

var uid = '100001';

ws = new WebSocket("ws://xx.xxx.xxx.xx:2345");

ws.onopen = function() {
    ws.send(uid);
};
ws.onmessage = function(e){
    var data = JSON.parse(e.data);
    alert(data.data);
};
