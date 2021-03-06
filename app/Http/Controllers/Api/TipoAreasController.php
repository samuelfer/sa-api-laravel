<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;

use SA\Http\Requests\TipoAreaRequest;
use SA\Http\Controllers\Controller;
use SA\Http\Controllers\Response;
use SA\Repositories\TipoAreaRepository;



class TipoAreasController extends Controller
{

    /**
     * @var TipoAreaRepository
     */
    protected $repository;


    public function __construct(TipoAreaRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->applyMultitenancy();
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
     * @param  TipoAreaRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoAreaRequest $request)
    {
        $tipoArea = $this->repository->create($request->all());
        return response()->json($tipoArea, 201);
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
        return $this->repository->find($id); //Esse find correspondente a findOrFail()
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TipoAreaRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoAreaRequest $request, $id)
    {
        $tipoArea = $this->repository->update($request->all(), $id);
        return response()->json($tipoArea, 200);
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

        return redirect()->back()->with('message', 'Tipo área deleted.');
    }
}
