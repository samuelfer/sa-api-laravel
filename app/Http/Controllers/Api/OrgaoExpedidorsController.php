<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\OrgaoExpedidorCreateRequest;
use SA\Http\Requests\OrgaoExpedidorUpdateRequest;
use SA\Repositories\OrgaoExpedidorRepository;
use SA\Validators\OrgaoExpedidorValidator;


class OrgaoExpedidorsController extends Controller
{

    /**
     * @var OrgaoExpedidorRepository
     */
    protected $repository;

    /**
     * @var OrgaoExpedidorValidator
     */
    protected $validator;

    public function __construct(OrgaoExpedidorRepository $repository, OrgaoExpedidorValidator $validator)
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
        $orgaoExpedidors = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $orgaoExpedidors,
            ]);
        }

        return view('orgaoExpedidors.index', compact('orgaoExpedidors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OrgaoExpedidorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(OrgaoExpedidorCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $orgaoExpedidor = $this->repository->create($request->all());

            $response = [
                'message' => 'OrgaoExpedidor created.',
                'data'    => $orgaoExpedidor->toArray(),
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
        $orgaoExpedidor = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $orgaoExpedidor,
            ]);
        }

        return view('orgaoExpedidors.show', compact('orgaoExpedidor'));
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

        $orgaoExpedidor = $this->repository->find($id);

        return view('orgaoExpedidors.edit', compact('orgaoExpedidor'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  OrgaoExpedidorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(OrgaoExpedidorUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $orgaoExpedidor = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'OrgaoExpedidor updated.',
                'data'    => $orgaoExpedidor->toArray(),
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
                'message' => 'OrgaoExpedidor deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'OrgaoExpedidor deleted.');
    }
}
