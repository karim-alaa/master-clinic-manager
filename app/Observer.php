<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

interface Observer 
{
     public function classupdate($noifier_id,$title,$message);
}
