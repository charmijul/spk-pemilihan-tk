<?php

namespace App\Http\Controllers;

use App\Models\Datatk;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class DashboardDatatkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.datatk.index', [
            'datatk' => Datatk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.datatk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('tk-images');

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'longtitude' => 'required',
            'lattitude' => 'required',
            'link_address' => 'nullable|url',
            'spp' => 'required|numeric|min:10000|max:500000',
            'entry_fee' => 'required|numeric|min:100000|max:5000000',
            'capacity' => 'required|numeric|min:10|max:50',
            'teachers' => 'required|numeric|min:1|max:5',
            'accreditation' => 'required',
            'status' => 'required',
            'abk' => 'required',
            'facilities' => 'required|numeric|min:4|max:10',
            'image' => 'image|file|max:2048'
        ]);
        //dd($validatedData);
        if ($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('tk-images');
        }
        Datatk::create($validatedData);

        return redirect('/dashboard/datatk')->with('success', 'Data TK berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datatk  $datatk
     * @return \Illuminate\Http\Response
     */
    public function show(Datatk $datatk)
    {
        //return $datatk;
        return view('dashboard.datatk.show', [
            'infotk' => $datatk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datatk  $datatk
     * @return \Illuminate\Http\Response
     */
    public function edit(Datatk $datatk)
    {
        return view('dashboard.datatk.edit',[
            'infotk' => $datatk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datatk  $datatk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datatk $datatk)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'longtitude' => 'required',
            'lattitude' => 'required',
            'link_address' => 'nullable|url',
            'spp' => 'required|numeric|min:10000|max:500000',
            'entry_fee' => 'required|numeric|min:100000|max:5000000',
            'capacity' => 'required|numeric|min:10|max:50',
            'teachers' => 'required|numeric|min:1|max:5',
            'accreditation' => 'required',
            'status' => 'required',
            'abk' => 'required',
            'facilities' => 'required|numeric|min:4|max:10',
            'image' => 'image|file|max:2048'
        ]);

        if ($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('tk-images');
        }

        Datatk::where('id', $datatk->id)->update($validatedData);

        return redirect('/dashboard/datatk')->with('success', 'Data TK berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datatk  $datatk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datatk $datatk)
    {
        if($datatk->image){
            Storage::delete($datatk->image);
        }
        Datatk::destroy($datatk->id);

        return redirect('/dashboard/datatk')->with('success', 'Data TK berhasil dihapus');
    }
}
