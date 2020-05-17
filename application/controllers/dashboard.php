<?php
class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['dashboard'] = $this->m_dashboard->tampil_data()->result(); // m_penceramah : nama model penceramah, tampil_data = u/mengambil data
        $data['thismonth'] = $this->m_dashboard->get_data_this_month()->result();
        $data['nextweek'] = $this->m_dashboard->get_data_next_week()->result();

        $this->load->view('template/header'); //u/ngeload view dari folder template
        $this->load->view('template/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
        $this->load->view('template/calendar', $data);
    }
}
