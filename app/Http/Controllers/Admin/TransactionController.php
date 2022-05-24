<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $items = Transaction::with(
            [
                'details', 'travel_package', 'user'
            ]
        )->get();

        // kirim data ke halaman index
        return view('pages.admin.transaction.index',
        [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        // ambil semua data
        $data = $request->all();
        // tambahan data slug
        $data['slug'] = Str::slug($request->title);
        // simpan data ke travel package
        Transaction::create($data);
        // pindah ke halaman index
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item = Transaction::with(
            [
                'details', 'travel_package', 'user'
            ]
        )->findOrFail($id);

        return view('pages.admin.transaction.detail',
        [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit',
        [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
         // ambil semua data
         $data = $request->all();
         // tambahan data slug
         $data['slug'] = Str::slug($request->title);

         // ambil id
         $item = Transaction::findOrFail($id);
         // update data nya 
         $item->update($data);
         // pindah ke halaman index
         return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // cari id
        $item = Transaction::findOrFail($id);
        $item->delete();

         // pindah ke halaman index
        return redirect()->route('transaction.index');
    }
}
