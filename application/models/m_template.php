<?php
class M_template extends CI_Model
{
    public function tampil_data()
    {
        // return $this->db->get('BILAL');

        $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->join('template_pesan', 'acara.ID_ACARA = template_pesan.ID_ACARA'); //join untuk menggabungkan tabel
        // $this->db->join('admin', 'admin.ID_ADMIN = acara.ID_ADMIN'); //join untuk menggabungkan tabel
        $query = $this->db->get();
        return $query;
    }

    public function tampil_id_acara($jenis_acara, $nama_acara)
    {
        // return $this->db->get('BILAL');

        $this->db->select('ID_ACARA'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->where('JENIS_ACARA', $jenis_acara); //join untuk menggabungkan tabel
        $this->db->where('NAMA_ACARA', $nama_acara); //join untuk menggabungkan tabel
        // $this->db->join('admin', 'admin.ID_ADMIN = acara.ID_ADMIN'); //join untuk menggabungkan tabel
        $query = $this->db->get();
        return $query;
    }


    public function tampil_jenis()
    {
        // return $this->db->get('BILAL');

        $this->db->select('JENIS_ACARA'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->distinct();  //tidak ada data redundan
        $query = $this->db->get();
        return $query;
    }

    public function tampil_acara()
    {
        // return $this->db->get('BILAL');

        $this->db->select('JENIS_ACARA,NAMA_ACARA'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->distinct();
        $query = $this->db->get();
        return $query;
    }

    public function where_acara($name)
    {
        $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->where($name);
        return $query = $this->db->get();
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
