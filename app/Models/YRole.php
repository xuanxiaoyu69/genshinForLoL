<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class YRole extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'y_role';
    
}
