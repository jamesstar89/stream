@extends('layouts.default')
@section('center')
<md-content class="md-padding" layout-xs="column" layout="row" style="background:none;padding:0">
    <div flex-xs flex-gt-xs="100" layout="column"> 
	    <div ui-view="ListView"></div>
		<div ui-view="RedirectView" ng-hide="redirect.tag===true"></div>
    </div>
</md-content>
@stop
@section('right')
    @include('side.stats')
    @include('side.recent')
@stop