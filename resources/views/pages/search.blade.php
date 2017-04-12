@extends('layouts.default')
@section('center')
	<div class="ng-panel panel panel-default">
	  <div class="panel-body">
	    <div style="padding:10px;">
			<h3 style="margin:0 0 20px 0">Search results:</h3>
		    <div>
				@foreach($posts as $post)
					@foreach($post->tags as $tag)
						<h4><a href="/tag/{{$tag->id}}#/list"><span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">{{$tag->name}}</span></a>
			            <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">{{$post->author->author_prefix}}</span>
			            {{$post->title}}</h4>
				        <p style="margin-bottom:0;">{{trim(substr($post->body, 0, 250))}}<span>...</span></p>
                        @if($post->photos->count() > 0)
                        <div style="height:20px;">&nbsp;</div>
                        @endif
                        <div class="photo-grid">
                            <div class="row first-row">
                                @foreach($post->photos as $index=>$photos)
                                    @if($post->photos->count() > 0)
                                        <?php $boxClass = ($index === 0) ? 'col box-1 box-padding' : 'col box-2'; ?>
                                        @if($index === 0 || $index == 1) 
                                        <div class="<?php echo $boxClass ?>">
                                            <a href="{{$photos->url}}" class="image-holder" data-lightbox="photogrid_ng{{$post->id}}" data-title="<div class='view-post'><a href='/post/{{$post->id}}/#/detail'>View post</a></div><div class='caption'>A very fast car photo</div>" style="background-image: url('{{$photos->url}}');"></a>                                            
                                        </div>
                                        @endif
                                    @endif
                                @endforeach
                                @if($post->photos->count() === 1)
                                    <div class="col box-2">
                                        <a href="javascript:void(0)" class="image-holder color-swatch gray-lighter recommend" style="position:relative;background-color:white;color:#7D7D7D;">
                                            <p style="position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;height:34px;z-index:10;text-align: center;font-size: 16px;">
                                                <!-- action button removed -->
                                            </p>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="row second-row">
                                @foreach($post->photos as $index=>$photos)
                                    @if($post->photos->count() > 0)
                                        @if($post->photos->count() > 2)
                                            <?php $boxClass = ($index === 2) ? 'col box-2 box-padding' : 'col box-1'; ?>
                                            @if($index === 2 || $index == 3) 
                                            <div class="<?php echo $boxClass ?>">                                              
                                                <a href="{{$photos->url}}" class="image-holder" data-lightbox="photogrid_ng{{$post->id}}" data-title="<div class='view-post'><a href='/post/{{$post->id}}/#/detail'>View post</a></div><div class='caption'>A very fast car photo</div>" style="background-image: url('{{$photos->url}}');"></a>                                               
                                            </div>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                                @if($post->photos->count() === 2)
                                    <div class="col box-optional">
                                        <a href="javascript:void(0)" class="image-holder color-swatch gray-lighter recommend" style="position:relative;background-color:white;color:#7D7D7D;height:73px;overflow:visible;">
                                            <p style="position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;height:34px;z-index:10;text-align: center;font-size: 16px;">
                                                <!-- action button removed -->
                                            </p>
                                        </a>
                                    </div>
                                @endif
                                @if($post->photos->count() === 3)
                                <div class="col box-1">
                                    <a href="javascript:void(0)" class="image-holder color-swatch gray-lighter recommend" style="position:relative;background-color:white;color:#7D7D7D;">
                                        <p style="position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;height:34px;z-index:10;text-align: center;font-size: 16px;">
                                            <!-- action button removed -->
                                        </p>
                                    </a>
                                </div>
                                @endif  
                            </div>                     
                        </div>
                        <div style="height:15px;">&nbsp;</div>
                        <div class="text-right" style="padding:0;">
                            <?php
                            if($post->photos->count() === 0) {
                                // action link removed
                            }
                            ?><a href="/post/{{$post->id}}/#/detail">Details</a>
                        </div>
				        <hr />
					@endforeach
				@endforeach
			</div>
	    </div>
	  </div>
	</div>
@stop
@section('right')
    @include('side.stats')
    @include('side.recent')
@stop