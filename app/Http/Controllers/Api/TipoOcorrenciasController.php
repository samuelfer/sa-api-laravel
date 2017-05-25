<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\TipoOcorrenciaRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\TipoOcorrenciaRepository;


class TipoOcorrenciasController extends Controller
{

    /**
     * @var TipoOcorrenciaRepository
     */
    protected $repository;

    public function __construct(TipoOcorrenciaRepository $repository)
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
     * @param  TipoOcorrenciaRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoOcorrenciaRequest $request)
    {
        $tipoOcorrencia = $this->repository->create($request->all());
        return response()->json($tipoOcorrencia, 201);
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
     * @param  TipoOcorrenciaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoOcorrenciaUpdateRequest $request, $id)
    {
        $tipoOcorrencia = $this->repository->update($request->all(), $id);
        return response()->json($tipoOcorrencia, 200);
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

        return redirect()->back()->with('message', 'Tipo ocorrência deleted.');
    }
}
