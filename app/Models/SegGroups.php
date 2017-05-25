<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SegGroups extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'description'
    ];

    public function segGroupsApps()
    {
        return $this->hasMany(SegGroupsApps::class, 'group_id', 'id');
    }

}
