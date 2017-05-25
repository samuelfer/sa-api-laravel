<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\TelefoneCreateRequest;
use SA\Http\Requests\TelefoneUpdateRequest;
use SA\Repositories\TelefoneRepository;
use SA\Validators\TelefoneValidator;


class TelefonesController extends Controller
{

    /**
     * @var TelefoneRepository
     */
    protected $repository;

    /**
     * @var TelefoneValidator
     */
    protected $validator;

    public function __construct(TelefoneRepository $repository, TelefoneValidator $validator)
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
        $telefones = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $telefones,
            ]);
        }

        return view('telefones.index', compact('telefones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TelefoneCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TelefoneCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $telefone = $this->repository->create($request->all());

            $response = [
                'message' => 'Telefone created.',
                'data'    => $telefone->toArray(),
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
        $telefone = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $telefone,
            ]);
        }

        return view('telefones.show', compact('telefone'));
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

        $telefone = $this->repository->find($id);

        return view('telefones.edit', compact('telefone'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TelefoneUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TelefoneUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $telefone = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Telefone updated.',
                'data'    => $telefone->toArray(),
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
                'message' => 'Telefone deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Telefone deleted.');
    }
}
