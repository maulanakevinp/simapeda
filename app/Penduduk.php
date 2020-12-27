<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = "penduduk";
    protected $guarded = [];

    public function pekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan');
    }

    public function pendidikan()
    {
        return $this->belongsTo('App\Pendidikan');
    }

    public function agama()
    {
        return $this->belongsTo('App\Agama');
    }

    public function darah()
    {
        return $this->belongsTo('App\Darah');
    }

    public function detailDusun()
    {
        return $this->belongsTo('App\DetailDusun');
    }

    public function statusHubunganDalamKeluarga()
    {
        return $this->belongsTo('App\StatusHubunganDalamKeluarga');
    }

    public function statusPerkawinan()
    {
        return $this->belongsTo('App\StatusPerkawinan');
    }

    public function statusRekam()
    {
        return $this->belongsTo('App\StatusRekam');
    }

    public function statusPenduduk()
    {
        return $this->belongsTo('App\StatusPenduduk');
    }

    public function akseptorKb()
    {
        return $this->belongsTo('App\AkseptorKb');
    }

    public function asuransi()
    {
        return $this->belongsTo('App\Asuransi');
    }

    public function jenisCacat()
    {
        return $this->belongsTo('App\JenisCacat');
    }

    public function jenisKelahiran()
    {
        return $this->belongsTo('App\JenisKelahiran');
    }

    public function penolongKelahiran()
    {
        return $this->belongsTo('App\PenolongKelahiran');
    }

    public function sakitMenahun()
    {
        return $this->belongsTo('App\SakitMenahun');
    }

    public function tempatDilahirkan()
    {
        return $this->belongsTo('App\TempatDilahirkan');
    }

    public function pendidikanSedangDitempuh()
    {
        return $this->belongsTo('App\Pendidikan','pendidikan_sedang_ditempuh_id');
    }

    public function input()
    {
        return $this->hasMany('App\Input');
    }

    public function bantuan_penduduk()
    {
        return $this->hasMany('App\BantuanPenduduk','penduduk_id');
    }
}
