<?php

namespace App\Repositories;

use App\Criteria\OfficeTypeCriteria;
use App\Models\OfficeType;
use App\Repositories\BaseRepository;

/**
 * Class OfficeTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OfficeTypeRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OfficeType::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(OfficeTypeCriteria::class));
    }
    
}
