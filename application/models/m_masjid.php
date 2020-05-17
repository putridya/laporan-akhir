<?php
    class M_masjid extends CI_Model {
        public function get_data(){
            return $this->db->get('penceramah')->result_array(); //mengembalikan nilai trus ditampilkan oleh fungsi get.

        }
    }
    
    
?>