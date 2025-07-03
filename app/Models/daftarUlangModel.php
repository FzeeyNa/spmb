<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class daftarulangModel extends Model
{
    protected $table      = 'daftarulang';
    protected $primaryKey = 'idPembayaran';
    protected $allowedFields = [
        'idPembayaran', 'noFormulir', 'jnsPembayaran', 'tglPembayaran', 'totalPembayaran', 'gmbBuktiBayar',
        'status', 'idPendaftar',
        'created_at', 'update_at', 'verifikator', 'kwitansi', 'invoice_id', 'invoice_payment_status', 'invoice_payment_date'
    ];

    public function blmVerif()
    {
        $builder = $this->db->table('daftarulang');
        $builder->like('status', 'pending');
        $query = $builder->countAllResults();
        return $query;
    }

    public function sdhVerifSMK()
    {
        $builder = $this->db->table('daftarulang');
        $builder->like('status', 'lunas');
        $builder->like('noFormulir', 'SMK%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function sdhVerifSMKcicil()
    {
        $builder = $this->db->table('daftarulang');
        $builder->like('status', 'cicil');
        $builder->like('noFormulir', 'SMK%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function sdhVerifSMA()
    {
        $builder = $this->db->table('daftarulang');
        $builder->like('status', 'lunas');
        $builder->like('noFormulir', 'SMA%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function sdhVerifSMAcicil()
    {
        $builder = $this->db->table('daftarulang');
        $builder->like('status', 'cicil');
        $builder->like('noFormulir', 'SMA%');
        $query = $builder->countAllResults();
        return $query;
    }





    public function formulirSMK()
    {
        $query = $this->db->query("SELECT p.idPembayaran, p.noFormulir, p.tglPembayaran, p.status,p.gbrBuktiBayar, p.totalPembayaran, f.sekolah, f.asalSekolah,f.idPendaftar,f.nmPendaftar, j.kdJurusan,f.hp,f.tglLahir, f.tempatLahir,f.agama, f.email, f.created_at as tglDaftar,p.verifikator, p.created_at as tglKonfirmasi, p.updated_at as tglVerifikasi, f.alamat, f.hpOrtu FROM daftarulang p INNER JOIN pendaftaran f on p.idPendaftar = f.idPendaftar INNER JOIN jurusan j on f.kdJurusan=j.kdJurusan WHERE f.sekolah ='SMK' and p.jnsPembayaran='formulir'")->getResultArray();
        return $query;
    }

    public function daftarulangData()
    {
        $query = $this->db->query("SELECT p.kwitansi, p.idPembayaran, p.noFormulir, p.tglPembayaran, p.status,p.gbrBuktiBayar, p.totalPembayaran,p.invoice_payment_status, p.invoice_payment_date, p.invoice_id, f.sekolah,f.hp,f.hpOrtu,f.jk, f.asalSekolah,f.idPendaftar,f.nmPendaftar, j.kdJurusan,f.hp,f.tglLahir, f.tempatLahir,f.agama, f.email, f.created_at as tglDaftar, p.verifikator, p.created_at as tglKonfirmasi, p.updated_at as tglVerifikasi, f.alamat, f.hpOrtu FROM daftarulang p INNER JOIN pendaftaran f on p.idPendaftar = f.idPendaftar INNER JOIN jurusan j on f.kdJurusan=j.kdJurusan WHERE jnsPembayaran='daftar ulang' order by p.created_at desc")->getResultArray();
        return $query;
    }

    public function getDataByStudentId($id)
    {


        $query = $this->db->query("SELECT p.idPembayaran,p.kwitansi, p.noFormulir, p.tglPembayaran, p.status,p.gbrBuktiBayar, p.totalPembayaran, p.invoice_payment_status, p.invoice_payment_date, p.invoice_id, f.sekolah, f.asalSekolah,f.idPendaftar,f.nmPendaftar, j.kdJurusan,f.hpOrtu,f.hp,f.tglLahir, f.tempatLahir,f.agama, f.email, f.created_at as tglDaftar, p.verifikator, p.created_at as tglKonfirmasi, p.updated_at as tglVerifikasi, f.alamat, f.hpOrtu FROM daftarulang p INNER JOIN pendaftaran f on p.idPendaftar = f.idPendaftar INNER JOIN jurusan j on f.kdJurusan=j.kdJurusan WHERE (sekolah ='SMA' or sekolah ='SMK') and jnsPembayaran='daftar ulang' and p.idPendaftar = '{$id}' order by p.created_at desc")->getRowArray();
        return $query;
    }

    public function getDataById($id)
    {
        $query = $this->db->query("SELECT p.idPembayaran,p.kwitansi, p.noFormulir, p.tglPembayaran, p.status,p.gbrBuktiBayar, p.totalPembayaran, p.invoice_payment_status, p.invoice_payment_date,  p.invoice_id, f.sekolah, f.asalSekolah,f.idPendaftar,f.nmPendaftar, j.kdJurusan,f.hpOrtu,f.hp,f.tglLahir, f.tempatLahir,f.agama, f.email, f.created_at as tglDaftar, p.verifikator, p.created_at as tglKonfirmasi, p.updated_at as tglVerifikasi, f.alamat, f.hpOrtu FROM daftarulang p INNER JOIN pendaftaran f on p.idPendaftar = f.idPendaftar INNER JOIN jurusan j on f.kdJurusan=j.kdJurusan WHERE (sekolah ='SMA' or sekolah ='SMK') and jnsPembayaran='daftar ulang' and p.idPembayaran = '{$id}' order by p.created_at desc")->getRowArray();
        return $query;
    }

    public function getDataByStudentInvoiceId($id)
    {
        $query = $this->db->query("SELECT p.idPembayaran,p.kwitansi, p.noFormulir, p.tglPembayaran, p.status,p.gbrBuktiBayar, p.totalPembayaran, p.invoice_payment_status, p.invoice_payment_date, p.invoice_id, f.sekolah, f.asalSekolah,f.idPendaftar,f.nmPendaftar, j.kdJurusan,f.hpOrtu,f.hp,f.tglLahir, f.tempatLahir,f.agama, f.email, f.created_at as tglDaftar, p.verifikator, p.created_at as tglKonfirmasi, p.updated_at as tglVerifikasi, f.alamat, f.hpOrtu FROM daftarulang p INNER JOIN pendaftaran f on p.idPendaftar = f.idPendaftar INNER JOIN jurusan j on f.kdJurusan=j.kdJurusan WHERE (sekolah ='SMA' or sekolah ='SMK') and jnsPembayaran='daftar ulang' and p.invoice_id = '{$id}' order by p.created_at desc")->getRowArray();
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

    public function callbackPaymentByStudentId($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idPendaftar' => $id));
        return $query;
    }
    public function idOtomatis()
    {
        $query = $this->db->query("SELECT MAX(idPembayaran) as idTerbesar from daftarulang");
        $hasil = $query->getRow();
        return $hasil->idTerbesar;
    }
    public function editDatadaftarulang($data, $idPembayaran)
    {
        $query = $this->db->table($this->table)->update($data, array('idPembayaran' => $idPembayaran));
        return $query;
    }

    public function ambilStatus($idPendaftar = false)
    {
        if ($idPendaftar === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['idPendaftar' => $idPendaftar]);
        }
    }

    public function ambilStatusdaftarulang($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['idPendaftar' => $id]);
        }
    }


    public function daftarUlangRPL()
    {
        $status = ['lunas', 'cicil'];
        $builder = $this->db->table('daftarulang');

        $builder->join('pendaftaran', 'pendaftaran.noFormulir = daftarulang.noFormulir');
        $builder->where('pendaftaran.kdJurusan', 'REKAYASA PERANGKAT LUNAK / PPLG');
        $builder->whereIn('pendaftaran.statusdu', $status);

        $query = $builder->countAllResults();
        return $query;
    }

    public function daftarUlangTKJ()
    {
        $status = ['lunas', 'cicil'];
        $builder = $this->db->table('daftarulang');

        $builder->join('pendaftaran', 'pendaftaran.noFormulir = daftarulang.noFormulir');
        $builder->where('pendaftaran.kdJurusan', 'TEKNIK KOMPUTER JARINGAN / TJKT');

        $builder->whereIn('pendaftaran.statusdu', $status);
        $query = $builder->countAllResults();
        return $query;
    }

    public function daftarUlangMM()
    {
        $status = ['lunas', 'cicil'];
        $builder = $this->db->table('daftarulang');

        $builder->join('pendaftaran', 'pendaftaran.noFormulir = daftarulang.noFormulir');
        $builder->where('pendaftaran.kdJurusan', 'MULTIMEDIA / DKV');
        $builder->whereIn('pendaftaran.statusdu', $status);

        $query = $builder->countAllResults();
        return $query;
    }

    public function daftarUlangBC()
    {
        $status = ['lunas', 'cicil'];
        $builder = $this->db->table('daftarulang');

        $builder->join('pendaftaran', 'pendaftaran.noFormulir = daftarulang.noFormulir');
        $builder->where('pendaftaran.kdJurusan', 'BROADCASTING / BCF');
        $builder->whereIn('pendaftaran.statusdu', $status);

        $query = $builder->countAllResults();
        return $query;
    }

    public function daftarUlangIPA()
    {
        $status = ['lunas', 'cicil'];
        $builder = $this->db->table('daftarulang');

        $builder->join('pendaftaran', 'pendaftaran.noFormulir = daftarulang.noFormulir');
        $builder->where('pendaftaran.kdJurusan', 'IPA');
        $builder->whereIn('pendaftaran.statusdu', $status);

        $query = $builder->countAllResults();
        return $query;
    }

    public function daftarUlangIPS()
    {
        $status = ['lunas', 'cicil'];
        $builder = $this->db->table('daftarulang');

        $builder->join('pendaftaran', 'pendaftaran.noFormulir = daftarulang.noFormulir');
        $builder->where('pendaftaran.kdJurusan', 'IPS');
        $builder->whereIn('pendaftaran.statusdu', $status);

        $query = $builder->countAllResults();
        return $query;
    }
    
     public function daftarUlangEks($kdJurusan)
    {
        $status = ['lunas', 'cicil'];
        $builder = $this->db->table('daftarulang');

        $builder->join('pendaftaran', 'pendaftaran.noFormulir = daftarulang.noFormulir');
        $builder->where('pendaftaran.kdJurusan', $kdJurusan);
        $builder->whereIn('pendaftaran.statusdu', $status);

        $query = $builder->countAllResults();
        return $query;
    }

    public function search($keyword)
    {
        return $this->db->query("SELECT * FROM daftarulang where idPendaftar like '$keyword'")->getResultObject();
    }
}
