<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\VeiculoMoradorCreateRequest;
use SA\Http\Requests\VeiculoMoradorUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\VeiculoMoradorRepository;



class VeiculoMoradorsController extends Controller
{

    /**
     * @var VeiculoMoradorRepository
     */
    protected $repository;

    public function __construct(VeiculoMoradorRepository $repository)
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
        return $this->repository->with('bloco')->with('modeloVeiculo')->all();
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
        $veiculo = $this->repository->find($id);
        $veiculo->bloco; //Pegando os blocos
        $veiculo->modeloVeiculo;//Modelo do veiculo
        return response()->json($veiculo, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  VeiculoMoradorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(VeiculoMoradorCreateRequest $request)
    {
        $veiculo = $this->repository->create($request->all());
        return response()->json($veiculo, 201);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  VeiculoMoradorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(VeiculoMoradorUpdateRequest $request, $id)
    {
        $veiculo = $this->repository->update($request->all(), $id);
        return response()->json($veiculo, 200);
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

        return redirect()->back()->with('message', 'veículo deleted.');
    }
}
