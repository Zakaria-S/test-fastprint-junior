<?php

namespace App\Http\Controllers;

use App\Models\Produk;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class ProdukController extends Controller
{
    public function index()
    {
        if (!Produk::exists()) {
            date_default_timezone_set('Asia/Jakarta');
            $username = "tesprogrammer" . date('dmy') . "C" . (date('H') + 1);
            $password = "bisacoding-" . date('d-m-y');
            $password = md5($password);
            $response = Http::asForm()->post('https://recruitment.fastprint.co.id/tes/api_tes_programmer', [
                'username' => $username,
                'password' => $password
            ]);
            $result = json_decode($response);
            foreach ($result->data as $data) {
                $kategori_id = Kategori::where('nama_kategori', '=', $data->kategori)->first()->id_kategori;
                $status_id = Status::where('nama_status', '=', $data->status)->first()->id_status;
                $produk = Produk::create([
                    'nama_produk' => $data->nama_produk,
                    'harga' => $data->harga,
                    'kategori_id' => $kategori_id,
                    'status_id' => $status_id
                ]);
            }
        }

        $id_bisa_dijual = Status::where('nama_status', 'bisa dijual')->first()->id_status;
        $produk_tersedia = Produk::where('status_id', $id_bisa_dijual)->get();

        return view('index')->with('produk_tersedia', $produk_tersedia);
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $statuses = Status::all();
        return view('create')->with('kategoris', $kategoris)
            ->with('statuses', $statuses);
    }

    public function store(Request $request)
    {
        Produk::create($request->all());
        return redirect('/produk');
    }

    public function edit($id)
    {
        $produk = Produk::where('id_produk', $id)->get();
        $kategoris = Kategori::all();
        $statuses = Status::all();
        return view('edit')->with('kategoris', $kategoris)
            ->with('statuses', $statuses)
            ->with('produk', $produk[0]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        Produk::where('id_produk', $id)->update([
            'nama_produk' => $input['nama_produk'],
            'harga' => $input['harga'],
            'kategori_id' => $input['kategori_id'],
            'status_id' => $input['status_id'],
        ]);
        return redirect('/produk');
    }

    public function destroy($id): RedirectResponse
    {
        Produk::where('id_produk', $id)->delete();
        return redirect('/produk');
    }
}
