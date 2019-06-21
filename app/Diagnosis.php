<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Analysis;
use App\Disease;
use App\Parade;
use App\Medicine;

class Diagnosis extends Model
{
    private $id;
    private $note;


        public function Setid($id)
    {
      
      $this->id = $id;

    }

    public function Getid()
    {

        return $this->id;
    }



        public function Setnote($note)
    {
      
      $this->note = $note;

    }

    public function Getnote()
    {

        return $this->note;
    }
}
