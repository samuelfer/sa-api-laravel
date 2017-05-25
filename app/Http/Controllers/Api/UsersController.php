<?php

namespace SA\Http\Controllers\Api;

use SA\Http\Controllers\Controller;
use SA\Http\Controllers\Response;
use SA\Http\Requests\UserRequest;
use SA\Repositories\UserRepository;


class UsersController extends Controller
{
    private $repository;
    //private $grupo;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
        //$this->grupo = $grupo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->all();
       // return $this->grupo->all();
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

       $user = $this->repository->find($id);
       //$user->segUserGroups->group_id;
       return response()->json($user, 201);
       //$user = $this->repository->with(['segUserGroups'])->find($id);
    }


    public function store(UserRequest $request)
    {
        $user = $this->repository->create($request->all());
        return response()->json($user, 201);
    }

    public function getName(){
        $user = $this->repository->all(['id', 'login']);
        return response()->json($user, 201);
        //public function find($id, $columns = ['*']);
    }
}
