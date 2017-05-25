<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\ModeloVeiculoCreateRequest;
use SA\Http\Requests\ModeloVeiculoUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\ModeloVeiculoRepository;



class ModeloVeiculosController extends Controller
{

    /**
     * @var ModeloVeiculoRepository
     */
    protected $repository;

    public function __construct(ModeloVeiculoRepository $repository)
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
        return $this->repository->with('fabricante')->all();
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
        $modeloVeiculo = $this->repository->find($id);
        $modeloVeiculo->fabricante;
        return response()->json($modeloVeiculo, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  ModeloVeiculoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ModeloVeiculoCreateRequest $request)
    {
        $modeloVeiculo = $this->repository->create($request->all());
        return response()->json($modeloVeiculo, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ModeloVeiculoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ModeloVeiculoUpdateRequest $request, $id)
    {
        $modeloVeiculo = $this->repository->update($request->all(), $id);
        return response()->json($modeloVeiculo, 200);
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

        return redirect()->back()->with('message', 'Modelo de Veículo deleted.');
    }
}
