<?php  if (!defined("BASEPATH")) exit("No direct script access allowed");

$route["default_controller"] = "page";
$route["home"] = "page";
$route["about"] = "page";
$route["us"] = "page";
$route["about/([a-zA-Z_-]+)"] = "page/$1";