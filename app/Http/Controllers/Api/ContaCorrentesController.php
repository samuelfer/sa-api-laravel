<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\ContaCorrenteCreateRequest;
use SA\Http\Requests\ContaCorrenteUpdateRequest;
use SA\Repositories\ContaCorrenteRepository;
use SA\Validators\ContaCorrenteValidator;


class ContaCorrentesController extends Controller
{

    /**
     * @var ContaCorrenteRepository
     */
    protected $repository;

    /**
     * @var ContaCorrenteValidator
     */
    protected $validator;

    public function __construct(ContaCorrenteRepository $repository, ContaCorrenteValidator $validator)
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
        $contaCorrentes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contaCorrentes,
            ]);
        }

        return view('contaCorrentes.index', compact('contaCorrentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContaCorrenteCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ContaCorrenteCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $contaCorrente = $this->repository->create($request->all());

            $response = [
                'message' => 'ContaCorrente created.',
                'data'    => $contaCorrente->toArray(),
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
        $contaCorrente = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contaCorrente,
            ]);
        }

        return view('contaCorrentes.show', compact('contaCorrente'));
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

        $contaCorrente = $this->repository->find($id);

        return view('contaCorrentes.edit', compact('contaCorrente'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ContaCorrenteUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ContaCorrenteUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $contaCorrente = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ContaCorrente updated.',
                'data'    => $contaCorrente->toArray(),
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
                'message' => 'ContaCorrente deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ContaCorrente deleted.');
    }
}
