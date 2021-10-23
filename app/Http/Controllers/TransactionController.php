<?php

namespace App\Http\Controllers;

use App\Models\DataJalur;
use App\Models\Pengguna;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->DataJalur = new DataJalur();
        $this->Pengguna = new Pengguna();
    }

    public function index()
    {
        $data = [
            'pengguna' => $this->Pengguna->alldataPengguna(),
            'DataJalur' => $this->DataJalur->alldataJalur(),
        ];

        return view('home', $data);
    }

    public function insert()
    {

        DB::beginTransaction();

        $dataPengguna = [

            'id_jalur' => Request()->nama_jalur,
            'nik' => Request()->nik,
            'nama_lengkap' => Request()->nama_lengkap,
            'alamat' => Request()->alamat,

            // 'id_jalur' => $this->Pengguna->getCasts()->id_jalur,
        ];

        $this->Pengguna->addDataPengguna($dataPengguna);

        DB::commit();

        return redirect()->route('insert')->with('pesan', 'Data berhasil ditambahkan!!');

    }

    // public function jalur()
    // {
    //     $DataJalur = [

    //         'nama_jalur' => Request()->nama_jalur,
    //     ];

    //     $this->DataJalur->addDataJalur($DataJalur);
    //     return redirect()->route('jalur')->with('pesan', 'Data berhasil ditambahkan!!');
    // }
}