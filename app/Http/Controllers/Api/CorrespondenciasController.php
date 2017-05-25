<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\CorrespondenciaCreateRequest;
use SA\Http\Requests\CorrespondenciaUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\CorrespondenciaRepository;



class CorrespondenciasController extends Controller
{

    /**
     * @var CorrespondenciaRepository
     */
    protected $repository;

    public function __construct(CorrespondenciaRepository $repository)
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
        $correspondencia = $this->repository->find($id);
        $correspondencia->bloco; //Pegando os blocos
        return response()->json($correspondencia, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  CorrespondenciaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CorrespondenciaCreateRequest $request)
    {
        $correspondencia = $this->repository->create($request->all());
        return response()->json($correspondencia, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CorrespondenciaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CorrespondenciaUpdateRequest $request, $id)
    {
        $correspondencia = $this->repository->update($request->all(), $id);
        return response()->json($correspondencia, 200);
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

        return redirect()->back()->with('message', 'Correspondência deleted.');
    }
}
