<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\TipoMultaNotificacaoRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\TipoMultaNotificacaoRepository;



class TipoMultaNotificacaosController extends Controller
{

    /**
     * @var TipoMultaNotificacaoRepository
     */
    protected $repository;


    public function __construct(TipoMultaNotificacaoRepository $repository)
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
     * @param  TipoMultaNotificacaoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoMultaNotificacaoRequest $request)
    {
        $tipoMulta = $this->repository->create($request->all());
        return response()->json($tipoMulta, 201);
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
     * @param  TipoMultaNotificacaoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoMultaNotificacaoRequest $request, $id)
    {
        $tipoMulta = $this->repository->update($request->all(), $id);
        return response()->json($tipoMulta, 200);
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

        return redirect()->back()->with('message', 'Tipo multa deleted.');
    }
}
