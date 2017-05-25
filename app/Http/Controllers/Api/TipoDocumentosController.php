<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\TipoDocumentoRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\TipoDocumentoRepository;



class TipoDocumentosController extends Controller
{

    /**
     * @var TipoDocumentoRepository
     */
    protected $repository;

    /**
     * @var TipoDocumentoValidator
     */
    protected $validator;

    public function __construct(TipoDocumentoRepository $repository)
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
     * @param  TipoDocumentoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoDocumentoRequest $request)
    {
        $tipoDocumento = $this->repository->create($request->all());
        return response()->json($tipoDocumento, 201);
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
     * @param  TipoDocumentoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoDocumentoUpdateRequest $request, $id)
    {
        $tipoDocumento = $this->repository->update($request->all(), $id);
        return response()->json($tipoDocumento, 200);
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

        return redirect()->back()->with('message', 'Tipo documento deleted.');
    }
}
