<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\ApagarCreateRequest;
use SA\Http\Requests\ApagarUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\ApagarRepository;



class ApagarsController extends Controller
{

    /**
     * @var ApagarRepository
     */
    protected $repository;

    public function __construct(ApagarRepository $repository)
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
     * @param  ApagarCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ApagarCreateRequest $request)
    {
        $apagar = $this->repository->create($request->all());
        return response()->json($apagar, 201);
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
        return $this->repository->findByField('id_apagar', $id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ApagarUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ApagarUpdateRequest $request, $id)
    {
        $apagar = $this->repository->update($request->all(), $id);
        return response()->json($apagar, 200);
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

        return redirect()->back()->with('message', 'Conta deleted.');
    }
}
