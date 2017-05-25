<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\DependentesCreateRequest;
use SA\Http\Requests\DependentesUpdateRequest;
use SA\Repositories\DependentesRepository;
use SA\Validators\DependentesValidator;


class DependentesController extends Controller
{

    /**
     * @var DependentesRepository
     */
    protected $repository;

    /**
     * @var DependentesValidator
     */
    protected $validator;

    public function __construct(DependentesRepository $repository, DependentesValidator $validator)
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
        $dependentes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $dependentes,
            ]);
        }

        return view('dependentes.index', compact('dependentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DependentesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DependentesCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $dependente = $this->repository->create($request->all());

            $response = [
                'message' => 'Dependentes created.',
                'data'    => $dependente->toArray(),
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
        $dependente = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $dependente,
            ]);
        }

        return view('dependentes.show', compact('dependente'));
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

        $dependente = $this->repository->find($id);

        return view('dependentes.edit', compact('dependente'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  DependentesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(DependentesUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $dependente = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Dependentes updated.',
                'data'    => $dependente->toArray(),
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
                'message' => 'Dependentes deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Dependentes deleted.');
    }
}
