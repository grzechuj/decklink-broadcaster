<?php

class Setting extends CI_Model {
    var $table = "config";
    
    function get_setting($key){
        $query = $this->db->get_where($this->table, array('key' => $key));
        return $query->result();
    }
    function get_settings()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    function set_setting($key, $value)
    {
        if($this->get_setting($key)){
            $this->db->update($this->table, array('value'=>$value), array('key' => $key));

        } else {
            $this->db->insert($this->table, array('key' => $key, 'value' => $value));
            
        }
    }
}
?>
