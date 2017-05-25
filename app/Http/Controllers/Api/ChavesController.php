<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\ChavesCreateRequest;
use SA\Http\Requests\ChavesUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\ChavesRepository;



class ChavesController extends Controller
{

    /**
     * @var ChavesRepository
     */
    protected $repository;



    public function __construct(ChavesRepository $repository)
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
        return $this->repository->with('bloco')->with('tipoChave')->all();
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
        $chave = $this->repository->find($id);
        return response()->json($chave, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  ChavesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ChavesCreateRequest $request)
    {
        $chave = $this->repository->create($request->all());
        return response()->json($chave, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ChavesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ChavesUpdateRequest $request, $id)
    {
        $chave = $this->repository->update($request->all(), $id);
        return response()->json($chave, 200);
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

        return redirect()->back()->with('message', 'chave deleted.');
    }
}
