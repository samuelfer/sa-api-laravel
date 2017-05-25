<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\HistoricoCreateRequest;
use SA\Http\Requests\HistoricoUpdateRequest;
use SA\Repositories\HistoricoRepository;
use SA\Validators\HistoricoValidator;


class HistoricosController extends Controller
{

    /**
     * @var HistoricoRepository
     */
    protected $repository;

    /**
     * @var HistoricoValidator
     */
    protected $validator;

    public function __construct(HistoricoRepository $repository, HistoricoValidator $validator)
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
        $historicos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $historicos,
            ]);
        }

        return view('historicos.index', compact('historicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HistoricoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(HistoricoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $historico = $this->repository->create($request->all());

            $response = [
                'message' => 'Historico created.',
                'data'    => $historico->toArray(),
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
        $historico = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $historico,
            ]);
        }

        return view('historicos.show', compact('historico'));
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

        $historico = $this->repository->find($id);

        return view('historicos.edit', compact('historico'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  HistoricoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(HistoricoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $historico = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Historico updated.',
                'data'    => $historico->toArray(),
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
                'message' => 'Historico deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Historico deleted.');
    }
}
