<?php
    class Profile_edit extends CI_Controller{
        
        public function tampil_profile(){
            $data['profile'] = $this->m_user->tampil_data_profile()->
            result(); 

            $this->load->view('template/header'); //u/ngeload view dari folder template
            $this->load->view('template/sidebar');
            $this->load->view('user/user_edit/profile_edit', $data);
            $this->load->view('template/footer');
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
            $ID_PROFILE = $this->input->post('ID_PROFILE');
            $TENTANG_KAMI = $this->input->post('TENTANG_KAMI');
            $VISI = $this->input->post('VISI');
            $MISI = $this->input->post('MISI');

            $data = array(
                'TENTANG_KAMI' =>  $TENTANG_KAMI,
                'VISI' =>  $VISI,
                'MISI' =>  $MISI
            );
            $where = array('ID_PROFILE' => $ID_PROFILE );
            $this->m_user->update_data($where,$data,'profile');
            redirect('user/edit/profile_admin/tampil_profile');
        }
    }
