<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CurrentPrice extends Model
{
    protected $fillable =  ['id','damaged', 'regular', 'created_at', 'updated_at', 'date'];
	protected $table = 'current_prices';

    //
}
