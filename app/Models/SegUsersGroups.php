<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SegUsersGroups extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'login',
        'group_id'
    ];

    protected $hidden = [
         'user_id','login', 'created_at', 'updated_at'
    ];

//    //Pegar o grupo do usuario logado
    public function apps()
    {
        return $this->hasMany(SegGroupsApps::class, 'group_id', 'id');
    }

}
