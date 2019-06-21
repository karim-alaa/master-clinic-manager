<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workTime extends Model
{
    public $checks      = array();
    public $days        = array();
    public $patient_num = array();
    public $from        = array();
    public $to          = array();
}
