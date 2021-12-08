<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        if($this->session->userdata('login')==TRUE)
        redirect ('Niomic');
        else
        $this->load->view('login');
	}
    public function cobalogin(){
        if($this->input->method(TRUE)=='POST' && !empty($_POST)){
            $in['username'] = $this->input->post('username');
            $in['password'] = $this->input->post('password');
            $this->Auth_Model->cek($in);
        }
    }
}
