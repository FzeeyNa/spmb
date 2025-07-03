<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class formulirModel extends Model
{
    protected $table      = 'pembayaran';
    protected $primaryKey = 'idPembayaran';
    protected $allowedFields = [
        'idPembayaran', 'noFormulir', 'jnsPembayaran', 'tglPembayaran', 'totalPembayaran', 'gmbBuktiBayar',
        'status', 'idPendaftar', 'created_at', 'update_at', 'kwitansi', 'invoice_id', 'invoice_payment_status', 'invoice_payment_date'
    ];

    public function blmVerif()
    {
        $builder = $this->db->table('pembayaran');
        $builder->like('status', 'pending');
        $builder->like('jnsPembayaran', 'formulir');
        $query = $builder->countAllResults();
        return $query;
    }

    public function sdhVerifSMA()
    {
        $builder = $this->db->table('pembayaran');
        $builder->like('status', 'sudah formulir');
        $builder->like('jnsPembayaran', 'formulir');
        $builder->like('noFormulir', 'SMA%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function sdhVerifSMK()
    {
        $builder = $this->db->table('pembayaran');
        $builder->like('status', 'sudah formulir');
        $builder->like('jnsPembayaran', 'formulir');
        $builder->like('noFormulir', 'SMK%');
        $query = $builder->countAllResults();
        return $query;
    }


    public function formulirData()
    {
        $query = $this->db->query("SELECT p.idPembayaran,p.kwitansi, p.noFormulir, p.tglPembayaran, p.status,p.gbrBuktiBayar, p.totalPembayaran,p.invoice_payment_status, p.invoice_payment_date, p.invoice_id, f.sekolah, f.asalSekolah,f.idPendaftar,f.nmPendaftar, j.kdJurusan,f.hpOrtu,f.hp,f.tglLahir, f.tempatLahir,f.agama, f.email, f.created_at as tglDaftar, p.verifikator, p.created_at as tglKonfirmasi, p.updated_at as tglVerifikasi, f.alamat, f.hpOrtu FROM pembayaran p INNER JOIN pendaftaran f on p.idPendaftar = f.idPendaftar INNER JOIN jurusan j on f.kdJurusan=j.kdJurusan WHERE sekolah ='SMA' or sekolah ='SMK' and jnsPembayaran='formulir' order by p.created_at desc")->getResultArray();
        return $query;
    }

    public function getDataByStudentId($id)
    {
        $query = $this->db->query("SELECT p.idPembayaran,p.kwitansi, p.noFormulir, p.tglPembayaran, p.status,p.gbrBuktiBayar, p.totalPembayaran, p.invoice_payment_status, p.invoice_payment_date, p.invoice_id, f.sekolah, f.asalSekolah,f.idPendaftar,f.nmPendaftar, j.kdJurusan,f.hpOrtu,f.hp,f.tglLahir, f.tempatLahir,f.agama, f.email, f.created_at as tglDaftar, p.verifikator, p.created_at as tglKonfirmasi, p.updated_at as tglVerifikasi, f.alamat, f.hpOrtu FROM pembayaran p INNER JOIN pendaftaran f on p.idPendaftar = f.idPendaftar INNER JOIN jurusan j on f.kdJurusan=j.kdJurusan WHERE (sekolah ='SMA' or sekolah ='SMK') and jnsPembayaran='formulir' and p.idPendaftar = '{$id}' order by p.created_at desc")->getRowArray();
        return $query;
    }

    public function getDataById($id)
    {
        $query = $this->db->query("SELECT p.idPembayaran,p.kwitansi, p.noFormulir, p.tglPembayaran, p.status,p.gbrBuktiBayar, p.totalPembayaran, p.invoice_payment_status, p.invoice_payment_date, p.invoice_id, f.sekolah, f.asalSekolah,f.idPendaftar,f.nmPendaftar, j.kdJurusan,f.hpOrtu,f.hp,f.tglLahir, f.tempatLahir,f.agama, f.email, f.created_at as tglDaftar, p.verifikator, p.created_at as tglKonfirmasi, p.updated_at as tglVerifikasi, f.alamat, f.hpOrtu FROM pembayaran p INNER JOIN pendaftaran f on p.idPendaftar = f.idPendaftar INNER JOIN jurusan j on f.kdJurusan=j.kdJurusan WHERE (sekolah ='SMA' or sekolah ='SMK') and jnsPembayaran='formulir' and p.idPembayaran = '{$id}' order by p.created_at desc")->getRowArray();
        return $query;
    }

    public function getDataByStudentInvoiceId($id)
    {
        $query = $this->db->query("SELECT p.idPembayaran,p.kwitansi, p.noFormulir, p.tglPembayaran, p.status,p.gbrBuktiBayar, p.totalPembayaran, p.invoice_payment_status, p.invoice_payment_date, p.invoice_id, f.sekolah, f.asalSekolah,f.idPendaftar,f.nmPendaftar, j.kdJurusan,f.hpOrtu,f.hp,f.tglLahir, f.tempatLahir,f.agama, f.email, f.created_at as tglDaftar, p.verifikator, p.created_at as tglKonfirmasi, p.updated_at as tglVerifikasi, f.alamat, f.hpOrtu FROM pembayaran p INNER JOIN pendaftaran f on p.idPendaftar = f.idPendaftar INNER JOIN jurusan j on f.kdJurusan=j.kdJurusan WHERE (sekolah ='SMA' or sekolah ='SMK') and jnsPembayaran='formulir' and p.invoice_id = '{$id}' order by p.created_at desc")->getRowArray();
        return $query;
    }

    public function saveKonfirmasi($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getKonfirmasi($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['idPembayaran' => $id]);
        }
    }

    public function updateKonfirmasi($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idPembayaran' => $id));
        return $query;
    }

    public function callbackPayment($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('invoice_id' => $id));
        return $query;
    }

    public function idOtomatis()
    {
        $query = $this->db->query("SELECT MAX(idPembayaran) as idTerbesar from pembayaran");
        $hasil = $query->getRow();
        return $hasil->idTerbesar;
    }
    public function editDataFormulir($data, $data2, $idPembayaran, $idPendaftar)
    {
        $builder = $this->db->table('pendaftaran');
        $builder->where('idPendaftar', $idPendaftar);
        $builder->update($data);
        $builder2 = $this->db->table('pembayaran');
        $builder2->where('idPembayaran', $idPembayaran);
        $builder2->update($data2);
        return $builder2 && $builder;
    }

    public function belumDaftarUlang()
    {
        return $this->db->query("select f.hp,f.noFormulir, f.idPendaftar, f.nmPendaftar, f.asalSekolah,f.sekolah, f.kdJurusan, f.hpOrtu, f.created_at, f.status from pembayaran p inner join pendaftaran f on p.idPendaftar = f.idPendaftar WHERE not EXISTS (SELECT idPendaftar FROM daftarulang d WHERE p.idPendaftar = d.idPendaftar)")->getResultArray();
    }
}
