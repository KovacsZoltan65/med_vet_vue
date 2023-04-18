<?php

namespace App\Repositories;

use App\Criteria\OfficeCriteria;
use App\Models\Office;
use App\Repositories\BaseRepository;

/**
 * Class OfficeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OfficeRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Office::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(OfficeCriteria::class));
    }
    
}
