@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(isset($good))
    {{ Form::model($good, array('route'=>array('editgood',$good->id), 'method'=>'post','files' => true)) }}
@else
    {{ Form::open(['route' => 'creategood','method'=>'post','files' => true]) }}
@endif


    <table>
        <tr>
            <td>
                <label for="">Name:</label>
            </td>
            <td>
                {{ Form::text('name', Input::old('name')) }}
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Price:</label>
            </td>
            <td>
                {{ Form::number('price', Input::old('price'),['step'=>'0.01']) }}(bel.rub.)

            </td>
        </tr>
        <tr>
            <td>
                <label for="">Count:</label>
            </td>
            <td>
                {{ Form::number('count', Input::old('count')) }}(1-100)
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Description:</label>
            </td>
            <td>

                {{ Form::textarea('description',old('description')) }}
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Image:</label>
            </td>
            <td>
                @if(isset($good))
                    <img src="{{URL::asset('static/images/goods/'.$good->image)}}" width="150px" alt="">
                    @endif
                {{Form::file('image')}}
               (jpeg,jpg,png,gif, max 2MB)

            </td>
        </tr>
        <tr>
            <td>
                <label for="">Active:</label>
            </td>
            <td>

                {{Form::hidden('active',false)}}
                {{Form::checkbox('active',true)}}

            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Send">
            </td>
        </tr>
    </table>
{{Form::close()}}