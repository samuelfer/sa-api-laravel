<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Controllers\Controller;
use SA\Http\Requests\SegAppsCreateRequest;
use SA\Http\Requests\SegAppsUpdateRequest;
use SA\Repositories\SegAppsRepository;



class SegAppsController extends Controller
{

    /**
     * @var SegAppsRepository
     */
    protected $repository;

    public function __construct(SegAppsRepository $repository)
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
     * @param  SegAppsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SegAppsCreateRequest $request)
    {
        $app = $this->repository->create($request->all());
        return response()->json($app, 201);
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
        $apps = $this->repository->find($id);
        return response()->json($apps, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SegAppsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SegAppsUpdateRequest $request, $id)
    {
        $app = $this->repository->update($request->all(), $id);
        return response()->json($app, 200);
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

        return redirect()->back()->with('message', 'App deleted.');
    }
}
