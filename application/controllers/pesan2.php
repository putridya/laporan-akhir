<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan2 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url', 'html', 'form');
    }
    public function index()
    {
        $title = "Kirim Pesan Dengan SMS Getaway";
        $this->load->view('pesan/send', ['title' => $title]);
    }

    public function sendmsg()
    {
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) {
            $mobile = $this->input->post('mobile'); //iki
            $message = $this->input->post('message'); //iki
            $data = $this->input->post();
            unset($data['submit']);
            $msgencode = urlencode($message);
            $userkey = "3e3609800810"; //ininya yg bakal diganti
            $passkey = "ek2wh6teen";
            $router = "";

            $postdata = array(
                'authkey' => $userkey,
                'mobile' => $mobile,
                'message' => $msgencode,
                'router' => $router
            );
            $url = "https://gsm.zenziva.net/api/sendsms/";

            $ch  = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_POST => TRUE,
                CURLOPT_POSTFIELDS => $postdata
            ));

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            $output = curl_exec($ch);
            if (curl_errno($ch)) {
                echo "error" . curl_error($ch);
            }
            curl_close($ch);

            ?>
        <br>respon ID Mobile : <?php echo $output; ?> pesan sukses di kirim</br>
        <?php
        echo "<script>alert('pesan berhasil di kirim');</script>";
    } else {
        $this->index();
    }
}
}
