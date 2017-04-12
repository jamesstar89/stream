@extends('layouts.splash')
@section('center')
	<div class="panel panel-default">
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-1 hidden-xs hidden-sm">
	                &nbsp;
	            </div>
	            <div class="col-xs-12 col-sm-12 col-md-10">
	              <div class="row">
	                <div class="col-xs-12">
	                  <h3 style="margin-bottom:15px">Tags</h3>
	                  	<table class="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tags as $tag)
								<tr>
									<td>{{ $tag->name }}</td>
									<td><a href="#" data-id="{{ $tag->id }}" data-name="{{ $tag->name }}" class="edit-tag">Edit</a></td>	
								</tr>
								@endforeach
							</tbody>
						</table>
	                </div>
	              </div>
	            </div>
	            <div class="col-xs-12 col-sm-12 col-md-1">
	                &nbsp;
	            </div>      
	        </div>
		</div>
	</div>
	<!-- user modal -->
    <div class="modal fade tag-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
			<form class="update-tag" action="tag/id" method="post">
				<input name="_method" type="hidden" value="PUT">
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Update Tag</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<input type="text" name="tagname" class="form-control" value="stream" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
		  </form>
        </div>
      </div>
    </div>
	
@stop