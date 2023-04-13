<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\HumanTypeRepository;
use App\Entities\HumanType;
use App\Validators\HumanTypeValidator;

/**
 * Class HumanTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HumanTypeRepositoryEloquent extends BaseRepository implements HumanTypeRepository
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
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
