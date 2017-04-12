@extends('layouts.splash')
@section('center')
	<div class="panel panel-default">
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-4 hidden-xs hidden-sm">
	                &nbsp;
	            </div>
	            <div class="col-xs-12 col-sm-12 col-md-4">
	              <div class="row">
	                <div class="col-xs-12">
	                  <h3 style="margin-bottom:15px">Sign in</h3>
	                  {!! Form::open(array('url' => 'login')) !!}
		                <div class="form-group">
		                  {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
		                </div>
		                <div class="form-group">
		                  {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
		                </div>
		                <div class="form-group text-right">
		                  <button type="button" class="btn btn-default" onclick="location.href='/'">Cancel</button>
		                  {!! Form::submit('Sign in', ['class' => 'btn btn-primary']) !!}
		                </div>
		              {!! Form::close() !!}
	                </div>
	              </div>
	            </div>
	            <div class="col-xs-12 col-sm-12 col-md-4">
	                &nbsp;
	            </div>      
	        </div>
		</div>
	</div>
@stop