<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengguna extends Model
{

    protected $table = 'pengguna';
    protected $fillable = ['nik', 'nama_lengkap', 'ttl'];
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

    public function getLast()
    {
        return DB::table('pengguna')->orderBy('id_pengguna', 'desc')->first();
    }

}