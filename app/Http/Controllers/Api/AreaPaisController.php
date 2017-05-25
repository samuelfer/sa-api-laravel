<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;

use SA\Http\Requests\AreaPaiRequest;
use SA\Http\Controllers\Response;
use SA\Http\Controllers\Controller;
use SA\Repositories\AreaPaiRepository;



class AreaPaisController extends Controller
{

    /**
     * @var AreaPaiRepository
     */
    protected $repository;


    public function __construct(AreaPaiRepository $repository)
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
     * @param  AreaPaiCRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AreaPaiRequest $request)
    {
        $arePai = $this->repository->create($request->all());
        return response()->json($arePai, 201);
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
     * @param  AreaPaiUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AreaPaiRequest $request, $id)
    {
        $areaPai = $this->repository->update($request->all(), $id);
        return response()->json($areaPai, 200);
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

        return redirect()->back()->with('message', 'Area pai deleted.');
    }
}
