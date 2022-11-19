<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use App\Http\Resources\DepartemenResource;
use App\Http\Requests\DepartemenRequest;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DepartemenResource::collection(Departemen::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartemenRequest $request)
    {
        $departemen = Departemen::create($request->validated());

        return new DepartemenResource($departemen);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function show(Departemen $departemen)
    {
        return new DepartemenResource($departemen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function update(DepartemenRequest $request, Departemen $departemen)
    {
        $departemen->update($request->validated());

        return new DepartemenResource($departemen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departemen $departemen)
    {
        $departemen->delete();

        return response()->noContent();
    }
}
