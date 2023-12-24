<?php 
ob_start();
foreach (glob("../core/*.php") as $filename){
    require_once($filename);
}