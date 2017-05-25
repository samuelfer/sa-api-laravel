<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\AchadosPerdidosRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\AchadosPerdidosRepository;



class AchadosPerdidosController extends Controller
{

    /**
     * @var AchadosPerdidosRepository
     */
    protected $repository;


    public function __construct(AchadosPerdidosRepository $repository)
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
        return $this->repository->with('bloco')->all();
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
        $achadoPerdido = $this->repository->find($id);
        $achadoPerdido->bloco;
        return response()->json($achadoPerdido, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  AchadosPerdidosCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AchadosPerdidosRequest $request)
    {
        $achados_perdidos = $this->repository->create($request->all());
        return response()->json($achados_perdidos, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AchadosPerdidosRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AchadosPerdidosRequest $request, $id)
    {
        $achados_perdidos = $this->repository->update($request->all(), $id);
        return response()->json($achados_perdidos, 200);
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
        } else {
            return response()->json(['error' => 'Resource can not b deleted'], 500);
        }

        return redirect()->back()->with('message', 'Achados Perdidos deleted.');
    }
}
