@extends('base')

@section('content')
    <h2>{{$good->name}}</h2>
    <p>The selling by <i>{{$good->getSeller()}}</i>. Updated at: {{$good->updated_at->format('d-M-Y')}}</p>
    <div class="container-fluid">
        <div class="card row">
            <div class="image col-md-6">
                <img src="{{URL::asset('static/images/goods/'.$good->image)}}" alt="">
            </div>

            <div class="info col-md-6">
                <div class="price">
                   Price:  {{$good->price}} bel.rub.
                </div>
                <div class="price">
                    Count:  {{$good->count}}
                </div>
                <div class="description">
                    Description: {{$good->description}}
                </div>

            </div>
            @if(isset($user))
            @if($user->id!=$good->id_user)
                <form id="formaddtocart" class="col-lg-12" method="get" action="{{route('addtocart')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$good->id}}">
                    <input type="number" name="count" min="1" max="{{$good->count}}" value="1">
                    <input  id="addtocart" type="submit" value="BUY">
                </form>
                <div id="comment" class="col-md-12" style="color: #9e0505; text-align: right"></div>
            @endif
                @endif
        </div>
    </div>

    @endsection