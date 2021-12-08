<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Niomic extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->Model('Model');
    }

	public function index()
	{
        if($this->session->userdata('login')==TRUE){
            $data['judul'] = "BELAJAR DI NIOMIC ONLINE PRIVATE";
            $data['isi'] = "ISI BELAJAR DI NIOMIC ONLINE PRIVATE";
            $data ['pelajar'] = $this->Model->get_pelajar();
            $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
            $this->load->view('top', $data);
            $this->load->view('table');
            $this->load->view('Modal');
            $this->load->view('bottom');
        } else {
            redirect ('Auth');
        }
	}
    public function tambah_data(){
        $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
        $this->load->view('top', $data);
		$this->load->view('tambah_data');
		$this->load->view('bottom');
    }
    public function edit_data($nis=""){
        $data['pelajar'] = $this->db->get_where('tbl_pelajar',array('nis'=>$nis),1)->row();
        $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
        $this->load->view('top',$data);
		$this->load->view('edit_data');
		$this->load->view('bottom');
    }

    public function add(){
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama_siswa' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'jurusan' => $this->input->post('jurusan'),
            'email' => $this->input->post('email')
        );
        if($this->db->insert('tbl_pelajar',$data)){
            $this->session->set_flashdata("Success","Berhasil Menambahkan Data");
            echo "<script>window.location.href='".base_url()."Niomic"."';</script>";
        } else{
            $this->session->set_flashdata("Error","Gagal Menambahkan Data");
            echo "<script>window.location.href='".base_url()."Niomic"."';</script>";
        }
    }
    public function update(){
        $data = array(
            'nama_siswa' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'jurusan' => $this->input->post('jurusan'),
            'email' => $this->input->post('email')
        );

        $this->db->where('nis',$this->input->post('nis'));
        if($this->db->update('tbl_pelajar',$data)){
            $this->session->set_flashdata("Success","Berhasil Merubah Data Pelajar");
            echo "<script>window.location.href='".base_url()."Niomic"."';</script>";
        } else{
            $this->session->set_flashdata("Error","Gagal Merubah Data Pelajar");
            echo "<script>window.location.href='".base_url()."Niomic"."';</script>";
        }
    }
    public function delete ($nis){
        if($this->db->delete('tbl_pelajar', array('nis'=>$nis)))
        $this->session->set_flashdata("Success","Berhasil Menghapus Data Pelajar");
            echo "<script>window.location.href='".base_url()."Niomic"."';</script>";
    }
    public function ubah_profile(){
        $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
        
        $this->load->view('top', $data);
		$this->load->view('upload_photo');
		$this->load->view('bottom');
    }

    public function upload_berkas(){
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000000;
        $config['max_width'] = 4800;
        $config['max_height'] = 4800;
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('berkas')){
            sleep(4);
            $this->session->set_flashdata('Error','Gagal Upload Gambar, Silahkan Periksa File Anda');
            redirect('Niomic');
        } else {
            sleep (4);
            $string = $this->upload->data();
            $data = array(
                'photo' => $string['file_name']
            );
            $this->db->where('id_user',$this->session->userdata('id_user'));
            if($this->db->update('tbl_user',$data)){
                $this->session->set_flashdata('Success','Anda Berhasil Mengubah Photo');
            redirect('Niomic');
            }
        }

    }
}