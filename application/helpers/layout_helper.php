<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Set a layout template and variables
 * @param string $view the view to be rendered
 * @param array $
 */
function set_layout($view, $data = array(), $return = FALSE){
    $D = $data;
    $CI =& get_instance();
    
    //Load General CSS
    $CI->assets->load("bootstrap-cyborg.css");
    $CI->assets->load("bootstrap-responsive.css");
    $CI->assets->load("charisma-app.css");
    $CI->assets->load("jquery-ui-1.8.21.custom.css");
    $CI->assets->load("fullcalendar.css");
    $CI->assets->load("fullcalendar.print.css");
    $CI->assets->load("chosen.css");
    $CI->assets->load("uniform.default.css");
    $CI->assets->load("colorbox.css");
    $CI->assets->load("jquery.cleditor.css");
    $CI->assets->load("jquery.noty.css");
    $CI->assets->load("noty_theme_default.css");
    $CI->assets->load("elfinder.min.css");
    $CI->assets->load("elfinder.theme.css");
    $CI->assets->load("jquery.iphone.toggle.css");
    $CI->assets->load("opa-icons.css");
    $CI->assets->load("uploadify.css");
    
    //Load General Javascript
    $CI->assets->load("jquery-1.7.2.min.js");
    $CI->assets->load("jquery-ui-1.8.21.custom.min.js");
    $CI->assets->load("bootstrap-transition.js");
    $CI->assets->load("bootstrap-alert.js");
    $CI->assets->load("bootstrap-modal.js");
    $CI->assets->load("bootstrap-dropdown.js");
    $CI->assets->load("bootstrap-scrollspy.js");
    $CI->assets->load("bootstrap-tab.js");
    $CI->assets->load("bootstrap-tooltip.js");
    $CI->assets->load("bootstrap-popover.js");
    $CI->assets->load("bootstrap-button.js");
    $CI->assets->load("bootstrap-collapse.js");
    $CI->assets->load("bootstrap-carousel.js");
    $CI->assets->load("bootstrap-typeahead.js");
    $CI->assets->load("bootstrap-tour.js");
    $CI->assets->load("jquery.cookie.js");
    $CI->assets->load("fullcalendar.min.js");
    $CI->assets->load("jquery.dataTables.min.js");
    $CI->assets->load("excanvas.js");
    $CI->assets->load("jquery.flot.min.js");
    $CI->assets->load("jquery.flot.pie.min.js");
    $CI->assets->load("jquery.flot.stack.js");
    $CI->assets->load("jquery.flot.resize.min.js");
    $CI->assets->load("jquery.chosen.min.js");
    $CI->assets->load("jquery.uniform.min.js");
    $CI->assets->load("jquery.colorbox.min.js");
    $CI->assets->load("jquery.cleditor.min.js");
    $CI->assets->load("jquery.noty.js");
    $CI->assets->load("jquery.elfinder.min.js");
    $CI->assets->load("jquery.raty.min.js");
    $CI->assets->load("jquery.iphone.toggle.js");
    $CI->assets->load("jquery.autogrow-textarea.js");
    $CI->assets->load("jquery.uploadify-3.1.min.js");
    $CI->assets->load("jquery.history.js");
    $CI->assets->load("charisma.js");

    //Set Variables
    $D['leftmenu'] = $CI->load->view('elements/leftmenu', $D, TRUE);
    
    //Render
    $render = $CI->load->view('elements/header', $D, $return);
    $render .= $CI->load->view('elements/topbar', $D, $return);
    $render .= $CI->load->view($view, $D, $return);
    $render .= $CI->load->view('elements/footer', $D, $return);
    
    if($return) return $render;
}
?>
