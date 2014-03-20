<?php

class Wizard extends CI_Controller {

    function index($step=0)
    {
        $this->load->database();
        
        $this->load->model('setting');

        //Testing
        $this->setting->set_setting("YOUTUBE_DASHBOARD", "http://youtube.com");

        $data['settings'] = $this->setting->get_settings();
        $this->load->view("wizard-$step", $data);
    }
}
?>
