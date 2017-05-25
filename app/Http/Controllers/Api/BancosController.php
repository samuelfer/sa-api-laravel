<?php

namespace SA\Http\Controllers\Api;

use SA\Http\Requests\BancoRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\BancoRepository;



class BancosController extends Controller
{

    /**
     * @var BancoRepository
     */
    protected $repository;


    public function __construct(BancoRepository $repository)
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
     * @param  BancoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BancoRequest $request)
    {
        $banco = $this->repository->create($request->all());
        return response()->json($banco, 201);
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
        return $this->repository->findByField('id_banco', $id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BancoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BancoUpdateRequest $request, $id)
    {
        $banco = $this->repository->update($request->all(), $id);
        return response()->json($banco, 200);
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
        } else {
            return response()->json(['error' => 'Resource can not b deleted'], 500);
        }

        return redirect()->back()->with('message', 'Banco deleted.');
    }
}
