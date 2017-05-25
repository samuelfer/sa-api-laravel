<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\TipoUploadCreateRequest;
use SA\Http\Requests\TipoUploadUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\TipoUploadRepository;


class TipoUploadsController extends Controller
{

    /**
     * @var TipoUploadRepository
     */
    protected $repository;


    public function __construct(TipoUploadRepository $repository)
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
        $tipoUpload = $this->repository->find($id);
        return response()->json($tipoUpload, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoUploadCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoUploadCreateRequest $request)
    {
        $tipoUpload = $this->repository->create($request->all());
        return response()->json($tipoUpload, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TipoUploadUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoUploadUpdateRequest $request, $id)
    {
        $tipoUpload = $this->repository->update($request->all(), $id);
        return response()->json($tipoUpload, 200);
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

        return redirect()->back()->with('message', 'Tipo de Upload deleted.');
    }
}
