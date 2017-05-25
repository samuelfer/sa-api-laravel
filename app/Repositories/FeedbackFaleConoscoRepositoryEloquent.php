<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\FeedbackFaleConoscoRepository;
use SA\Models\FeedbackFaleConosco;
use SA\Validators\FeedbackFaleConoscoValidator;

/**
 * Class FeedbackFaleConoscoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class FeedbackFaleConoscoRepositoryEloquent extends BaseRepository implements FeedbackFaleConoscoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FeedbackFaleConosco::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
