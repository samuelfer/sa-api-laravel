<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\TipoReceitaCreateRequest;
use SA\Http\Requests\TipoReceitaUpdateRequest;
use SA\Repositories\TipoReceitaRepository;
use SA\Validators\TipoReceitaValidator;


class TipoReceitasController extends Controller
{

    /**
     * @var TipoReceitaRepository
     */
    protected $repository;

    /**
     * @var TipoReceitaValidator
     */
    protected $validator;

    public function __construct(TipoReceitaRepository $repository, TipoReceitaValidator $validator)
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
        $tipoReceitas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoReceitas,
            ]);
        }

        return view('tipoReceitas.index', compact('tipoReceitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoReceitaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoReceitaCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $tipoReceitum = $this->repository->create($request->all());

            $response = [
                'message' => 'TipoReceita created.',
                'data'    => $tipoReceitum->toArray(),
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
        $tipoReceitum = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoReceitum,
            ]);
        }

        return view('tipoReceitas.show', compact('tipoReceitum'));
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

        $tipoReceitum = $this->repository->find($id);

        return view('tipoReceitas.edit', compact('tipoReceitum'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TipoReceitaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoReceitaUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $tipoReceitum = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'TipoReceita updated.',
                'data'    => $tipoReceitum->toArray(),
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
                'message' => 'TipoReceita deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TipoReceita deleted.');
    }
}
