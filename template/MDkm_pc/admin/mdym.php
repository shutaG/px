<?php

//decode by nige112
echo "\t\t";
$loadstate = $mdym["load"]["state"];
$loadimg = $mdym["load"]["img"];
$loadurl = $mdym["load"]["url"];
$loadappurl = $mdym["load"]["appurl"];
$loadtime = $mdym["load"]["time"];
setcookie("load_state", strval($loadstate));
setcookie("load_img", strval($loadimg));
setcookie("load_url", strval($loadurl));
setcookie("appurl", strval($loadappurl));
setcookie("load_time", strval($loadtime));