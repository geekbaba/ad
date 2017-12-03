var designWidth = 750;
var body = document.documentElement || document.body;
var clientWidth = body.clientWidth;
clientWidth = clientWidth > 750 ? 750 : clientWidth;
body.style.fontSize=clientWidth/designWidth*100+'px';