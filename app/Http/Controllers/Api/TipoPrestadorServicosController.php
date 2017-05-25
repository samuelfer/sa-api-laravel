<?php

namespace SA\Http\Controllers\Api;

use SA\Http\Controllers\Response;
use SA\Http\Requests\TipoPrestadorServicoCreateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\TipoPrestadorServicoRepository;



class TipoPrestadorServicosController extends Controller
{

    /**
     * @var TipoPrestadorServicoRepository
     */
    protected $repository;


    public function __construct(TipoPrestadorServicoRepository $repository)
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoPrestadorServico = $this->repository->find($id);
        return response()->json($tipoPrestadorServico, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoPrestadorServicoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoPrestadorServicoCreateRequest $request)
    {
        $tipoPrestadorServico = $this->repository->create($request->all());
        return response()->json($tipoPrestadorServico, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TipoPrestadorServicoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoPrestadorServicoUpdateRequest $request, $id)
    {
        $tipoPrestadorServico = $this->repository->update($request->all(), $id);
        return response()->json($tipoPrestadorServico, 200);
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

        return redirect()->back()->with('message', 'Tipo de Serviço deleted.');
    }
}
