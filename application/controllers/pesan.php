<?php
class Pesan extends CI_Controller
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
        $data['template_pesan'] = $this->m_template->tampil_data()->result();

        $this->load->view('template/header', $data); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('template_pesan', $data);
        $this->load->view('template/footer');
    }

    public function tambah_aksi()
    {
        $ID_TEMPLATE = $this->input->post('ID_TEMPLATE');
        $ISI_PESAN = $this->input->post('ISI_PESAN');


        $data = array(
            'ID_TEMPLATE' => $ID_TEMPLATE,
            'ISI_PESAN' => $ISI_PESAN,
        );

        $this->m_template->input_data($data, 'template_pesan');
        redirect('template_pesan/index');
    }
    public function hapus($ID_TEMPLATE)
    {
        $where = array('ID_TEMPLATE' => $ID_TEMPLATE);

        $this->m_template->hapus_data($where, 'template_pesan');
        redirect('template_pesan/index');
    }
    public function edit($ID_TEMPLATE)
    {
        $where = array('ID_TEMPLATE' => $ID_TEMPLATE); //id yg ada di tabel acara dijadikan array

        //membuat function yg digunakan dimodal
        $data['template_pesan'] = $this->m_template->edit_data($where, 'template_pesan')->result(); //m_acara = nama modalnya, masukkan nma function edit_data

        $this->load->view('template/header'); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('edit_acara', $data);
        $this->load->view('template/footer');
    }
    public function update()
    {
        $JENIS_ACARA = $this->input->post('JENIS_ACARA');
        $NAMA_ACARA = $this->input->post('NAMA_ACARA');
        $ID_TEMPLATE = $this->input->post('ID_TEMPLATE');
        $ISI_PESAN = $this->input->post('ISI_PESAN');

        $data = array(
            'JENIS_ACARA' =>  $JENIS_ACARA,
            'NAMA_ACARA' =>  $NAMA_ACARA,
            'ID_TEMPLATE' => $ID_TEMPLATE,
            'ISI_PESAN' => $ISI_PESAN
        );
        $where = array('ID_TEMPLATE' => $ID_TEMPLATE);
        $this->m_template->update_data($where, $data, 'template_pesan');
        redirect('template_pesan/index');
    }
}
