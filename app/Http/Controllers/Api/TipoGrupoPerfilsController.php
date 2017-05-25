<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\TipoGrupoPerfilCreateRequest;
use SA\Http\Requests\TipoGrupoPerfilUpdateRequest;
use SA\Repositories\TipoGrupoPerfilRepository;
use SA\Validators\TipoGrupoPerfilValidator;


class TipoGrupoPerfilsController extends Controller
{

    /**
     * @var TipoGrupoPerfilRepository
     */
    protected $repository;

    /**
     * @var TipoGrupoPerfilValidator
     */
    protected $validator;

    public function __construct(TipoGrupoPerfilRepository $repository, TipoGrupoPerfilValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $tipoGrupoPerfils = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoGrupoPerfils,
            ]);
        }

        return view('tipoGrupoPerfils.index', compact('tipoGrupoPerfils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoGrupoPerfilCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoGrupoPerfilCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $tipoGrupoPerfil = $this->repository->create($request->all());

            $response = [
                'message' => 'TipoGrupoPerfil created.',
                'data'    => $tipoGrupoPerfil->toArray(),
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoGrupoPerfil = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoGrupoPerfil,
            ]);
        }

        return view('tipoGrupoPerfils.show', compact('tipoGrupoPerfil'));
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

        $tipoGrupoPerfil = $this->repository->find($id);

        return view('tipoGrupoPerfils.edit', compact('tipoGrupoPerfil'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TipoGrupoPerfilUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoGrupoPerfilUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $tipoGrupoPerfil = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'TipoGrupoPerfil updated.',
                'data'    => $tipoGrupoPerfil->toArray(),
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
                'message' => 'TipoGrupoPerfil deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TipoGrupoPerfil deleted.');
    }
}
