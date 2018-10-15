<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

use DB;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function edit($id, $data)
    {
        DB::table($this->table)->where('id', '=', $id)
            ->update($data);
    }
}
