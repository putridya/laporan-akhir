<?php
class M_pesan extends CI_Model
{
    public function tampil_data()
    {
        // return $this->db->get('BILAL');

        $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->join('template_pesan', 'acara.ID_ACARA = template_pesan.ID_ACARA'); //join untuk menggabungkan tabel
        $this->db->join('penceramah', 'penceramah.ID_PENCERAMAH = acara.ID_PENCERAMAH'); //join untuk menggabungkan tabel
        // $this->db->join('admin', 'admin.ID_ADMIN = acara.ID_ADMIN'); //join untuk menggabungkan tabel
        $query = $this->db->get();
        return $query;
    }
    public function kirim()
    {
        // return $this->db->get('BILAL');
        $date_now = date('Y-m-d');
        $date_after2 = date('Y-m-d', strtotime('+2 days', strtotime($date_now))) . PHP_EOL;

        $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->join('template_pesan', 'acara.ID_ACARA = template_pesan.ID_ACARA'); //join untuk menggabungkan tabel
        $this->db->join('penceramah', 'penceramah.ID_PENCERAMAH = acara.ID_PENCERAMAH'); //join untuk menggabungkan tabel
        $this->db->where('TGL_ACARA', $date_after2);
        // $this->db->join('admin', 'admin.ID_ADMIN = acara.ID_ADMIN'); //join untuk menggabungkan tabel
        $query = $this->db->get();
        return $query;
    }

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
