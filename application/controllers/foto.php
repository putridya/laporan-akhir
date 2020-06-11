<?php
class Foto extends CI_Controller
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
    { }
    public function kajian($kajian)
    {
        $data['title'] = 'Dokumentasi';
        $data['acara'] = $this->m_acara->tampil_kajian($kajian)->result(); // m_acara : nama model acara, tampil_data = u/mengambil data
        $data['tampil_jenis'] = $this->m_template->tampil_jenis()->result();
        $data['tampil_acara'] = $this->m_template->tampil_acara()->result();
        $data['foto'] = $this->m_foto->tampil_kajian($kajian)->result();

        // $data['bilal'] = $this->m_bilal->tampil_data()->result();

        $this->load->view('template/header', $data); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('foto', $data);
        $this->load->view('template/footer');
    }
    public function jumatan($jumatan)
    {
        $data['title'] = 'Dokumentasi';
        $data['acara'] = $this->m_acara->tampil_jumatan($jumatan)->result(); // m_acara : nama model acara, tampil_data = u/mengambil data
        $data['tampil_jenis'] = $this->m_template->tampil_jenis()->result();
        $data['tampil_acara'] = $this->m_template->tampil_acara()->result();
        $data['foto'] = $this->m_foto->tampil_jumatan($jumatan)->result();

        // $data['bilal'] = $this->m_bilal->tampil_data()->result();

        $this->load->view('template/header', $data); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('foto', $data);
        $this->load->view('template/footer');
    }
    public function haribesarislam($haribesarislam)
    {
        $data['acara'] = $this->m_acara->tampil_hbi($haribesarislam)->result(); // m_acara : nama model acara, tampil_data = u/mengambil data
        $data['tampil_jenis'] = $this->m_template->tampil_jenis()->result();
        $data['tampil_acara'] = $this->m_template->tampil_acara()->result();
        $data['foto'] = $this->m_foto->tampil_hbi($haribesarislam)->result();
        // $data['bilal'] = $this->m_bilal->tampil_data()->result();

        $this->load->view('template/header', $data); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('foto', $data);
        $this->load->view('template/footer');
    }

    public function tambah_aksi($method, $param)
    {
        // $ID_FOTO = $this->input->post('ID_FOTO');
        $FOTO = $_FILES['FOTO'];
        $PAMFLET_ACARA = $_FILES['PAMFLET_ACARA'];
        $VIDEO_ACARA = $this->input->post('VIDEO_ACARA');
        if ($FOTO = ''  ) {
            # code...
        } else {
            $config['upload_path'] = './upload/foto/';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('FOTO') ) {
                echo "Upload Gagal";
                die();
            } else {
                $FOTO = $this->upload->data('file_name');
                // $VIDEO_ACARA = $this->upload->data('file_name');
            }
        }
        if ( $PAMFLET_ACARA = '' ) {
            # code...
        } else {
            $config['upload_path'] = './upload/foto/';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('PAMFLET_ACARA')) {
                echo "Upload Gagal";
                die();
            } else {
                $PAMFLET_ACARA = $this->upload->data('file_name');
                // $VIDEO_ACARA = $this->upload->data('file_name');
            }
        }
        // $PAMFLET_ACARA = $this->input->post('PAMFLET_ACARA');
        // $VIDEO_ACARA = $this->input->post('VIDEO_ACARA');
        $JENIS_ACARA = $this->input->post('JENIS_ACARA');
        $NAMA_ACARA = $this->input->post('NAMA_ACARA');
        $split_jenis = explode("_", $JENIS_ACARA);   //split value 0_kajian_3 di controller

        $postdata = $this->m_template->tampil_id_acara($split_jenis[1], $NAMA_ACARA)
            ->row_array(); //digunakan untuk memanggil fungsi lalu di ambil baris arraynya
        $data = array(
            // 'ID_FOTO' => $ID_FOTO,
            'FOTO' => $FOTO,
            'ID_ACARA' => $postdata['ID_ACARA']
            // 'PAMFLET_ACARA' =>  $PAMFLET_ACARA,
            // 'VIDEO_ACARA'  =>  $VIDEO_ACARA

        );
        $data_update = array(
            // 'ID_FOTO' => $ID_FOTO,
            // // 'FOTO' => $FOTO,
            // // 'ID_ACARA' => $postdata['ID_ACARA']
            'PAMFLET_ACARA' =>  $PAMFLET_ACARA,
            'VIDEO_ACARA'  =>  $VIDEO_ACARA

        );
        $data_id_acara = array(
            'ID_ACARA' => $postdata['ID_ACARA']
        );


        $this->m_foto->update_data($data_id_acara, $data_update, 'acara');
        $this->m_foto->input_data($data, 'foto');
        redirect('foto/' . $method . '/' . $param . '?jenis=' . $param);
    }
    public function hapus($ID_FOTO,$method,$param)
    {
        $where = array('ID_FOTO' => $ID_FOTO);

        $this->m_foto->hapus_data($where, 'foto');

        

        redirect('foto/' . $method . '/' . $param . '?jenis=' . $param);
    
    }
    public function edit($ID_FOTO)
    {
        // $where = array('ID_FOTO' => $ID_FOTO); //id yg ada di tabel acara dijadikan array
        $data['acara'] = $this->m_acara->tampil_data()->result(); // m_acara : nama model acara, tampil_data = u/mengambil data

        //membuat function yg digunakan dimodal
        $data['foto'] = $this->m_foto->edit_data($ID_FOTO, 'foto')->result(); //m_foto = nama modalnya, masukkan nma function edit_data

        $this->load->view('template/header'); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('edit_foto', $data);
        $this->load->view('template/footer');
    }
    public function update()
    {
        $ID_FOTO = $this->input->post('ID_FOTO');
        $ID_ACARA = $this->input->post('ID_ACARA');
        $JENIS_ACARA = $this->input->post('JENIS_ACARA');
        $NAMA_ACARA = $this->input->post('NAMA_ACARA');
        $FOTO = $_FILES['FOTO'];
        $PAMFLET_ACARA = $_FILES['PAMFLET_ACARA'];
        $VIDEO_ACARA = $this->input->post('VIDEO_ACARA');

        if ($FOTO == '') { } else {
            $config['upload_path'] = './upload/foto/';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('FOTO')) {
                $data1 = array(
                    'ID_ACARA' => $ID_ACARA
                    // 'JENIS_ACARA' =>  $JENIS_ACARA,
                    // 'NAMA_ACARA' =>  $NAMA_ACARA,
                    // 'VIDEO_ACARA'  =>  $VIDEO_ACARA

                );
            } else {
                $FOTO = $this->upload->data('file_name');
                $data1 = array(
                    
                    'FOTO' => $FOTO,
                    // 'PAMFLET_ACARA' =>  $PAMFLET_ACARA,
                );
            }
        }
        $where1 = array('ID_FOTO' => $ID_FOTO);
        $this->m_foto->update_data($where1, $data1, 'foto');


        // ----------------------------------
        if ($PAMFLET_ACARA == '') { } else {
            $config['upload_path'] = './upload/foto/';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('PAMFLET_ACARA')) {
                $data2 = array(
                    'JENIS_ACARA' =>  $JENIS_ACARA,
                    'NAMA_ACARA' =>  $NAMA_ACARA,
                    'VIDEO_ACARA'  =>  $VIDEO_ACARA

                );
            } else {
                $PAMFLET_ACARA = $this->upload->data('file_name');
                $data2 = array(
                    'JENIS_ACARA' =>  $JENIS_ACARA,
                    'NAMA_ACARA' =>  $NAMA_ACARA,
                    // 'FOTO' => $FOTO,
                    'PAMFLET_ACARA' =>  $PAMFLET_ACARA,
                    'VIDEO_ACARA'  =>  $VIDEO_ACARA
                );
            }
        }
        $where2 = array('ID_ACARA' => $ID_ACARA);
        $this->m_acara->update_data($where2, $data2, 'acara');
        // $data = array(
        //     'ID_FOTO' => $ID_FOTO,
        //     'JENIS_ACARA' =>  $JENIS_ACARA,
        //     'NAMA_ACARA' =>  $NAMA_ACARA,
        //     'FOTO' => $FOTO,
        //     'PAMFLET_ACARA' =>  $PAMFLET_ACARA,
        //     'VIDEO_ACARA'  =>  $VIDEO_ACARA
        // );
        

        $method = strtolower($JENIS_ACARA);

        if ($JENIS_ACARA == 'Hari Besar Islam') {
            $method = 'haribesarislam';
            $JENIS_ACARA = 'Hari%20Besar%20Islam';
        }

        // redirect('acara/index');
        redirect('foto/' . $method . '/' . $JENIS_ACARA . '?jenis=' . $JENIS_ACARA);
    }
}
