<?php
class Scheduler extends CI_Controller
{
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
    public function kirim()
    {
        //nama variable array
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
}
