<?php
class Acara extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        if ($this->session->userdata('status') != "login") {

            redirect(base_url("auth"));
        }
    }
    public function index()
    {
        $data['title'] = 'Penceramah';
        $data['acara'] = $this->m_acara->tampil_data()->result(); // m_acara : nama model acara, tampil_data = u/mengambil data
        $data['penceramah'] = $this->m_penceramah->tampil_data()->result();

        $data['bilal'] = $this->m_bilal->tampil_data()->result();



        $this->load->view('template/header', $data); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('acara', $data);
        $this->load->view('template/footer');
    }




    public function kajian($kajian)
    {
        $data['title'] = 'Penceramah';
        $data['acara'] = $this->m_acara->tampil_kajian($kajian)->result(); // m_acara : nama model acara, tampil_data = u/mengambil data

        $data['penceramah'] = $this->m_penceramah->tampil_data()->result();

        $data['bilal'] = $this->m_bilal->tampil_data()->result();


        $this->load->view('template/header', $data); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('acara', $data);
        $this->load->view('template/footer');
    }
    public function jumatan($jumatan)
    {
        $data['title'] = 'Penceramah';
        $data['acara'] = $this->m_acara->tampil_jumatan($jumatan)->result(); // m_acara : nama model acara, tampil_data = u/mengambil data

        $data['penceramah'] = $this->m_penceramah->tampil_data()->result();

        $data['bilal'] = $this->m_bilal->tampil_data()->result();

        $this->load->view('template/header', $data); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('acara', $data);
        $this->load->view('template/footer');
    }
    public function haribesarislam($haribesarislam)
    {
        $data['acara'] = $this->m_acara->tampil_hbi($haribesarislam)->result(); // m_acara : nama model acara, tampil_data = u/mengambil data

        $data['penceramah'] = $this->m_penceramah->tampil_data()->result();
        // $data['penceramah'] = $this->m_penceramah->tampil_data()->result();

        $data['bilal'] = $this->m_bilal->tampil_data()->result();

        $this->load->view('template/header', $data); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('acara', $data);
        $this->load->view('template/footer');
    }
    public function status_acara()
    {
        $data['status_acara'] = $this->m_acara->status_acara()->result(); //nyeleksi semua data
        foreach ($data['status_acara'] as $acr) {
            $where = array(
                'ID_ACARA' =>  $acr->ID_ACARA

            );
            $data1 = array(
                'STATUS_ACARA' =>  "Sudah Terlaksana"
            );
            $this->m_acara->update_data($where, $data1, 'acara');
        }
    }
    public function tambah_aksi($method, $param)
    {
        $ID_PENCERAMAH = $this->input->post('ID_PENCERAMAH');
        $ID_BILAL = $this->input->post('ID_BILAL');
        $JENIS_ACARA = $this->input->post('JENIS_ACARA');
        $NAMA_ACARA = $this->input->post('NAMA_ACARA');
        $TEMA_ACARA = $this->input->post('TEMA_ACARA');
        $TGL_ACARA = $this->input->post('TGL_ACARA');


        $data = array(
            'ID_PENCERAMAH' => $ID_PENCERAMAH,
            'ID_BILAL' => $ID_BILAL,
            'JENIS_ACARA' =>  $JENIS_ACARA,
            'NAMA_ACARA' =>  $NAMA_ACARA,
            'TEMA_ACARA' =>  $TEMA_ACARA,
            'TGL_ACARA'  =>  $TGL_ACARA,
            'STATUS_ACARA'  =>  'Belum Dilaksanakan'

        );

        $this->m_acara->input_data($data, 'acara');
        // redirect('acara/index');
        redirect('acara/' . $method . '/' . $param . '?jenis=' . $param);
    }
    public function hapus($ID_ACARA, $method, $param)
    {
        $where = array('ID_ACARA' => $ID_ACARA);

        $this->m_acara->hapus_data($where, 'acara');
        redirect('acara/' . $method . '/' . $param . '?jenis=' . $param);
    }
    public function edit($ID_ACARA)
    {
        $where = array('ID_ACARA' => $ID_ACARA); //id yg ada di tabel acara dijadikan array

        //membuat function yg digunakan dimodal
        $data['acara'] = $this->m_acara->edit_data($where, 'acara')->result(); //m_acara = nama modalnya, masukkan nma function edit_data

        $data['penceramah'] = $this->m_penceramah->tampil_data()->result();

        $data['bilal'] = $this->m_bilal->tampil_data()->result();

        $this->load->view('template/header'); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('edit_acara', $data);
        $this->load->view('template/footer');
    }
    public function update()
    {
        $JENIS_ACARA = $this->input->post('JENIS_ACARA');
        $NAMA_ACARA = $this->input->post('NAMA_ACARA');
        $TEMA_ACARA = $this->input->post('TEMA_ACARA');
        $TGL_ACARA = $this->input->post('TGL_ACARA');
        $ID_PENCERAMAH = $this->input->post('ID_PENCERAMAH');
        $ID_BILAL = $this->input->post('ID_BILAL');
        $ID_ACARA = $this->input->post('ID_ACARA');

        $data = array(
            'JENIS_ACARA' =>  $JENIS_ACARA,
            'NAMA_ACARA' =>  $NAMA_ACARA,
            'TEMA_ACARA' =>  $TEMA_ACARA,
            'TGL_ACARA'  =>  $TGL_ACARA,
            'ID_PENCERAMAH' => $ID_PENCERAMAH,
            'ID_BILAL' => $ID_BILAL

        );

        $where = array('ID_ACARA' => $ID_ACARA);
        $this->m_acara->update_data($where, $data, 'acara');

        $method = strtolower($JENIS_ACARA);

        if ($JENIS_ACARA == 'Hari Besar Islam') {
            $method = 'haribesarislam';
            $JENIS_ACARA = 'Hari%20Besar%20Islam';
        }

        // redirect('acara/index');
        redirect('acara/' . $method . '/' . $JENIS_ACARA . '?jenis=' . $JENIS_ACARA);
    }
}
