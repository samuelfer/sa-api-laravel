<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\TipoPerfilCreateRequest;
use SA\Http\Requests\TipoPerfilUpdateRequest;
use SA\Repositories\TipoPerfilRepository;
use SA\Validators\TipoPerfilValidator;


class TipoPerfilsController extends Controller
{

    /**
     * @var TipoPerfilRepository
     */
    protected $repository;

    /**
     * @var TipoPerfilValidator
     */
    protected $validator;

    public function __construct(TipoPerfilRepository $repository, TipoPerfilValidator $validator)
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
        $tipoPerfils = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoPerfils,
            ]);
        }

        return view('tipoPerfils.index', compact('tipoPerfils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoPerfilCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoPerfilCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $tipoPerfil = $this->repository->create($request->all());

            $response = [
                'message' => 'TipoPerfil created.',
                'data'    => $tipoPerfil->toArray(),
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
        $tipoPerfil = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoPerfil,
            ]);
        }

        return view('tipoPerfils.show', compact('tipoPerfil'));
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

        $tipoPerfil = $this->repository->find($id);

        return view('tipoPerfils.edit', compact('tipoPerfil'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TipoPerfilUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoPerfilUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $tipoPerfil = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'TipoPerfil updated.',
                'data'    => $tipoPerfil->toArray(),
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
                'message' => 'TipoPerfil deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TipoPerfil deleted.');
    }
}
