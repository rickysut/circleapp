<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Http\Requests\KaryawanRequest;
use App\Http\Resources\KaryawanResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use \Illuminate\Http\Request;



class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = DB::select(DB::raw('select kry.id, kry.full_name, kry.email, kry.handphone, kry.pob, DATE_FORMAT(kry.dob,"%d/%m/%Y") as dob, kry.dep_id, kry.jabatan_id, kry.doc_id , doc.filepath, dep.name as departemen, jab.name as jabatan
        from karyawans kry 
        left JOIN dokumens doc on kry.doc_id = doc.id 
        left join departemens dep on dep.id = kry.dep_id
        left join jabatans jab on jab.id = kry.jabatan_id
        where kry.deleted_at is null'));
        $result = array('data' => $res);
        // $result = new KaryawanResource($res);
        // return $result;
        return collect($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaryawanRequest $request)
    {
        $newrequest = new KaryawanRequest($request->validated());
        $dob = Carbon::parse($newrequest->input('dob'))->format('Y-m-d');
        $newrequest['dob'] = $dob;
        $karyawan = Karyawan::create($newrequest->all());

        return new KaryawanResource($karyawan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        $id = $karyawan->id;
        $res = DB::select(DB::raw('select kry.* , doc.filepath, dep.name as departemen, jab.name as jabatan
        from karyawans kry 
        left JOIN dokumens doc on kry.doc_id = doc.id 
        left join departemens dep on dep.id = kry.doc_id
        left join jabatans jab on jab.id = kry.jabatan_id
        where kry.deleted_at is null and kry.id = '. $id ));
        $result = array('data' => $res);
        return collect($result);
        // return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(KaryawanRequest $request, Karyawan $karyawan)
    {
        // dd($request->validated());
        $newrequest = new KaryawanRequest($request->validated());
        $dob = Carbon::parse($newrequest->input('dob'))->format('Y-m-d');
        $newrequest['dob'] = $dob;
        $karyawan->update($newrequest->all());

        return new KaryawanResource($karyawan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return response()->noContent();
    }

    

    
}
