<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\PerfilCreateRequest;
use SA\Http\Requests\PerfilUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\PerfilRepository;


class PerfilsController extends Controller
{

    /**
     * @var PerfilRepository
     */
    protected $repository;

    public function __construct(PerfilRepository $repository)
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
        $perfil = $this->repository->find($id);
        return response()->json($perfil, 201);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  PerfilCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PerfilCreateRequest $request)
    {
        $perfil = $this->repository->create($request->all());
        return response()->json($perfil, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PerfilUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PerfilUpdateRequest $request, $id)
    {
        $perfil = $this->repository->update($request->all(), $id);
        return response()->json($perfil, 200);
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

        return redirect()->back()->with('message', 'perfil deleted.');
    }
}
