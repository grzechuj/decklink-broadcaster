<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asset extends CI_Controller {

    function index(){
        $this->load->config("assets");
        $asset_folder = $this->config->item("assets_path");
        $type = $this->uri->segment(2);
        
        //FIX-ME: Workaround change img to images
        if($type=="img") $type = "images";
        
        $files_path = "$asset_folder/$type/";
        $ext = ".$type";
        $file = $this->uri->segment(3);
        if($type == 'js'){
            Header("Content-type: text/javascript");
            $require = $files_path.$file.$ext;
        }elseif($type == 'css'){
            Header ("Content-type: text/css");
            $require = $files_path.$file.$ext;
        } else {
            $require = $files_path.$file;
        }
        readfile($require);
    }
}
?>
