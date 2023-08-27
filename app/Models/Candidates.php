<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Candidates extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 't_candidates';

    protected $guarded = [];

    public function getDataTable($params = null, $search = '', $searchCol = '', $extraParam = null)
    {
        if (!$params)
            return response()->json([], 400);

        $start = (isset($params['start'])) ? $params['start'] : 0;
        $length = (isset($params['length'])) ? $params['length'] : 0;
        $field = (isset($params['field'])) ? $params['field'] : 'id';
        $sort = (isset($params['sort'])) ? $params['sort'] : 'asc';
        $count = (isset($params['count'])) ? $params['count'] : false;

        $result = DB::table(DB::raw($this->table));

        if (!$count) {
            $result = $result->select(DB::raw("id, full_name, email, phone_number, created_at"));
        }

        if (!empty($search)) {
            $querySearch = str_replace(' ', '%', $search);
            $result = $result->where(DB::raw($searchCol), 'like', '%' . $querySearch . '%');
        }

        if ($count) {
            return $result->count('id');
        } else {
            return $result->offset($start)->limit($length)->orderBy($field, $sort)->get();
        }
    }
}
