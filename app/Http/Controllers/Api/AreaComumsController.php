<?php

namespace SA\Http\Controllers\Api;



use SA\Http\Requests\AreaComumRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\AreaComumRepository;



class AreaComumsController extends Controller
{

    /**
     * @var AreaComumRepository
     */
    protected $repository;

    public function __construct(AreaComumRepository $repository)
    {
        $this->repository = $repository;
        //$this->repository->applyMultitenancy();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->with('areaPai')->with('tipoArea')->all();
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
        $areaComum = $this->repository->find($id); //Esse find correspondente a findOrFail()
        $areaComum->areaPai;
        $areaComum->tipoArea;
        return response()->json($areaComum, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  AreaComumRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AreaComumRequest $request)
    {
        $areaComum = $this->repository->create($request->all());
        return response()->json($areaComum, 201);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  AreaComumRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AreaComumRequest $request, $id)
    {
        $areaComum = $this->repository->update($request->all(), $id);
        return response()->json($areaComum, 200);
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

        return redirect()->back()->with('message', 'Area comum deleted.');
    }
}
