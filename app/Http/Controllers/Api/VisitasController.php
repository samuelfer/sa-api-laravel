<?php

namespace SA\Http\Controllers\Api;

use SA\Http\Requests\VisitaCreateRequest;
use SA\Http\Requests\VisitaUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\VisitaRepository;



class VisitasController extends Controller
{

    /**
     * @var VisitaRepository
     */
    protected $repository;


    public function __construct(VisitaRepository $repository)
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
        return $this->repository->with('bloco')->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VisitaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(VisitaCreateRequest $request)
    {
        $visita = $this->repository->create($request->all());
        return response()->json($visita, 201);
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
     * Update the specified resource in storage.
     *
     * @param  VisitaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(VisitaUpdateRequest $request, $id)
    {
        $visita = $this->repository->update($request->all(), $id);
        return response()->json($visita, 200);
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

        return redirect()->back()->with('message', 'Visita deleted.');
    }
}
