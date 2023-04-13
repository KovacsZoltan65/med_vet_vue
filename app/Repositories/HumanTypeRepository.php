<?php

namespace App\Repositories;

use App\Criteria\HumanTypeCriteria;
use App\Models\HumanType;
use App\Repositories\BaseRepository;

/**
 * Class HumanRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HumanTypeRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HumanType::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(HumanTypeCriteria::class));
    }
    
}
