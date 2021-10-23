<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengguna extends Model
{

    protected $table = 'pengguna';
    protected $fillable = ['nik', 'nama_lengkap', 'alamat'];
    protected $key = 'id_pengguna';
    public $timestamps = true;
    use HasFactory;

    public function alldataPengguna()
    {
        return DB::table('pengguna')->get();

    }

    public function addDataPengguna($dataPengguna)
    {
        DB::table('pengguna')->insert($dataPengguna);

    }

    public function detailDataPengguna($id_pengguna)
    {
        return DB::table('pengguna')->where('id_pengguna', $id_pengguna)->first();
    }

    public function editData($id_pengguna, $data)
    {
        DB::table('pengguna')->where('id_pengguna', $id_pengguna)->update($data);
    }

    public function hapusData($id_pengguna)
    {
        DB::table('pengguna')->where('id_pengguna', $id_pengguna)->delete();
    }
}