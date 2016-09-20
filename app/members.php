<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class users extends Model
{
    protected $table = 'member';

    protected $primaryKey = 'm_id';

    protected $fillable=['m_name'];





}
