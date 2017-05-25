<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\SegGroupsApps;

/**
 * Class SegGroupsAppsTransformer
 * @package namespace SA\Transformers;
 */
class SegGroupsAppsTransformer extends TransformerAbstract
{

    /**
     * Transform the \SegGroupsAppsTableSeeder entity
     * @param \SegGroupsAppsTableSeeder $model
     *
     * @return array
     */
    public function transform(SegGroupsApps $model)
    {
        return [
            'id'          => (int) $model->id,
            'group_id'    => (int) $model->group_id,
            'seg_apps_id' => $model->seg_apps_id,
            'priv_access' => $model->priv_access,
            'priv_insert' => $model->priv_insert,
            'priv_delete' => $model->priv_delete,
            'priv_update' => $model->priv_update,
            'priv_export' => $model->priv_export,
            'priv_print' => $model->priv_print,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
