<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model {

    use HasFactory,
        SoftDeletes;

    protected $table = 'offices';
    protected $fillable = ['name', 'type_id', 'mod_u_id'];

    public function officeType(): HasOne {
        return $this->hasOne(OfficeType::class, 'id', 'type_id');
    }

}
