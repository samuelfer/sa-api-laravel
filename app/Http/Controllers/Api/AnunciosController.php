<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;

use SA\Http\Requests\AnuncioRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\AnuncioRepository;



class AnunciosController extends Controller
{

    /**
     * @var AnuncioRepository
     */
    protected $repository;


    public function __construct(AnuncioRepository $repository)
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
     * @param  AnuncioCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AnuncioRequest $request)
    {

        $anuncio = $this->repository->create($request->all());
        return response()->json($anuncio, 201);
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
        return $this->repository->findByField('id_anuncio', $id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AnuncioUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AnuncioUpdateRequest $request, $id)
    {

        $anuncio = $this->repository->update($request->all(), $id);
        return response()->json($anuncio, 200);
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

        return redirect()->back()->with('message', 'Anuncio deleted.');
    }
}
