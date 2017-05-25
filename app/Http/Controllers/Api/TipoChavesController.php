<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;


use SA\Http\Requests\TipoChavesRequest;
use SA\Http\Controllers\Controller;
use SA\Http\Controllers\Response;
use SA\Repositories\TipoChavesRepository;


class TipoChavesController extends Controller
{

    /**
     * @var TipoChavesRepository
     */
    protected $repository;

    public function __construct(TipoChavesRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoChavesRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoChavesRequest $request)
    {
        $tipoChave = $this->repository->create($request->all());
        return response()->json($tipoChave, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->find($id); //Esse find correspondente a findOrFail()
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TipoChavesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoChavesRequest $request, $id)
    {
        $tipoChave = $this->repository->update($request->all(), $id);
        return response()->json($tipoChave, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if ($deleted) {
            return response()->json([], 204);
        }else{
            return response()->json(['error' => 'Resource can not b deleted'], 500);
        }

        return redirect()->back()->with('message', 'Tipo chave deleted.');
    }
}
