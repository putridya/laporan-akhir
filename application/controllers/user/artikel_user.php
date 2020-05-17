<?php
    class Artikel_user extends CI_Controller{
        
        public function index(){
            $data['artikel'] = $this->m_user->tampil_data_artikel()->
            result(); 
            $data['artikelLainnya'] = $this->m_user->tampil_data_artikel_lainnya()->
            result(); 

            $this->load->view('user/template_user/header_user'); //u/ngeload view dari folder template
            $this->load->view('user/template_user/nav_user'); //u/ngeload view dari folder template
            $this->load->view('user/artikel', $data);
            $this->load->view('user/template_user/footer_user'); //u/ngeload view dari folder template
        }
        public function deskripsi($ID_ARTIKEL){
            $data['artikel'] = $this->m_user->tampil_data_artikel()->
            result(); 
            $data['deskripsi'] = $this->m_user->tampil_data_deskripsi($ID_ARTIKEL)->
            result(); 

            $this->load->view('user/template_user/header_user'); //u/ngeload view dari folder template
            $this->load->view('user/template_user/nav_user'); //u/ngeload view dari folder template
            $this->load->view('user/deskripsi_artikel', $data);
            $this->load->view('user/template_user/footer_user'); //u/ngeload view dari folder template
        }
        
        public function tambah_aksi(){
            $nama_bilal = $this->input->post('nama_bilal');
            $no_telp_bilal = $this->input->post('no_telp_bilal');
            $alamat_bilal = $this->input->post('alamat_bilal');

            $data = array(
                'nama_bilal' =>  $nama_bilal,
                'no_telp_bilal' =>  $no_telp_bilal,
                'alamat_bilal' =>  $alamat_bilal
            );

            $this->m_bilal->input_data($data,'bilal');
            redirect('bilal/index');
        }
        public function hapus($id_bilal){
            $where = array('ID_bilal' => $id_bilal );

            $this->m_bilal->hapus_data($where,'bilal');
            redirect('bilal/index');
        }
        public function edit($id_bilal){
            $where = array('ID_bilal' => $id_bilal );//id yg ada di tabel bilal dijadikan array

            //membuat function yg digunakan dimodal
            $data['bilal'] = $this->m_bilal->edit_data($where,'bilal')->
            result(); //m_bilal = nama modalnya, masukkan nma function edit_data
            
            $this->load->view('template/header'); //u/ngeload view dari folder template
            $this->load->view('template/sidebar');
            $this->load->view('edit_bilal', $data);
            $this->load->view('template/footer');
        }
        public function update(){
            $id_bilal = $this->input->post('id_bilal');
            $nama_bilal = $this->input->post('nama_bilal');
            $no_telp_bilal = $this->input->post('no_telp_bilal');
            $alamat_bilal = $this->input->post('alamat_bilal');

            $data = array(
                'nama_bilal' =>  $nama_bilal,
                'no_telp_bilal' =>  $no_telp_bilal,
                'alamat_bilal' =>  $alamat_bilal
            );
            $where = array('ID_bilal' => $id_bilal );
            $this->m_bilal->update_data($where,$data,'bilal');
            redirect('bilal/index');
        }
    }
