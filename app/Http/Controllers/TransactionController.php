<?php

namespace App\Http\Controllers;

use App\Models\DataBank;
use App\Models\Pengguna;
use GuzzleHttp\Psr7\Request;

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
            'dataBank' => $this->DataBank->alldataBank(),
        ];

        return view('home', $data);
    }

    public function insert()
    {
        // Request()->validate([
        //     'nik' => 'required|unique:pengguna,nik|min:16',
        //     'nama_lengkap' => 'required',
        //     'ttl' => 'required',
        //     'nama_bank' => 'required',

        // ]);

        $dataPengguna = [
            'nik' => Request()->nik,
            'nama_lengkap' => Request()->nama_lengkap,
            'ttl' => Request()->ttl,
        ];

        $this->Pengguna->addDataPengguna($dataPengguna);

        $dataBank = [

            'id_pengguna' => $this->Pengguna->getLast()->id_pengguna,
            'nama_bank' => Request()->nama_bank,
        ];

        $this->DataBank->addDataBank($dataBank);

        return redirect()->route('insert')->with('pesan', 'Data berhasil ditambahkan!!');

    }
}