<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\FeedbackFaleConoscoCreateRequest;
use SA\Http\Requests\FeedbackFaleConoscoUpdateRequest;
use SA\Repositories\FeedbackFaleConoscoRepository;
use SA\Validators\FeedbackFaleConoscoValidator;


class FeedbackFaleConoscosController extends Controller
{

    /**
     * @var FeedbackFaleConoscoRepository
     */
    protected $repository;

    /**
     * @var FeedbackFaleConoscoValidator
     */
    protected $validator;

    public function __construct(FeedbackFaleConoscoRepository $repository, FeedbackFaleConoscoValidator $validator)
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
        $feedbackFaleConoscos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $feedbackFaleConoscos,
            ]);
        }

        return view('feedbackFaleConoscos.index', compact('feedbackFaleConoscos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FeedbackFaleConoscoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackFaleConoscoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $feedbackFaleConosco = $this->repository->create($request->all());

            $response = [
                'message' => 'FeedbackFaleConosco created.',
                'data'    => $feedbackFaleConosco->toArray(),
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
        $feedbackFaleConosco = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $feedbackFaleConosco,
            ]);
        }

        return view('feedbackFaleConoscos.show', compact('feedbackFaleConosco'));
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

        $feedbackFaleConosco = $this->repository->find($id);

        return view('feedbackFaleConoscos.edit', compact('feedbackFaleConosco'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  FeedbackFaleConoscoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(FeedbackFaleConoscoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $feedbackFaleConosco = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'FeedbackFaleConosco updated.',
                'data'    => $feedbackFaleConosco->toArray(),
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
                'message' => 'FeedbackFaleConosco deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'FeedbackFaleConosco deleted.');
    }
}
