<?php
if(!defined('BASEPATH'))exit('No direct Script access allowed');

class Auth_Model extends CI_MODEL{
    public function cek($in){
        $username = $this->db->escape($in['username']);
        $password = $this->db->escape($in['password']);
        
        $q_login = $this->db->query("SELECT * FROM tbl_user WHERE username = $username AND password=$password ");
        if($q_login->num_rows() > 0){
            foreach($q_login->result() as $data){
                $session['id_user'] = $data->id_user;
                $session['nama_user'] = $data->nama_user;
                $session['username'] = $data->username;
                $session['login'] = TRUE;
                $this->session->set_userdata($session);
            }
        }
        if($session['login']== TRUE)
            redirect ('Niomic');
            else
            redirect ('Auth');    
    }
}