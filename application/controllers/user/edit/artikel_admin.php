<?php
    class Artikel_admin extends CI_Controller{
        
        public function index(){
            $data['artikel'] = $this->m_user->tampil_data_artikel()->
            result(); // m_bilal : nama model bilal, tampil_data = u/mengambil data

            $this->load->view('template/header'); //u/ngeload view dari folder template
            $this->load->view('template/sidebar');
            $this->load->view('user/user_edit/artikel_admin', $data);
            $this->load->view('template/footer');
        }
        
        public function tambah_aksi(){
            $FOTO_ARTIKEL = $_FILES['FOTO_ARTIKEL'];
        
        if ($FOTO_ARTIKEL = '') {
            # code...
        } else {
            $config['upload_path'] = './upload/artikel';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('FOTO_ARTIKEL') ) {
                echo "Upload Gagal";
                die();
            } else {
                $FOTO_ARTIKEL = $this->upload->data('file_name');
                
            }
        }
        // $PAMFLET_ACARA = $this->input->post('PAMFLET_ACARA');
        // $VIDEO_ACARA = $this->input->post('VIDEO_ACARA');
        $JUDUL_ARTIKEL = $this->input->post('JUDUL_ARTIKEL');
        $ISI_ARTIKEL = $this->input->post('ISI_ARTIKEL');
        $TGL_ARTIKEL = $this->input->post('TGL_ARTIKEL');
        
        $data = array(
            'JUDUL_ARTIKEL' => $JUDUL_ARTIKEL,
            'ISI_ARTIKEL' => $ISI_ARTIKEL,
            'TGL_ARTIKEL' => $TGL_ARTIKEL,
            'FOTO_ARTIKEL' => $FOTO_ARTIKEL
            

        );
       

            $this->m_bilal->input_data($data,'artikel');
            redirect('user/edit/artikel_admin');
        }
        public function hapus($ID_ARTIKEL){
            $where = array('ID_ARTIKEL' => $ID_ARTIKEL );

            $this->m_user->hapus_data($where,'artikel');
            redirect('user/edit/artikel_admin');
        }
        public function edit($ID_ARTIKEL){
            $where = array('ID_ARTIKEL' => $ID_ARTIKEL );//id yg ada di tabel bilal dijadikan array

            //membuat function yg digunakan dimodal
            $data['artikel'] = $this->m_user->edit_data($where,'artikel')->
            result(); //m_bilal = nama modalnya, masukkan nma function edit_data
            
            $this->load->view('template/header'); //u/ngeload view dari folder template
            $this->load->view('template/sidebar');
            $this->load->view('user/user_edit/artikel_edit', $data);
            $this->load->view('template/footer');
        }
        public function update(){
            $ID_ARTIKEL = $this->input->post('ID_ARTIKEL');
            $JUDUL_ARTIKEL = $this->input->post('JUDUL_ARTIKEL');
            $ISI_ARTIKEL = $this->input->post('ISI_ARTIKEL');
            $TGL_ARTIKEL = $this->input->post('TGL_ARTIKEL');

            $FOTO_ARTIKEL = $_FILES['FOTO_ARTIKEL'];
        
        if ($FOTO_ARTIKEL == '') {
            
            
        } else {
            $config['upload_path'] = './upload/artikel';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('FOTO_ARTIKEL') ) {
                $data = array(
                    'JUDUL_ARTIKEL' =>  $JUDUL_ARTIKEL,
                    'ISI_ARTIKEL' =>  $ISI_ARTIKEL,
                    'TGL_ARTIKEL' =>  $TGL_ARTIKEL
                );
            } else {
                $FOTO_ARTIKEL = $this->upload->data('file_name');
                $data = array(
                    'JUDUL_ARTIKEL' =>  $JUDUL_ARTIKEL,
                    'ISI_ARTIKEL' =>  $ISI_ARTIKEL,
                    'TGL_ARTIKEL' =>  $TGL_ARTIKEL,
                    'FOTO_ARTIKEL' => $FOTO_ARTIKEL
                );
                
            }
        }

            
            $where = array('ID_ARTIKEL' => $ID_ARTIKEL );
            $this->m_user->update_data($where,$data,'artikel');
            redirect('user/edit/artikel_admin');
        }
    }
