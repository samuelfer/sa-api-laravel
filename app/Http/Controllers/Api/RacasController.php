<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\RacaCreateRequest;
use SA\Http\Requests\RacaUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\RacaRepository;


class RacasController extends Controller
{

    /**
     * @var RacaRepository
     */
    protected $repository;


    public function __construct(RacaRepository $repository)
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
        $raca = $this->repository->find($id);
        return response()->json($raca, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  RacaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RacaCreateRequest $request)
    {
        $raca = $this->repository->create($request->all());
        return response()->json($raca, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  RacaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(RacaUpdateRequest $request, $id)
    {
        $raca = $this->repository->update($request->all(), $id);
        return response()->json($raca, 200);
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

        return redirect()->back()->with('message', 'Raça deleted.');
    }
}
