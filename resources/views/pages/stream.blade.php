@extends('layouts.default')
@section('center')
	@if (Auth::check())
	<md-content class="md-padding" layout-xs="column" layout="row" style="background:none;padding:0">
        <div flex-xs flex-gt-xs="100" layout="column">
          <md-card>  
				<div ui-sref="add" ng-click="go('/add')">
				    <input type="text" class="form-control" placeholder="Write something..." readonly="true" onfocus="this.blur()" style="background-color:white;border:0;box-shadow:none;padding:20px 12px" />
				</div>
			</md-card>
		</div>
	</md-content>
	@endif
	<div ui-view="HomeView"></div>	
	<div ui-view="RedirectView" ng-hide="redirect.home===true"></div>
@stop
@section('right')
	@include('side.stats')
	@include('side.recent')
	@include('side.links')
@stop