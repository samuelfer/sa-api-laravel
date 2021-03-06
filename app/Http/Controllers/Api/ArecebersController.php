<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\AreceberRequest;
//use SA\Http\Requests\AreceberUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\AreceberRepository;


class ArecebersController extends Controller
{

    /**
     * @var AreceberRepository
     */
    protected $repository;


    public function __construct(AreceberRepository $repository)
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
     * @param  AreceberCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AreceberCreateRequest $request)
    {

        $areceber = $this->repository->create($request->all());
        return response()->json($areceber, 201);
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
        return $this->repository->findByField('id_areceber', $id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AreceberUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AreceberUpdateRequest $request, $id)
    {

        $areceber = $this->repository->update($request->all(), $id);
        return response()->json($areceber, 200);
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
