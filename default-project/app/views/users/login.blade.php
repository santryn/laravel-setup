@extends('layouts.default')

@section('content')


<div>
	
	<!-- Make Confide Login Form -->
	
	{{ Confide::makeLoginForm()->render() }}

</div>

@stop