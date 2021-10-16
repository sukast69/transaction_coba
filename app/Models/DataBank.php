<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataBank extends Model
{
    protected $table = 'data_bank';
    protected $fillable = ['nama_bank'];
    protected $key = 'id_bank';
    public $timestamps = true;

    public function alldataBank()
    {
        return DB::table('data_bank')->get();

    }

    public function addDataBank($dataBank)
    {
        DB::table('data_bank')->insert($dataBank);

        // return $this->hasOne(DataBank::class);

    }

    // public function kePengguna()
    // {
    //     $this->hasOne(Pengguna::class, );
    // }

    use HasFactory;
}