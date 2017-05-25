<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\TipoContaRequest;
use SA\Http\Controllers\Controller;
use SA\Http\Controllers\Response;
use SA\Repositories\TipoContaRepository;


class TipoContasController extends Controller
{

    /**
     * @var TipoContaRepository
     */
    protected $repository;

    public function __construct(TipoContaRepository $repository)
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
     * @param  TipoContaRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoContaRequest $request)
    {
        $tipoConta = $this->repository->create($request->all());
        return response()->json($tipoConta, 201);
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
     * @param  TipoContaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoContaRequest $request, $id)
    {
        $tipoConta = $this->repository->update($request->all(), $id);
        return response()->json($tipoConta, 200);
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

        return redirect()->back()->with('message', 'Tipo conta deleted.');
    }
}
