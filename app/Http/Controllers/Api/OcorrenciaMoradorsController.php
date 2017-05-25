<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use SA\Http\Controllers\Controller;
use SA\Http\Requests\OcorrenciaMoradorCreateRequest;
use SA\Http\Requests\OcorrenciaMoradorUpdateRequest;
use SA\Repositories\OcorrenciaMoradorRepository;



class OcorrenciaMoradorsController extends Controller
{

    /**
     * @var OcorrenciaMoradorRepository
     */
    protected $repository;


    public function __construct(OcorrenciaMoradorRepository $repository)
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
        $ocorrencia_morador = $this->repository->find($id);
        $ocorrencia_morador->ocorrenciaMorador;
        return response()->json($ocorrencia_morador, 201);
        //$user = $this->repository->with(['segUserGroups'])->find($id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  OcorrenciaMoradorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(OcorrenciaMoradorCreateRequest $request)
    {
        $ocorrencia_morador = $this->repository->create($request->all());
        return response()->json($ocorrencia_morador, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  OcorrenciaMoradorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(OcorrenciaMoradorUpdateRequest $request, $id)
    {
        $ocorrencia_morador = $this->repository->update($request->all(), $id);
        return response()->json($ocorrencia_morador, 200);
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

        return redirect()->back()->with('message', 'Ocorrência Morador deleted.');
    }
}
