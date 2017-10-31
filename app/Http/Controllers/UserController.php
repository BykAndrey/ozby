<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Goods;
use App\Cartgood;
use App\Sales;
class UserController extends Controller
{
    public $data=[];
    public function __construct()
    {   if(Auth::user()){
        $this->data['user'] = Auth::user();
    }
    }
    public function profile(){
        return view('user.profile',$this->data);
    }
    public function  listGoodProfile(){
        $this->data['goods']=Goods::where('id_user',Auth::user()->id)->get();
        return view('user.listgood',$this->data);
    }
    public  function  listPurchaseProfile(){
        $sales=Sales::where('id_user',Auth::user()->id)->get();
        $goods=[];
        foreach ($sales as $sal){
            $lg=Cartgood::where('id_sales',$sal->id)->get();
            foreach ( $lg as $good){
                $goods[]=$good;
            }
        }
        $this->data['goods']=$goods;
        return view('user.listcartgood',$this->data);
    }
    public  function  listSalesProfile(){

        $my_good=Goods::where('id_user',Auth::user()->id)->get();
        $goods=[];
        foreach ($my_good as $g){
            $lg=Cartgood::where('id_good',$g->id)->get();
            foreach ( $lg as $good){
                $goods[]=$good;
            }
        }
        $this->data['goods']=$goods;
        return view('user.listsalesgood',$this->data);
    }
}
