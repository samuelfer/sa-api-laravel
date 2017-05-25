<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\PessoaCreateRequest;
use SA\Http\Requests\PessoaUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\PessoaRepository;



class PessoasController extends Controller
{

    /**
     * @var PessoaRepository
     */
    protected $repository;


    public function __construct(PessoaRepository $repository)
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
       return $this->repository->condominio->all();


        //return $this->repository
        //    ->with('condominio')
        //    ->with('tipoPessoa')->all();

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
        $pessoa = $this->repository->find($id);
        $pessoa->tipoPessoa;
        $pessoa->condominio;
        return response()->json($pessoa, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  PessoaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaCreateRequest $request)
    {
        $pessoa = $this->repository->create($request->all());
        return response()->json($pessoa, 201);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  PessoaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PessoaUpdateRequest $request, $id)
    {
        $pessoa = $this->repository->update($request->all(), $id);
        return response()->json($pessoa, 200);
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

        return redirect()->back()->with('message', 'pessoa deleted.');
    }
}
