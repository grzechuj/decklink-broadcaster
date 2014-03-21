<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Broadcast extends CI_Controller {
    function index(){
        $data['test']='teste123';
        set_layout('broadcast/index', $data);
    }
}
?>
