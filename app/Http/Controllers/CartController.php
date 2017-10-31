<?php

namespace App\Http\Controllers;

use App\Cartgood;
use App\Goods;
use App\Sales;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public $data=[];

    public function __construct()
    {
        if (Auth::user()) {
            $this->data['user'] = Auth::user();
        }
    }
    /*
     *
     *
     *  template:   [['id'=>1,'count'=>1]]
     *
     * */
    public function addToCart(Request $req){

        if( !$req->session()->has('cart.list')){
            $req->session()->put('cart.list',json_encode([

            ]));
        }
        $comment='';
        $ses=json_decode($req->session()->get('cart.list'));
        $good=Goods::where('id',$req->input('id'))->first();
        $count=$req->input('count');
        if(Auth::user()->id==$good->id_user){
            $comment="it your good";
            return ['comment'=>$comment];
        }
        if($count>$good->count){
            $comment="over allowed value ";
            return ['comment'=>$comment];
        }
        if($good){
            $flag=false;
            foreach ($ses as $s){
                if($s->id==$good->id){
                    $flag=true;
                        if($s->count+$count>=$good->count){
                            $s->count=$good->count;
                            $comment="Count of goods of this type was getting to max: ".$good->count;
                        }else{
                            $s->count+=$count;
                            $comment=$count." goods was added";
                        }
                }
            }
            if(!$flag){
                $ses[]=['id'=>$good->id,'count'=>$count];
            }

            $req->session()->put('cart.list',json_encode($ses));
            return ['comment'=>$comment];
        }
        else{
            return false;
        }

    }

    public function deleteGood(Request $req){
        if( !$req->session()->has('cart.list')){
            $req->session()->put('cart.list',json_encode([

            ]));
            return redirect(route('cart'));
        }
        $ses=json_decode($req->session()->get('cart.list'));
        $id=$req->input('id');
        $newS=[];
        foreach ($ses as $s){
            if($s->id!=$id){
                $newS[]=$s;
            }
        }
        $req->session()->put('cart.list', json_encode($newS));
        return redirect(route('cart'));
    }



    public function lesscount(Request $req){
        if( !$req->session()->has('cart.list')){
            $req->session()->put('cart.list',json_encode([

            ]));
        }
        $ses=json_decode($req->session()->get('cart.list'));
        $count=$req->input('count');
        foreach ($ses as $s){
            if($s->id==$req->input('id')){

                $good=Goods::where('id',$s->id)->first();
                if(1<=$s->count-1) {
                    $s->count--;

                    $c = $s->count;

                    $req->session()->put('cart.list', json_encode($ses));
                    return ['count'=>$c,'allprice'=>$this->AllPriceCart($req)];
                }else{
                    return false;
                }
            }
        }

        return false;
    }
    public function morecount(Request $req){
        if( !$req->session()->has('cart.list')){
            $req->session()->put('cart.list',json_encode([

            ]));
        }
        $ses=json_decode($req->session()->get('cart.list'));
        $count=$req->input('count');

        foreach ($ses as $s){
            if($s->id==$req->input('id')){

                $good=Goods::where('id',$s->id)->first();
                if($good->count>=$s->count+1){
                $s->count++;

                $c=$s->count;

                $req->session()->put('cart.list',json_encode($ses));
                return['count'=>$c,'allprice'=>$this->AllPriceCart($req)];
                }else{
                    return false;
                }
            }
        }

        return false;
    }
    public function AllPriceCart($req){
        if( !$req->session()->has('cart.list')){
            $req->session()->put('cart.list',json_encode([

            ]));
        }
        $ses=json_decode($req->session()->get('cart.list'));
        $price=0;
        foreach ($ses as $s){
            $g=Goods::where('id',$s->id)->where('active',1)->first();
            if($g->count>= $s->count){
                $price+=$s->count*$g->price;
            }else{
                return 0;
            }
        }
        return $price;
    }
    public function cart(Request $req){
            if( !$req->session()->has('cart.list')){
                $req->session()->put('cart.list',json_encode([

                ]));
            }
            $goods=[];
            $ses=json_decode($req->session()->get('cart.list'));

            foreach ($ses as $s){

               $good=Goods::where('id',$s->id)->first();
                if($good){
                    $cartgood=new Cartgood();
                    $cartgood->id_good=$s->id;
                    $cartgood->count=$s->count;
                    $cartgood->id_user=$good->id_user;

                    $goods[]=$cartgood;
                }


            }

            $this->data['goods']=$goods;
            $this->data['allprice']=$this->AllPriceCart($req);
            return view('cart',$this->data);

    }
    public function buy(Request $req){
       $pr= $this->AllPriceCart($req);
        if($pr!=0 and Auth::user()){

            $sale=new Sales();
            $sale->id_user=Auth::user()->id;
            $sale->finish_price=$pr;
            $sale->save();
            $ses=json_decode($req->session()->get('cart.list'));

            foreach ($ses as $s){
                $cartgood=new Cartgood();
                $cartgood->id_good=$s->id;
                $cartgood->count=$s->count;
                $cartgood->id_sales=$sale->id;
                $cartgood->price=Goods::where('id',$s->id)->first()->price;
                $cartgood->save();
                $g=Goods::where('id',$cartgood->id_good)->first();
                $g->count-=$cartgood->count;
                if ($g->count<=0){
                    $g->active=0;
                }
                $g->save();

            }

        }
        $req->session()->put('cart.list',json_encode([

        ]));
        return redirect(route('listpurchaseprofile'));
    }
}
