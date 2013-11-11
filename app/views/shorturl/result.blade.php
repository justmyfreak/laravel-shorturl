@extends('shorturl.template')

@section('content')
<div class="container-narrow">
	<div class="masthead">
		<ul class="nav nav-pills pull-right">
			<li class="active"><a href="{{url('/')}}">Home</a></li>
			<li><a href="#">About</a></li>
		</ul>
		<h3 class="muted">Laravel Shorturl</h3>
	</div>
	<hr>
	
	<div class="row">
		<div class="alert alert-success">
			<h3>Here is your short url : </h3>
			<a href="{{$url}}">{{$url}}</a>
		</div>
	</div>

	<hr>

    <div class="footer">
    	<p>Created by <a href="http://twitter.com/justmyfreak">justmyfreak</a></p>
    </div>
</div>

@stop