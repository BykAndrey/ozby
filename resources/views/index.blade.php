@extends('base')
@section('content')
<h2>Home page</h2>
<h3>Listing active goods</h3>
    <div class="sorting">Sort by:

        <a href="{{route('home',['orderby'=>'name','direct'=>'asc'])}}">Name ↑ </a>    |
        <a href="{{route('home',['orderby'=>'name'])}}">Name ↓ </a>    |

        <a href="{{route('home',['orderby'=>'price','direct'=>'asc'])}}">Price ↑</a>    |
        <a href="{{route('home',['orderby'=>'price'])}}">Price ↓</a>    |

        <a href="{{route('home',['orderby'=>'updated_at','direct'=>'asc'])}}">Updated ↑</a>|
        <a href="{{route('home',['orderby'=>'updated_at'])}}">Updated ↓</a>

    </div>
    <div class="listingItem">
        @foreach($goods as $g)
            <div class="item">
                <a  href="{{route('card',['id'=>$g->id])}}">
                    <div class="image" style="background-image: url('/static/images/goods/{{$g->image}}')"></div>
                </a>
                <a href="{{route('card',['id'=>$g->id])}}">{{$g->name}}</a><br>
                <span class="price">Price: {{$g->price}} bel.rub.</span><br>
                <span class="price">Updated: {{$g->updated_at->format('d-M-Y')}}</span>
            </div>
            @endforeach
    </div>
@endsection