<?php

namespace SA\Http\Controllers\Api;

use SA\Http\Requests\AvisoCreateRequest;
use SA\Http\Requests\AvisoUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\AvisoRepository;



class AvisosController extends Controller
{

    /**
     * @var AvisoRepository
     */
    protected $repository;


    public function __construct(AvisoRepository $repository)
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
     * @param  AvisoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AvisoCreateRequest $request)
    {
        $aviso = $this->repository->create($request->all());
        return response()->json($aviso, 201);
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
        return $this->repository->findByField('id_aviso', $id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AvisoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AvisoUpdateRequest $request, $id)
    {

        $aviso = $this->repository->update($request->all(), $id);
        return response()->json($aviso, 200);
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

        return redirect()->back()->with('message', 'Aviso deleted.');
    }
}
