<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

interface Subject
{
     public function registerObserver($observer);
     public function removeObserver($observer);
     public function notifyObservers($title,$message);
}