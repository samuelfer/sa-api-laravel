<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;
use SA\Http\Requests\SegUsersGroupsCreateRequest;
use SA\Http\Requests\SegUsersGroupsUpdateRequest;
use SA\Repositories\SegUsersGroupsRepository;
use SA\Http\Controllers\Controller;


class SegUsersGroupsController extends Controller
{

    /**
     * @var SegUsersGroupsRepository
     */
    protected $repository;

    public function __construct(SegUsersGroupsRepository $repository)
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
     * @param  SegUsersGroupsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SegUsersGroupsCreateRequest $request)
    {

        $grupoUsuario = $this->repository->create($request->all());
        return response()->json($grupoUsuario, 201);
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
        $appGrupo = $this->repository->find($id);
        $appGrupo->apps;
        return response()->json($appGrupo, 201);
        //return $this->repository->find($id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $segUsersGroup = $this->repository->find($id);

        return view('segUsersGroups.edit', compact('segUsersGroup'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SegUsersGroupsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SegUsersGroupsUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $segUsersGroup = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'SegUsersGroups updated.',
                'data'    => $segUsersGroup->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'SegUsersGroups deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SegUsersGroups deleted.');
    }
}
