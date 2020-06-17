<?php
class Pesan extends CI_Controller
{
    // function __construct()
    // {
    //     parent::__construct();


    //     $this->load->helper(array('form', 'url'));

    //     if ($this->session->userdata('status') != "login") {

    //         redirect(base_url("auth"));
    //     }
    // }
    public function index()
    {
        $data['title'] = 'Penceramah';
        // $data['acara'] = $this->m_acara->tampil_data()->result(); // m_acara : nama model acara, tampil_data = u/mengambil data
        $data['pesan'] = $this->m_pesan->tampil_data()->result();
        $data['kirim'] = $this->m_pesan->kirim()->result();

        
        

        $this->load->view('template/header', $data); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('pesan', $data);
        $this->load->view('template/footer');
    }

    public function kirim(){
        $data['kirim'] = $this->m_pesan->kirim()->result();
        foreach ($data['kirim'] as $krm) {
            $where = array(
                'ID_TEMPLATE' =>  $krm->ID_TEMPLATE

            );

            $date = strtotime($krm->TGL_ACARA);
        $hari = date('D', $date);
        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }
        
        // template isi pesan
            if ($krm->STATUS != 'Terkirim') {
                        $isi_pesan = $krm->ISI_PESAN .
                    " Bapak " . $krm->NAMA_PENCERAMAH .
                    " Untuk mengikuti " . $krm->JENIS_ACARA .
                    " Acara " . $krm->NAMA_ACARA .
                    " dengan tema acara " .
                    "\n" . $krm->TEMA_ACARA .
                    "\nPada Tanggal " . date('d M', $date) . " Hari " . $hari_ini;

                
                // api untuk kirim pesan

                // $userkey = "3e3609800810";
                // $passkey = "ek2wh6teen";
                // $telepon = $krm->NO_TELP;
                // $message = $isi_pesan;
                // $url = "https://gsm.zenziva.net/api/sendsms/";
                // $curlHandle = curl_init();
                // curl_setopt($curlHandle, CURLOPT_URL, $url);
                // curl_setopt($curlHandle, CURLOPT_HEADER, 0);
                // curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
                // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
                // curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
                // curl_setopt($curlHandle, CURLOPT_POST, 1);
                // curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
                //     'userkey' => $userkey,
                //     'passkey' => $passkey,
                //     'nohp' => $telepon,
                //     'pesan' => $message
                // ));
                // $results = json_decode(curl_exec($curlHandle), true);
                // curl_close($curlHandle);
                $data1 = array(
                    'STATUS' =>  "Terkirim"

                );
            } else {
                $data1 = array(
                    'STATUS' =>  "Terkirim"

                );
            }
            $this->m_template->update_data($where, $data1, 'template_pesan');
        }
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

    public function kirim_pesan($ID_TEMPLATE)
    {
        $where = array('ID_TEMPLATE' => $ID_TEMPLATE);

        $getdata = $this->m_pesan->kirim($where)->row_array();
        $date = strtotime($getdata['TGL_ACARA']);
        $hari = date('D', $date);
        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }


        if (!empty($getdata)) {
            if ($getdata['STATUS'] != 'Terkirim') {
                $isi_pesan = $getdata['ISI_PESAN'] .
                    " Bapak " . $getdata['NAMA_PENCERAMAH'] .
                    " Untuk mengikuti " . $getdata['JENIS_ACARA'] .
                    " Acara " . $getdata['NAMA_ACARA'] .
                    " dengan tema acara " .
                    "\n" . $getdata['TEMA_ACARA'] .
                    "\nPada Tanggal " . date('d M', $date) . " Hari " . $hari_ini;

                // echo $isi_pesan;

                // $userkey = "3e3609800810";
                // $passkey = "ek2wh6teen";
                // $telepon = $getdata['NO_TELP'];
                // $message = $isi_pesan;
                // $url = "https://gsm.zenziva.net/api/sendsms/";
                // $curlHandle = curl_init();
                // curl_setopt($curlHandle, CURLOPT_URL, $url);
                // curl_setopt($curlHandle, CURLOPT_HEADER, 0);
                // curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
                // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
                // curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
                // curl_setopt($curlHandle, CURLOPT_POST, 1);
                // curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
                //     'userkey' => $userkey,
                //     'passkey' => $passkey,
                //     'nohp' => $telepon,
                //     'pesan' => $message
                // ));
                // $results = json_decode(curl_exec($curlHandle), true);
                // curl_close($curlHandle);
                // echo "<script type='text/javascript'>alert('$message');</script>";

                $data = array(
                    'STATUS' =>  "Terkirim"

                );
            } else {
                $data = array(
                    'STATUS' =>  "Terkirim"

                );
            }
        } else {
            $data = array(
                'STATUS' =>  "Belum Terkirim"

            );
        }
        $this->m_template->update_data($where, $data, 'template_pesan');
        redirect('pesan/index');
    }
}
