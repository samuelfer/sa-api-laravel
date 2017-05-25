<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;
use SA\Http\Controllers\Controller;
use SA\Http\Requests\SegGroupsCreateRequest;
use SA\Http\Requests\SegGroupsUpdateRequest;
use SA\Repositories\SegGroupsRepository;



class SegGroupsController extends Controller
{

    /**
     * @var SegGroupsRepository
     */
    protected $repository;


    public function __construct(SegGroupsRepository $repository)
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
     * @param  SegGroupsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SegGroupsCreateRequest $request)
    {

        $segGroup = $this->repository->create($request->all());
        return response()->json($segGroup, 201);
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
        $segGroup = $this->repository->find($id);
        $segGroup->segGroupsApps;
        return response()->json($segGroup, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SegGroupsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SegGroupsUpdateRequest $request, $id)
    {
        $segGroup = $this->repository->update($request->all(), $id);
        return response()->json($segGroup, 200);
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

        return redirect()->back()->with('message', 'Seg Grupo deleted.');
    }
}
