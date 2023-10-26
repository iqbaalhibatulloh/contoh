<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use App\DataTables\CollectionsDataTable;

/**
 * NIM: 6706220110
 * NAMA: Iqbaal Hibatulloh
 * KELAS: 46-04
 */

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CollectionsDataTable $dataTable)
    {
        return $dataTable->render('koleksi.daftarKoleksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('koleksi.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collections = Collection::create([
            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahKoleksi' => $request->jumlahKoleksi,
        ]);
        return redirect('/koleksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
 * NIM: 6706220110
 * NAMA: Iqbaal Hibatulloh
 * KELAS: 46-04
 */
    public function show(Collection $collection)
    {
        $jenisKoleksi = "";
        switch ($collection->jenisKoleksi) {
            case 1:
                $jenisKoleksi = "buku";
                break;
            case 2:
                $jenisKoleksi = "majalah";
                break;
            case 3:
                $jenisKoleksi = "cakram digital";
                break;
            
        }
        return view('koleksi.infoKoleksi', [
            "koleksi" => $collection,
            "jenisKoleksi" => $jenisKoleksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        return view("koleksi.editkoleksi", compact("collection"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        $validatedData = $request->validate([
            'namaKoleksi' => 'required',
            'jenisKoleksi' => 'required',
            'jumlahKoleksi' => 'required',
        ]);
        $collection->update($request->except (['token_']));

        return redirect()->route('koleksi.infoKoleksi', $collection->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
