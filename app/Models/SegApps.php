<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SegApps extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'app_name',
        'app_type',
        'description'
    ];

    //
//    public function segGrupoApps()
//    {
//        return $this->belongsToMany(SegGroupsAppsTableSeeder::class, 'seg_groups_apps', 'seg_apps_id', 'id');
//    }

}
