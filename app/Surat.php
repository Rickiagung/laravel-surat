<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'surats';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['no_urut','no_surat', 'no_agenda', 'jenis_surat_id', 'tanggal_kirim', 'tanggal_terima', 'pengirim', 'perihal','kode_klasifikasi', 'file',  'tipe', 'user_id'];

    public function savesurat($data)
{
  
        $this->no_urut = $data['no_urut'];
        $this->no_surat = $data['no_surat'];
        $this->no_agenda = $data['no_agenda'];
        $this->jenis_surat_id = $data['jenis_surat_id'];
        $this->tanggal_kirim = $data['tanggal_kirim'];
        $this->tanggal_terima = $data['tanggal_terima'];
        $this->pengirim = $data['pengirim'];
        $this->perihal = $data['perihal'];
        $this->kode_klasifikasi = $data['kode_klasifikasi'];
        $this->file = $data['file'];
        $this->tipe = $data['tipe'];
        $this->user_id = auth()->user()->id;

        $this->save();
        return 1;
}

    public function jenis_surat ()
    {
        return $this->belongsTo('App\JenisSurat');
    }    

    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function disposisis ()
    {
        return $this->hasMany('App\Disposisi');
    }
}
