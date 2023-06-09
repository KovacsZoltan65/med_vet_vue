<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Human extends Model {

    use HasFactory,
        SoftDeletes;

    protected $table = 'humans';
    protected $fillable = ['name', 'type_id', 'mod_u_id'];

    public function humanType(): HasOne {
        return $this->hasOne(HumanType::class, 'id', 'type_id');
    }

}
