<?php

namespace SA\Http\Controllers\Api;

use SA\Http\Requests\FaleConoscoCreateRequest;
use SA\Http\Requests\FaleConoscoUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\FaleConoscoRepository;


class FaleConoscosController extends Controller
{

    /**
     * @var FaleConoscoRepository
     */
    protected $repository;

    public function __construct(FaleConoscoRepository $repository)
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
       return $this->repository->with('bloco')->with('tipoMensagem')->all();
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
        $faleConosco = $this->repository->find($id);
        $faleConosco->bloco;
        $faleConosco->tipoMensagem;
        return response()->json($faleConosco, 201);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FaleConoscoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FaleConoscoCreateRequest $request)
    {
        $faleConosco = $this->repository->create($request->all());
        return response()->json($faleConosco, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  FaleConoscoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(FaleConoscoUpdateRequest $request, $id)
    {
        $faleConosco = $this->repository->update($request->all(), $id);
        return response()->json($faleConosco, 200);
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

        return redirect()->back()->with('message', 'Fale conosco deleted.');
    }
}
