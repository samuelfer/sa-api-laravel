<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\MultaNotificacaoCreateRequest;
use SA\Http\Requests\MultaNotificacaoUpdateRequest;
use SA\Repositories\MultaNotificacaoRepository;
use SA\Validators\MultaNotificacaoValidator;


class MultaNotificacaosController extends Controller
{

    /**
     * @var MultaNotificacaoRepository
     */
    protected $repository;

    /**
     * @var MultaNotificacaoValidator
     */
    protected $validator;

    public function __construct(MultaNotificacaoRepository $repository, MultaNotificacaoValidator $validator)
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
        $multaNotificacaos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $multaNotificacaos,
            ]);
        }

        return view('multaNotificacaos.index', compact('multaNotificacaos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MultaNotificacaoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MultaNotificacaoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $multaNotificacao = $this->repository->create($request->all());

            $response = [
                'message' => 'MultaNotificacao created.',
                'data'    => $multaNotificacao->toArray(),
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
        $multaNotificacao = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $multaNotificacao,
            ]);
        }

        return view('multaNotificacaos.show', compact('multaNotificacao'));
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

        $multaNotificacao = $this->repository->find($id);

        return view('multaNotificacaos.edit', compact('multaNotificacao'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MultaNotificacaoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(MultaNotificacaoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $multaNotificacao = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'MultaNotificacao updated.',
                'data'    => $multaNotificacao->toArray(),
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
                'message' => 'MultaNotificacao deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'MultaNotificacao deleted.');
    }
}
