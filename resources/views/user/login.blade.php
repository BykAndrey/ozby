@extends('base')
@section('content')
    <h2>Log in</h2>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('login')}}" method="post">
        {{csrf_field()}}
        <table>
            <tr>
                <td>
                    <label for="">Email:</label>
                </td>
                <td>
                    <input type="email" name="email" placeholder="a@a.com" value="{{old('email')}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Password:</label>
                </td>
                <td>
                    <input type="password" name="password" placeholder="password" >
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="send">
                </td>
            </tr>
        </table>

    </form>
@endsection