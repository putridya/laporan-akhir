<?php
    class Kontak_user extends CI_Controller{
        
        public function index(){
            $data['bilal'] = $this->m_bilal->tampil_data()->
            result(); // m_bilal : nama model bilal, tampil_data = u/mengambil data

            $this->load->view('user/template_user/header_user'); //u/ngeload view dari folder template
            $this->load->view('user/template_user/nav_user'); //u/ngeload view dari folder template
            $this->load->view('user/kontak', $data);
            $this->load->view('user/template_user/footer_user'); //u/ngeload view dari folder template
        }
        
        public function tambah_aksi(){
            $NAMA_USER = $this->input->post('NAMA_USER');
            $EMAIL_USER = $this->input->post('EMAIL_USER');
            $KRITIK_SARAN_USER = $this->input->post('KRITIK_SARAN_USER');

            $data = array(
                'NAMA_USER' =>  $NAMA_USER,
                'EMAIL_USER' =>  $EMAIL_USER,
                'KRITIK_SARAN_USER' =>  $KRITIK_SARAN_USER
            );

            $this->m_user->input_data($data,'kontak');
            redirect('user/kontak_user');
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
