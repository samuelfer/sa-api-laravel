<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\OcorrenciaPorteiroCreateRequest;
use SA\Http\Requests\OcorrenciaPorteiroUpdateRequest;
use SA\Repositories\OcorrenciaPorteiroRepository;
use SA\Validators\OcorrenciaPorteiroValidator;


class OcorrenciaPorteirosController extends Controller
{

    /**
     * @var OcorrenciaPorteiroRepository
     */
    protected $repository;

    /**
     * @var OcorrenciaPorteiroValidator
     */
    protected $validator;

    public function __construct(OcorrenciaPorteiroRepository $repository, OcorrenciaPorteiroValidator $validator)
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
        $ocorrenciaPorteiros = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ocorrenciaPorteiros,
            ]);
        }

        return view('ocorrenciaPorteiros.index', compact('ocorrenciaPorteiros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OcorrenciaPorteiroCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(OcorrenciaPorteiroCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $ocorrenciaPorteiro = $this->repository->create($request->all());

            $response = [
                'message' => 'OcorrenciaPorteiro created.',
                'data'    => $ocorrenciaPorteiro->toArray(),
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
        $ocorrenciaPorteiro = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ocorrenciaPorteiro,
            ]);
        }

        return view('ocorrenciaPorteiros.show', compact('ocorrenciaPorteiro'));
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

        $ocorrenciaPorteiro = $this->repository->find($id);

        return view('ocorrenciaPorteiros.edit', compact('ocorrenciaPorteiro'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  OcorrenciaPorteiroUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(OcorrenciaPorteiroUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ocorrenciaPorteiro = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'OcorrenciaPorteiro updated.',
                'data'    => $ocorrenciaPorteiro->toArray(),
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
                'message' => 'OcorrenciaPorteiro deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'OcorrenciaPorteiro deleted.');
    }
}
