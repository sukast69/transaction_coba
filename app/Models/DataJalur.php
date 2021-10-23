<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataJalur extends Model
{
    protected $table = 'jalur_pendaftaran';
    protected $fillable = ['nama_jalur'];
    protected $key = 'id_jalur';
    public $timestamps = true;
    use HasFactory;

    public function alldataJalur()
    {
        return DB::table('jalur_pendaftaran')->get();

    }

    public function addDataJalur($dataJalur)
    {
        DB::table('jalur_pendaftaran')->insert($dataJalur);

        // return $this->hasOne(DataJalur::class);

    }

    public function getCasts()
    {

        return DB::table('jalur_pendaftaran')->orderBy('id_jalur', 'desc')->first();
    }
}