<?php

namespace App\Http\Controllers;

use App\Goods;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
	public $data=[];
	public function __construct()
    {   if(Auth::user()){
        $this->data['user'] = Auth::user();
        }


    }

    public function index( Request $req){
	    if($req->input('orderby')){
            if($req->input('direct')=='asc'){
                $this->data['goods']=Goods::where('active',true)
                    ->where('count','>=',1)
                    ->orderBy($req->input('orderby'),'asc')
                    ->get();
            }else{
                $this->data['goods']=Goods::where('active',true)
                    ->where('count','>=',1)
                    ->orderBy($req->input('orderby'),'desc')
                    ->get();
            }

        }else{
            $this->data['goods']=Goods::where('active',true)
                ->orderBy('updated_at')
                ->get();
        }

		return view('index',$this->data);
	}
}
