<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Controllers\Controller;
use SA\Http\Requests\SegGroupsAppsCreateRequest;
use SA\Http\Requests\SegGroupsAppsUpdateRequest;
use SA\Repositories\SegGroupsAppsRepository;



class SegGroupsAppsController extends Controller
{

    /**
     * @var SegGroupsAppsRepository
     */
    protected $repository;

    public function __construct(SegGroupsAppsRepository $repository)
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
     * @param  SegGroupsAppsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SegGroupsAppsCreateRequest $request)
    {

        $apps = $this->repository->create($request->all());
        return response()->json($apps, 201);
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
        $gruposApps = $this->repository->find($id);
        //dd($gruposApps);
        return response()->json($gruposApps, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SegGroupsAppsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SegGroupsAppsUpdateRequest $request, $id)
    {
        $apps = $this->repository->update($request->all(), $id);
        return response()->json($apps, 200);
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

        return redirect()->back()->with('message', 'App deleted.');
    }
}
