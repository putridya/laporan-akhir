<?php
    class M_bilal extends CI_Model{
        public function tampil_data(){
            return $this->db->get('BILAL');

            // $this->db->select('*'); //untuk menampilkan semua data kedua tabel
            // $this->db->from('acara');
            // $this->db->join('bilal', 'bilal.ID_BILAL = acara.ID_BILAL'); //join untuk menggabungkan tabel
            // $query = $this->db->get();
            // return $query;
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
?>