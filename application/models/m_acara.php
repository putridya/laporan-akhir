<?php
class M_acara extends CI_Model
{

    public function tampil_data()
    {
        $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->join('penceramah', 'acara.ID_PENCERAMAH = penceramah.ID_PENCERAMAH'); //join untuk menggabungkan tabel
        // $this->db->join('admin', 'admin.ID_ADMIN = acara.ID_ADMIN'); //join untuk menggabungkan tabel
        $this->db->join('bilal', 'bilal.ID_BILAL = acara.ID_BILAL'); //join untuk menggabungkan tabel
        // $this->db->join('template_pesan', 'template_pesan.ID_TEMPLATE = acara.ID_TEMPLATE'); //join untuk menggabungkan tabel
        $query = $this->db->get();
        return $query;
    }
    public function tampil_kajian($where)
    {
        $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->join('penceramah', 'acara.ID_PENCERAMAH = penceramah.ID_PENCERAMAH'); //join untuk menggabungkan tabel
        // $this->db->join('admin', 'admin.ID_ADMIN = acara.ID_ADMIN'); //join untuk menggabungkan tabel
        // $this->db->join('bilal', 'bilal.ID_BILAL = acara.ID_BILAL'); //join untuk menggabungkan tabel
        $this->db->where('JENIS_ACARA', $where);
        // $this->db->join('template_pesan', 'template_pesan.ID_TEMPLATE = acara.ID_TEMPLATE'); //join untuk menggabungkan tabel
        $query = $this->db->get();
        return $query;
    }

    public function tampil_dd($data)
    {
        // return $this->db->get('BILAL');

        // $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        // $this->db->from('acara');
        // $this->db->where('JENIS_ACARA', $data);
        // // $this->db->join('template_pesan', 'acara.ID_TEMPLATE = template_pesan.ID_TEMPLATE'); //join untuk menggabungkan tabel
        // // $this->db->join('admin', 'admin.ID_ADMIN = acara.ID_ADMIN'); //join untuk menggabungkan tabel
        // $query = $this->db->get();
        // return $query;

        $this->db->where('JENIS_ACARA', $data);
        // $this->db->order_by('city_name', 'ASC');
        $query = $this->db->get('acara');
        $output = '<option value="">Select City</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->NAMA_ACARA . '">' . $row->NAMA_ACARA . '</option>';
        }
        return $output;
    }

    public function tampil_jumatan($where)
    {
        $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->join('penceramah', 'acara.ID_PENCERAMAH = penceramah.ID_PENCERAMAH'); //join untuk menggabungkan tabel
        // $this->db->join('admin', 'admin.ID_ADMIN = acara.ID_ADMIN'); //join untuk menggabungkan tabel
        $this->db->join('bilal', 'bilal.ID_BILAL = acara.ID_BILAL'); //join untuk menggabungkan tabel
        $this->db->where('JENIS_ACARA', $where);
        // $this->db->join('template_pesan', 'template_pesan.ID_TEMPLATE = acara.ID_TEMPLATE'); //join untuk menggabungkan tabel
        $query = $this->db->get();
        return $query;
    }
    public function tampil_hbi($where)
    {
        $this->db->select('*'); //untuk menampilkan semua data kedua tabel
        $this->db->from('acara');
        $this->db->join('penceramah', 'acara.ID_PENCERAMAH = penceramah.ID_PENCERAMAH'); //join untuk menggabungkan tabel
        // $this->db->join('admin', 'admin.ID_ADMIN = acara.ID_ADMIN'); //join untuk menggabungkan tabel
        //  //join untuk menggabungkan tabel
        if ($where == 'Hari%20Besar%20Islam') {
            $where = 'Hari Besar Islam';
        }
        $this->db->where('JENIS_ACARA', $where);
        // $this->db->join('bilal', 'bilal.ID_BILAL = acara.ID_BILAL');
        // $this->db->join('template_pesan', 'template_pesan.ID_TEMPLATE = acara.ID_TEMPLATE'); //join untuk menggabungkan tabel
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
    //     public function tampil_join(){
    //         $this->db->select('*');
    //         $this->db->from('bilal');
    //         $this->db->join('acara', 'bilal.ID_BILAL = acara.ID_BILAL');
    //         $query = $this->db->get();
    //     }
}
