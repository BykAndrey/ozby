@extends('user.profile')
@section('tab')
    <h2>Listing my goods</h2>
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
                Updated
            </td>
        </tr>
    @foreach($goods as $good)
        <tr>
           <td>
               <img src="{{URL::asset('static/images/goods/'.$good->image)}}" width="150px" alt="">
           </td>
            <td>
                <a href="{{route('editgood',['id'=>$good->id])}}">{{$good->name}}</a>
            </td>
            <td>
                   {{$good->price}} bel.rub.
            </td>
            <td>
                {{$good->count}}
            </td>
            <td>
                {{$good->updated_at}}
            </td>
        </tr>

    @endforeach
    </table>
@endsection