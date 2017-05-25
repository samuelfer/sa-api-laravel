<?php

namespace SA\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Bloco extends Model implements Transformable
{
    use TransformableTrait;
    //use BelongsToTenants;Isso pesquisa pelo id do bloco criado pelo usuario

    protected $fillable = [
        'de_bloco'
    ];

    protected $hidden = ['created_at', 'updated_at'];

}
