<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;


#[Fillable(['app_name','copyright','login_title','keywoards','description','logo'])]
class Setting extends Model
{

}
