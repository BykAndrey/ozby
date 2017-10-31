<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use JMS\Serializer\Tests\Fixtures\Input;
use Validator;

class GoodController extends Controller
{
    public $data=[];
    public function __construct()
    {
        if (Auth::user()) {
            $this->data['user'] = Auth::user();
        }
    }
    public function card($id){
        $g=Goods::where('id',$id)->first();
        if($g){
            $this->data['good']=$g;
            return view('good.card',$this->data);
        }
        else{
            return 'Error';
        }

    }
    public function create(Request $req){
        if($req->isMethod('get')){
            return view('good.create',$this->data);
        }

        if($req->isMethod('post')){
            $val=Validator::make($req->all(),
                [
                    'name'=>'required|max:255',
                    'price' => 'required|min:0.01|numeric',
                    'count'=>'required|min:1|max:100|integer',
                    'description' => 'required|max:65000',
                    'image'=>'required|mimes:jpg,jpeg,png,gif|max:2048'


                ]);
            $by=mb_strlen($req->input('description'));
            if($by>65000)
                $val->after(function ($val){
                    $val->errors()->add('description','Description:max 65kb');
                });
            if($val->fails()){
                return redirect(route('creategood'))
                    ->withErrors($val)
                    ->withInput();
            }
            $good=new Goods();
            $id_user=Auth::user()->id;
            $good->id_user=$id_user;
            $good->name=$req->input('name');
            $good->price=$req->input('price');
            $good->count=$req->input('count');
            $good->description=$req->input('description');
            $good->active=$req->input('active');

            $imageName = time() . '.' .$req->file('image')->getClientOriginalExtension();

            $req->file('image')->move(
                base_path() . '/public/static/images/goods/', $imageName
            );
            $good->image=$imageName;
            $good->save();

            return redirect(route('profile'));



        }
    }
    public function  edit($id,Request $req)
    {
        $good = Goods::where('id', $id)->first();
        if (Auth::user()->id == $good->id_user){
        if ($req->isMethod('get')) {

            $this->data['good'] = $good;
            return view('good.edit', $this->data);
        }

        if ($req->isMethod('post')) {


            $rules = ['name' => 'required|max:255',
                'price' => 'required|min:0.01|numeric',
                'count' => 'required|min:1|max:100|integer',
                'description' => 'required|max:65000'];
            if ($req->file('image')) {
                $rules['image'] = 'mimes:jpg,jpeg,png,gif|max:2048';
            }
            $val = Validator::make($req->all(), $rules);
            $by=mb_strlen($req->input('description'));
            if($by>65000)
            $val->after(function ($val){
                $val->errors()->add('description','Description:max 65kb');
            });

            if ($val->fails()) {
                return redirect(route('editgood', ['id' => $id]))
                    ->withErrors($val)
                    ->withInput();
            }
            $good = Goods::where('id', $id)->first();
            if ($good) {

                $good->name = $req->input('name');
                $good->price = $req->input('price');
                $good->count = $req->input('count');
                $good->description = $req->input('description');

                $good->active = (bool)$req->input('active');
                if ($req->file('image')) {
                    $imageName = time() . '.' . $req->file('image')->getClientOriginalExtension();

                    $req->file('image')->move(
                        base_path() . '/public/static/images/goods/', $imageName
                    );
                    $good->image = $imageName;
                }

                $good->save();
            }


            return redirect(route('listgoods'));
        }
    }else{
            return redirect(route('profile'));
        }
}
}
