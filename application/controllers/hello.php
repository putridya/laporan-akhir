<?php

class Hello extends CI_Controller {
    public function index (){
        $this->load->model('m_masjid'); // controller u/ memanggil model
        $data['penceramah']= $this->m_masjid->get_data();

        $this->load->view('view_penceramah', $data); //controller u/memanggil view
    }
}

?>