<?php
    class M_user extends CI_Model{
        public function tampil_data_profile(){
            return $this->db->get('profile');

            
        }
        public function tampil_data_artikel(){
            $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('artikel');
        $this->db->order_by('TGL_ARTIKEL','DESC');
            return $this->db->get();

            
        }
        public function tampil_data_deskripsi($ID_ARTIKEL){
            $this->db->select('*'); //untuk menampilkan semua data kedua tabel
            $this->db->from('artikel');
            $this->db->where('ID_ARTIKEL',$ID_ARTIKEL);
            return $this->db->get();

            
        }
        public function tampil_data_artikel_lainnya(){
            $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('artikel');
        $this->db->order_by('rand()');
        $this->db->limit(5); 
            return $this->db->get();

            
        }
        public function tampil_data_kontak(){
            return $this->db->get('kontak');

            
        }
        public function tampil_video(){
            $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->join('penceramah', 'penceramah.ID_PENCERAMAH = acara.ID_PENCERAMAH','left');
        $query = $this->db->get();
        return $query;

            
        }
        public function tampil_foto(){
            $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->join('foto', 'foto.ID_ACARA = acara.ID_ACARA');
        $this->db->join('penceramah', 'penceramah.ID_PENCERAMAH = acara.ID_PENCERAMAH');
        $query = $this->db->get();
        return $query;
        }
        public function tampil_jadwal_kegiatan(){
            $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->join('penceramah', 'penceramah.ID_PENCERAMAH = acara.ID_PENCERAMAH','left'); //join untuk menggabungkan tabel
        $this->db->join('bilal', 'bilal.ID_BILAL = acara.ID_BILAL','left'); //join untuk menggabungkan tabel
        $this->db->join('foto', 'foto.ID_ACARA = acara.ID_ACARA','left'); //join untuk menggabungkan tabel
        $this->db->order_by('TGL_ACARA','DESC'); //join untuk menggabungkan tabel
        
        $query = $this->db->get();
        return $query;
        }
    
        public function input_data($data,$table){
            $this->db->insert($table,$data);  
        }
        public function hapus_data($where,$table){
            $this->db->where($where);  
            $this->db->delete($table); 
        }
        public function edit_data($where,$table){
            return $this->db->get_where($table,$where);     
        }
        public function update_data($where,$data,$table){
            $this->db->where($where);  
            $this->db->update($table,$data); 
        }
        public function tampil_join(){
            $this->db->select('*');
            $this->db->from('bilal');
            $this->db->join('acara', 'bilal.ID_BILAL = acara.ID_BILAL');
            $query = $this->db->get();
        }
    }
