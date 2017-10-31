@extends('base')
@section('content')
    <h2>Registration</h2>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('registration')}}" method="post">
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
                    <label for="">Confirmation password:</label>
                </td>
                <td>
                    <input type="password" name="password_confirmation" placeholder="password" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Name:</label>
                </td>
                <td>
                    <input type="text" name="name" placeholder="name" value="{{old('name')}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Phone:</label>
                </td>
                <td>
                    <input type="text" name="phone" placeholder="+375 (25) 010-10-10" value="{{old('phone')}}">
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