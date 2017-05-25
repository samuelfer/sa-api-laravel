<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\FabricanteRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\FabricanteRepository;


class FabricantesController extends Controller
{

    /**
     * @var FabricanteRepository
     */
    protected $repository;


    public function __construct(FabricanteRepository $repository)
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
     * @param  FabricanteCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FabricanteRequest $request)
    {
        $fabricante = $this->repository->create($request->all());
        return response()->json($fabricante, 201);
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
        return $this->repository->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  FabricanteUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(FabricanteRequest $request, $id)
    {
        $fabricante = $this->repository->update($request->all(), $id);
        return response()->json($fabricante, 200);
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
            return response()->json([
                'error' => 'Resource can not be deleted'
            ], 500);
        }
    }
}
