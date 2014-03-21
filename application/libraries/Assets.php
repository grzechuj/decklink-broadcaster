<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Assets {

    var $javascript = array();
    var $css = array();

    function Assets($config=array()){
        // Get CI instance
        $this->ci =& get_instance();
        if(!empty($config)){
            foreach($config as $k => $v){
                $this->$k = $v;
            }
        }else{
            show_error("Assets Config File is Missing or is Empty");
        }
    }

    function load($file,$params=array()){
        $type = strtolower(substr(strrchr($file, '.'), 1));
        if($type=="jpg" || $type=="png" || $type=="gif" || $type=="ico"){
            // Generate Image Link
            $image_link = site_url("$this->assets_controller/images")."/".$file;
            // Generate the Paramaters
            $image_params = $this->generate_params($params);
            // Create Image Tag
            $output = "<img src='$image_link' $image_params>";
            return $output;
        }elseif($type=="js"){
            if(array_key_exists("extra",$params) && $params["extra"] != ""){
                $this->javascript[] = "$type/$file/{$params["extra"]}";
            }else{
                $this->javascript[] = "$type/$file";
            }
        }elseif($type=="css"){
            $this->css[] = "$type/$file";
        }else{
            return false;
        }
    }

    function url($file){
        $type = strtolower(substr(strrchr($file, '.'), 1));
        if(array_key_exists($type,$this->asset_types)){
            foreach($this->asset_types as $asset_type => $folder){
                if($type == $asset_type){
                    $output = site_url("$this->assets_folder/$folder").$file;
                    return $output;
                    break;
                }
            }
        }else{
            show_error("$type is not a valid asset type");
        }
    }

    function generate_params($params){
        $output = '';
        if(!empty($params)){
            foreach($params as $k => $v){
                $output .= ' '.$k.'="'.$v.'"';
            }
        }
        return $output;
    }

    function display_header_assets(){
        $output = '';
        foreach($this->javascript as $file){
            $output .= "<script src='".  site_url($this->assets_controller)."/".str_replace(".js","",$file)."'></script>\n";
        }
        foreach($this->css as $file){
            $output .= "<link type='text/css' rel='stylesheet' href='".site_url($this->assets_controller)."/".str_replace(".css","",$file)."'/>\n";
        }
        return $output;
    }
}

?>