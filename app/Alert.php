<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class  Alert extends Model 
{
    abstract public function Send($opj);


}
