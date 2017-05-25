<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\RestricaoCreateRequest;
use SA\Http\Requests\RestricaoUpdateRequest;
use SA\Repositories\RestricaoRepository;
use SA\Validators\RestricaoValidator;


class RestricaosController extends Controller
{

    /**
     * @var RestricaoRepository
     */
    protected $repository;

    /**
     * @var RestricaoValidator
     */
    protected $validator;

    public function __construct(RestricaoRepository $repository, RestricaoValidator $validator)
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
        $restricaos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $restricaos,
            ]);
        }

        return view('restricaos.index', compact('restricaos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RestricaoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RestricaoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $restricao = $this->repository->create($request->all());

            $response = [
                'message' => 'Restricao created.',
                'data'    => $restricao->toArray(),
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
        $restricao = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $restricao,
            ]);
        }

        return view('restricaos.show', compact('restricao'));
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

        $restricao = $this->repository->find($id);

        return view('restricaos.edit', compact('restricao'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  RestricaoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(RestricaoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $restricao = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Restricao updated.',
                'data'    => $restricao->toArray(),
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
                'message' => 'Restricao deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Restricao deleted.');
    }
}
