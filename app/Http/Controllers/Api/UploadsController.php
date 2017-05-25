<?php

namespace SA\Http\Controllers\Api;



use SA\Http\Requests\UploadCreateRequest;
use SA\Http\Requests\UploadUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\UploadRepository;



class UploadsController extends Controller
{

    /**
     * @var UploadRepository
     */
    protected $repository;


    public function __construct(UploadRepository $repository)
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
        return $this->repository->with('tipoUpload')->all();
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
        $upload = $this->repository->find($id);
        $upload->tipoUpload;
        return response()->json($upload, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UploadCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UploadCreateRequest $request)
    {
        $upload = $this->repository->create($request->all());
        return response()->json($upload, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UploadUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UploadUpdateRequest $request, $id)
    {
        $upload = $this->repository->update($request->all(), $id);
        return response()->json($upload, 200);
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

        return redirect()->back()->with('message', 'Documento deleted.');
    }
}
