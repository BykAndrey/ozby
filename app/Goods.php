<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table="goods";
    public function getSeller(){
        $u=User::where('id',$this->id_user)->first();
        if($u){
            return $u->name;
        }
        else{
            return 'No name';
        }

    }

}
