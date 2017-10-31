<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sales;
class Cartgood extends Model
{
    protected $table='cartgood';
    public  function getGood(){
        return Goods::where('id',$this->id_good)->first();
    }
    public function getShopper(){
        $sal=Sales::where('id',$this->id_sales)->first();
        if($sal){
            $u= User::where('id',$sal->id_user)->first();
            if($u){
                return $u;
            }
            else{
                return 0;
            }
        }
    }
    public function getSeller(){
        $good=Goods::where('id',$this->id_good)->first();
        if($good){
            $u= User::where('id',$good->id_user)->first();
            if($u){
                return $u;
            }
            else{
                return 0;
            }
        }
    }
}
