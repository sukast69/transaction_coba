<?php

namespace App\Http\Controllers;

use App\Models\DataBank;
use App\Models\Pengguna;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->DataBank = new DataBank();
        $this->Pengguna = new Pengguna();
    }

    public function index()
    {
        $data = [
            'pengguna' => $this->Pengguna->alldataPengguna(),
            'dataBank' => $this->DataBank->alldataJalur(),
        ];

        return view('home', $data);
    }

    public function insert()
    {

        DB::beginTransaction();
        $dataBank = [
            'nama_jalur' => Request()->nama_jalur,
        ];

        $this->DataBank->addDataJalur($dataBank);

        $dataPengguna = [

            'id_jalur' => '3',
            'nik' => Request()->nik,
            'nama_lengkap' => Request()->nama_lengkap,
            'alamat' => Request()->alamat,

            // 'id_jalur' => $this->Pengguna->getCasts()->id_jalur,
        ];

        $this->Pengguna->addDataPengguna($dataPengguna);

        DB::commit();

        return redirect()->route('insert')->with('pesan', 'Data berhasil ditambahkan!!');

    }
}