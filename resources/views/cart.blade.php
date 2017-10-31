@extends('base')
@section('content')

    <h2>Cart</h2>
    <div class="cart">
        <table class="list">
            <tr>
                <td>
                    Image
                </td>
                <td>
                    Name
                </td>
                <td>
                    Price
                </td>
                <td>
                    Count
                </td>
                <td>
                   Delete
                </td>
            </tr>
            @foreach($goods as $good)
                <tr id="good_{{$good->id_good}}" class="good">
                    <td>
                        <img src="{{URL::asset('static/images/goods/'.$good->getGood()->image)}}" width="150px" alt="">
                    </td>
                    <td>
                       {{$good->getGood()->name}}
                    </td>

                    <td>
                        {{$good->getGood()->price}} bel.rub.
                    </td>
                    <td>
                        <a  id="cart_less"  href="#" value="{{$good->id_good}}" title="less"><<</a>
                        <span id="count">{{$good->count}}</span>
                        <a id="cart_more"  href="#" value="{{$good->id_good}}" title="more">>></a>
                    </td>
                    <td>
                        <a href="{{route('deletegood',['id'=>$good->id_good])}}">Delete</a>
                    </td>

                </tr>

            @endforeach
        </table>
        <h4 id="allprice"> {{$allprice}} bel.rub.</h4>
        @if($allprice>0)
            <form action="{{route('buy')}}" method="post">
            {{csrf_field()}}
                <input type="submit" value="Buy!">
            </form>

            @endif
    </div>

    @endsection