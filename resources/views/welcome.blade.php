@extends('app')
@section('content')
<div class="container">
    <div class="row">
	<div class="col-md-10">
	    <div style="display:block;width:100%;height:5rem;">
		</div>
		<div class="card card-default" style="width:30rem;height:10rem;padding:5rem;margin:auto; text-align:center">
				<h3>¡ Bienvenido a nuestra aplicación web !</h3>
			
			
	    </div>
		<div class="card card-default" style="width:30rem;height:10rem;padding:5rem;margin:auto; text-align:center">
			<div id="post-stream">
				<h4>Ultimos posts</h4>
					
			</div>
		</div>
	</div>
    </div>
</div>
<script>
const variable = '<div class="post" ng-repeat="post in posts">' 
+'<p> post.text </p>'
+'<small>Posted by post.created_by </small>'
+'<small class="pull-right"> post.created_at </small>'
+'</div>'
</script>
@endsection