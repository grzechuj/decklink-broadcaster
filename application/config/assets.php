<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config["assets_folder"] = "assets";
$config["assets_path"] = FCPATH.APPPATH.$config["assets_folder"];
$config["assets_controller"] = "asset";
// set asset types and folders
$config["asset_types"] = array(
                                "css"        =>    "css",
                                "jpg"        =>    "images",
                                "png"        =>    "images",
                                "gif"        =>    "images",
                                "ico"        =>    "images",
                                "js"        =>    "js",
                                );
?>