<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\TipoFaleConoscoCreateRequest;
use SA\Http\Requests\TipoFaleConoscoUpdateRequest;
use SA\Repositories\TipoFaleConoscoRepository;
use SA\Http\Controllers\Controller;
use SA\Validators\TipoFaleConoscoValidator;


class TipoFaleConoscosController extends Controller
{

    /**
     * @var TipoFaleConoscoRepository
     */
    protected $repository;


    public function __construct(TipoFaleConoscoRepository $repository)
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
        return $this->repository->find($id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoFaleConoscoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoFaleConoscoCreateRequest $request)
    {
        $tipoFaleconosco = $this->repository->create($request->all());
        return response()->json($tipoFaleconosco, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TipoFaleConoscoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoFaleConoscoUpdateRequest $request, $id)
    {
        $tipoFaleconosco = $this->repository->update($request->all(), $id);
        return response()->json($tipoFaleconosco, 200);
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

        return redirect()->back()->with('message', 'Tipo Fale Conosco deleted.');
    }
}
