<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\TipoDependenteCreateRequest;
use SA\Http\Requests\TipoDependenteUpdateRequest;
use SA\Repositories\TipoDependenteRepository;
use SA\Validators\TipoDependenteValidator;


class TipoDependentesController extends Controller
{

    /**
     * @var TipoDependenteRepository
     */
    protected $repository;

    /**
     * @var TipoDependenteValidator
     */
    protected $validator;

    public function __construct(TipoDependenteRepository $repository, TipoDependenteValidator $validator)
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
        $tipoDependentes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoDependentes,
            ]);
        }

        return view('tipoDependentes.index', compact('tipoDependentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoDependenteCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoDependenteCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $tipoDependente = $this->repository->create($request->all());

            $response = [
                'message' => 'TipoDependente created.',
                'data'    => $tipoDependente->toArray(),
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
        $tipoDependente = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoDependente,
            ]);
        }

        return view('tipoDependentes.show', compact('tipoDependente'));
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

        $tipoDependente = $this->repository->find($id);

        return view('tipoDependentes.edit', compact('tipoDependente'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TipoDependenteUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoDependenteUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $tipoDependente = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'TipoDependente updated.',
                'data'    => $tipoDependente->toArray(),
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
                'message' => 'TipoDependente deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TipoDependente deleted.');
    }
}
