<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ModelTransaksi extends Model
{
    public function get_all()       
    {
        return $this->db->table('transaksi')
			->orderBy('transaksi.id', 'ASC')
            ->join('detail_transaksi','detail_transaksi.transaksi_id=transaksi.id')
            ->join('obat','obat.kode=detail_transaksi.kode_obat')
            ->join('admin','admin.id=transaksi.admin_id')
			->get()
			->getResultArray();
    }

    public function get_obat($transaksi_id)
    {
        $this->db->select('b.kode, b.nama_obat, a.jumlah')
        ->from('detail_transaksi a')
        ->join('obat b', 'a.kode_obat = b.kode')
        ->where('transaksi_id', $transaksi_id);
        return $this->db->get();
    }

    public function create($data)
    {
        $this->db->insert('transaksi', $data);
        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function create_detail($data)
    {
        $this->db->insert_batch('detail_transaksi', $data);
        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function getByKode($kode)
    {
        return $this->db->get_where('transaksi', ['id' => $kode])->row();
    }

    // public function update($data, $kode)
    // {
    //     $this->db->update('transaksi', $data, ['id' => $kode]);
    //     return $this->db->affected_rows() > 0 ? true : false;
    // }
    
    
}
