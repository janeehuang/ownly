<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class light_notes extends Model{
    protected $table = 'light_notes';

    protected $primaryKey = 'id';

    protected $fillable = ['hap_time','title','content'];
}
