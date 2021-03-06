<?php

namespace SA\Http\Controllers\Api;

;
use SA\Http\Requests\TipoMovimentoRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\TipoMovimentoRepository;



class TipoMovimentosController extends Controller
{

    /**
     * @var TipoMovimentoRepository
     */
    protected $repository;


    public function __construct(TipoMovimentoRepository $repository)
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
     * @param  TipoMovimentoRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoMovimentoRequest $request)
    {
        $tipoMovimento = $this->repository->create($request->all());
        return response()->json($tipoMovimento, 201);
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
     * @param  TipoMovimentoRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoMovimentoRequest $request, $id)
    {
        $tipoMovimento = $this->repository->update($request->all(), $id);
        return response()->json($tipoMovimento, 200);
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

        return redirect()->back()->with('message', 'Tipo movimento deleted.');
    }
}
