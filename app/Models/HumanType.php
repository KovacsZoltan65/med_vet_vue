<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HumanType extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'human_types';
    protected $fillable = ['name', 'mod_u_id'];
    
    public function humans(): HasMany{
        return $this->hasMany(Human::class, 'type_id', 'id');
    }
}
