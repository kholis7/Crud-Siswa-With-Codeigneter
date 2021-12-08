<?php
if(!defined('BASEPATH'))exit('No direct Script access allowed');

class Model extends CI_MODEL{
    public function get_pelajar(){
        //$q = $this->db->query("SELECT * FROM tbl_pelajar");
        $q = $this->db->get("tbl_pelajar");
        return $q;
    }
}