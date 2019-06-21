<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class  Subject extends Model 
{
    abstract public function registerObserver($observer);
    abstract public function removeObserver($observer);
    abstract public function notifyObservers($title,$message);
}
