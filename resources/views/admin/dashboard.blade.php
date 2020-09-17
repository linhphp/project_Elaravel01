@if(Auth::check())
@extends('admin_layout');
@section('admin_content')
<h3>chao mung ban den voi admin</h3>
@endsection
@else
	@include('admin_login');
@endif