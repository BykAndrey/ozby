@extends('user.profile')
@section('tab')
    <h2>Listing my sales</h2>
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
            <td>
                Shopper info
            </td>
        </tr>
        @foreach($goods as $good)

            <tr>
                <td>
                    <img src="{{URL::asset('static/images/goods/'.$good->getGood()->image)}}" width="150px" alt="">
                </td>
                <td>
                    {{$good->getGood()->name}}
                </td>
                <td>
                       {{$good->price}} bel.rub.
                </td>
                <td>
                    {{$good->count}}
                </td>
                <td>
                    {{$good->updated_at->format('d-M-Y')}}
                </td>
                <td>
                    <?php $sel=$good->getShopper();?>
                    {{$sel->email}}<br>
                    {{$sel->phone}}<br>
                    {{$sel->name}}<br>
                </td>
            </tr>

        @endforeach
    </table>
@endsection