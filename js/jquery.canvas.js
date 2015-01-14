var canvas1 = document.getElementById('slideCanvas1');

var context1 = canvas1.getContext('2d');
context1.rect(0, 0, canvas1.width, canvas1.height);

var grd1 = context1.createRadialGradient(110, 250, 80, 160, 200, 180);
grd1.addColorStop(0, '#ffa280');
grd1.addColorStop(1, '#e26434');

context1.fillStyle = grd1;
context1.fill();