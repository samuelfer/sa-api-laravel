<?php

namespace SA\Http\Controllers\Api;

use SA\Http\Controllers\Response;
use SA\Http\Requests\TipoSituacaoRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\TipoSituacaoRepository;



class TipoSituacaosController extends Controller
{

    /**
     * @var TipoSituacaoRepository
     */
    protected $repository;


    public function __construct(TipoSituacaoRepository $repository)
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
     * @param  TipoSituacaoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoSituacaoRequest $request)
    {
        $tipoSituacao = $this->repository->create($request->all());
        return response()->json($tipoSituacao, 201);
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
     * @param  TipoSituacaoRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoSituacaoRequest $request, $id)
    {
        $tipoSituacao = $this->repository->update($request->all(), $id);
        return response()->json($tipoSituacao, 200);
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

        return redirect()->back()->with('message', 'Tipo situação deleted.');
    }
}
