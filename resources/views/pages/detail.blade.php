@extends('layouts.default')
@section('center')
<md-content class="md-padding" layout-xs="column" layout="row" style="background:none;padding:0">
	<div flex-xs flex-gt-xs="100" layout="column">
  		<md-card>  
	    	<div style="padding:10px;" class="ng-cloak">		
				<div ui-view="DetailView"></div>
				<div ui-view="RedirectView" ng-hide="redirect.detail===true"></div>
				@foreach($post as $item)
					@foreach($item->tags as $tag)
						<!-- cache -->
						<span class="identity-cache" style="display:none">{{$item->user_id}}</span>
						<span class="title-cache" style="display:none">{{$item->title}}</span>
						<span class="body-cache" style="display:none">{{$item->body}}</span>
						<span class="photos-cache" style="display:none">{{$item->photos}}</span>
		        	@endforeach
		        @endforeach
    		</div>
  		</md-card>
  	</div>
</md-content>
@stop
@section('right')
	@include('side.stats')
	@include('side.recent')
@stop