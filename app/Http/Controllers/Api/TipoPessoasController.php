<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\TipoPessoaCreateRequest;
use SA\Http\Requests\TipoPessoaUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\TipoPessoaRepository;



class TipoPessoasController extends Controller
{

    /**
     * @var TipoPessoaRepository
     */
    protected $repository;

    public function __construct(TipoPessoaRepository $repository)
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
        $tipoPessoa = $this->repository->find($id);
        return response()->json($tipoPessoa, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoPessoaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoPessoaCreateRequest $request)
    {
        $tipoPessoa = $this->repository->create($request->all());
        return response()->json($tipoPessoa, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TipoPessoaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoPessoaUpdateRequest $request, $id)
    {
        $tipoPessoa = $this->repository->update($request->all(), $id);
        return response()->json($tipoPessoa, 200);
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

        return redirect()->back()->with('message', 'tipo pessoa deleted.');
    }
}
