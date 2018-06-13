{!! Form::open(['action' =>['AdminController@postLogin'],
       'file' =>'true',
       'enctype' => 'multipart/form-data']) !!}
{{csrf_field()}}

<p>login</p>
<input type="text" name="email" >
<p>password</p>
<input type="password" name="password" >

<input type="submit">
{!! Form::close() !!}