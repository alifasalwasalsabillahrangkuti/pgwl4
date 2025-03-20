<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PolylinesModel extends Model
{
    protected $table = 'polylines';

    protected $guarded = ['id'];
    public function gejson_points()
    {
        $points = $this->select(DB::raw('id, ST_AsGeoJSON(geom) as geom, name, description,created_at,update_at'))
    }
}
