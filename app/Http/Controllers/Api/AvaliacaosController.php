<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\AvaliacaoCreateRequest;
use SA\Http\Requests\AvaliacaoUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\AvaliacaoRepository;



class AvaliacaosController extends Controller
{

    /**
     * @var AvaliacaoRepository
     */
    protected $repository;


    public function __construct(AvaliacaoRepository $repository)
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
     * @param  AvaliacaoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AvaliacaoCreateRequest $request)
    {

        $avaliacao = $this->repository->create($request->all());
        return response()->json($avaliacao, 201);
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
        return $this->repository->findByField('id_avaliacao', $id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AvaliacaoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AvaliacaoUpdateRequest $request, $id)
    {

        $avaliacao = $this->repository->update($request->all(), $id);
        return response()->json($avaliacao, 200);
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

        return redirect()->back()->with('message', 'Avaliacao deleted.');
    }
}
