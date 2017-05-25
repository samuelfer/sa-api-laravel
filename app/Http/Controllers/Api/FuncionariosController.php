<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\FuncionarioCreateRequest;
use SA\Http\Requests\FuncionarioUpdateRequest;
use SA\Repositories\FuncionarioRepository;
use SA\Validators\FuncionarioValidator;


class FuncionariosController extends Controller
{

    /**
     * @var FuncionarioRepository
     */
    protected $repository;

    /**
     * @var FuncionarioValidator
     */
    protected $validator;

    public function __construct(FuncionarioRepository $repository, FuncionarioValidator $validator)
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
        $funcionarios = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $funcionarios,
            ]);
        }

        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FuncionarioCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $funcionario = $this->repository->create($request->all());

            $response = [
                'message' => 'Funcionario created.',
                'data'    => $funcionario->toArray(),
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
        $funcionario = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $funcionario,
            ]);
        }

        return view('funcionarios.show', compact('funcionario'));
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

        $funcionario = $this->repository->find($id);

        return view('funcionarios.edit', compact('funcionario'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  FuncionarioUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(FuncionarioUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $funcionario = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Funcionario updated.',
                'data'    => $funcionario->toArray(),
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
                'message' => 'Funcionario deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Funcionario deleted.');
    }
}
