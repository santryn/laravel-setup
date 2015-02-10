@extends('layouts.default')

@section('content')


<div>
	<h1>Create new user</h1>

	{{ Confide::makeSignupForm()->render() }}

</div>

@stop