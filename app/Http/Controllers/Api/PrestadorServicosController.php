<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\PrestadorServicoCreateRequest;
use SA\Http\Requests\PrestadorServicoUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\PrestadorServicoRepository;



class PrestadorServicosController extends Controller
{

    /**
     * @var PrestadorServicoRepository
     */
    protected $repository;

    public function __construct(PrestadorServicoRepository $repository)
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
        return $this->repository->with('tipoServico')->with('banco')->with('tipoConta')->all();
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
        $prestadorServico = $this->repository->find($id);
        return response()->json($prestadorServico, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  PrestadorServicoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PrestadorServicoCreateRequest $request)
    {
        $prestadorServico = $this->repository->create($request->all());
        return response()->json($prestadorServico, 201);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  PrestadorServicoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PrestadorServicoUpdateRequest $request, $id)
    {
        $prestadorServico = $this->repository->update($request->all(), $id);
        return response()->json($prestadorServico, 200);
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

        return redirect()->back()->with('message', 'Prestador de Serviço deleted.');
    }
}
