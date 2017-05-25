<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\EspecieCreateRequest;
use SA\Http\Requests\EspecieUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\EspecieRepository;



class EspeciesController extends Controller
{

    /**
     * @var EspecieRepository
     */
    protected $repository;


    public function __construct(EspecieRepository $repository)
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
        $especie = $this->repository->find($id);
        return response()->json($especie, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  EspecieCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EspecieCreateRequest $request)
    {
        $especie = $this->repository->create($request->all());
        return response()->json($especie, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EspecieUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(EspecieUpdateRequest $request, $id)
    {
        $especie = $this->repository->update($request->all(), $id);
        return response()->json($especie, 200);
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

        return redirect()->back()->with('message', 'Espécie deleted.');
    }
}
