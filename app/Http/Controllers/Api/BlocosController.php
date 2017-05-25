<?php

namespace SA\Http\Controllers\Api;

use SA\Http\Controllers\Controller;
use SA\Http\Requests\BlocoRequest;
use SA\Repositories\BlocoRepository;



class BlocosController extends Controller
{

    /**
     * @var BlocoRepository
     */
    protected $repository;

    public function __construct(BlocoRepository $repository)
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
     * @param  BlocoRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BlocoRequest $request)
    {
        $bloco = $this->repository->create($request->all());
        return response()->json($bloco, 201);
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
        //return $this->repository->findByField('id_bloco', $id);
    }

    //public function hidden(array $fields);


    /**
     * Update the specified resource in storage.
     *
     * @param  BlocoRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BlocoRequest $request, $id)
    {
        $bloco = $this->repository->update($request->all(), $id);
        return response()->json($bloco, 200);
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
            return response()->json([
                'error' => 'Resource can not be deleted'
            ], 500);
        }
    }
}
