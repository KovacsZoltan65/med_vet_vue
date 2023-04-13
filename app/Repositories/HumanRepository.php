<?php

namespace App\Repositories;

use App\Criteria\HumanCriteria;
use App\Models\Human;
use App\Repositories\BaseRepository;

/**
 * Class HumanRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HumanRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Human::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(HumanCriteria::class));
    }
    
}
