<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SegGroupsApps extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [

        'group_id',
        'seg_apps_id',
        'priv_access',
        'priv_insert',
        'priv_delete',
        'priv_update',
        'priv_export',
        'priv_print'
    ];

//    //Pegar as aplicações do grupo de usuario
//    public function apps()
//    {
//        return $this->belongsToMany(SegGroupsApps::class, 'seg_groups_apps', 'seg_apps_id', 'id');
//    }

}
