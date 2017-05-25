<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;

use SA\Http\Requests\AnimalCreateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\AnimalRepository;



class AnimalsController extends Controller
{

    /**
     * @var AnimalRepository
     */
    protected $repository;


    public function __construct(AnimalRepository $repository)
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
        return $this->repository->with('raca')->with('especie')->with('bloco')->all();
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
        //return $this->repository->findByField('id_animal', $id);
        $animal =  $this->repository->find($id);
        $animal->raca;
        $animal->especie;
        $animal->bloco;
        return response()->json($animal, 201);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AnimalCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalCreateRequest $request)
    {
        $animal = $this->repository->create($request->all());
        return response()->json($animal, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AnimalUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AnimalUpdateRequest $request, $id)
    {

        $animal = $this->repository->update($request->all(), $id);
        return response()->json($animal, 200);
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

        return redirect()->back()->with('message', 'Animal deleted.');
    }
}
