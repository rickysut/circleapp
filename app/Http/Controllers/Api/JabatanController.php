<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Http\Requests\JabatanRequest;
use App\Http\Resources\JabatanResource;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = DB::select(DB::raw('select jab.*, doc.filepath
        from jabatans jab 
        left JOIN dokumens doc on jab.doc_id = doc.id 
        where jab.deleted_at is null'));
        $result = array('data' => $res);
        return collect($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JabatanRequest $request)
    {
        $Jabatan = Jabatan::create($request->validated());

        return new JabatanResource($Jabatan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        $id = $jabatan->id;
        $res = DB::select(DB::raw('select jab.* , doc.filepath
        from jabatans jab 
        left JOIN dokumens doc on jab.doc_id = doc.id 
        where jab.deleted_at is null and jab.id = '. $id ));
        $result = array('data' => $res);
        return collect($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(JabatanRequest $request, Jabatan $jabatan)
    {
        $jabatan->update($request->validated());

        return new JabatanResource($jabatan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return response()->noContent();
    }
}
