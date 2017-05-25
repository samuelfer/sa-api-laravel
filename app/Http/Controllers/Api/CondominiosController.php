<?php

namespace SA\Http\Controllers\APi;


use SA\Http\Requests\CondominioRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\CondominioRepository;



class CondominiosController extends Controller
{

    /**
     * @var CondominioRepository
     */
    protected $repository;


    public function __construct(CondominioRepository $repository)
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
     * @param  CondominioCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CondominioRequest $request)
    {

        $condominio = $this->repository->create($request->all());
        return response()->json($condominio, 201);
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
     * @param  CondominioUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CondominioUpdateRequest $request, $id)
    {
        $condominio = $this->repository->update($request->all(), $id);
        return response()->json($condominio, 200);
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

        return redirect()->back()->with('message', 'Condominio deleted.');
    }
}
