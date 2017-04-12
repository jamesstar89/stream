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
	                  <h3 style="margin-bottom:15px">Users <a href="#">(add)</a></h3>
	                  	<table class="table">
							<thead>
								<tr>
									<th>User</th>
									<th>Author prefix</th>
									<th>Password</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
								<tr>
									<td>{{ $user->username }}</td>	
									<td>{{ $user->author_prefix }}</td>
									<td>*****</td>	
									<td><a href="#" data-username="{{ $user->username }}" data-authorprefix="{{ $user->author_prefix }}" data-userid="{{ $user->id }}" class="edit-user">Edit</a></td>	
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
    <div class="modal fade user-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
			<form class="update-user" action="user/id" method="post">
				<input name="_method" type="hidden" value="PUT">
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Update User</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">		
						<div class="row">
							<div class="col-xs-12">
							<div class="form-group">
								<input type="text" name="username" class="form-control" value="admin@domain.com" />
							</div>
							<div class="form-group">
								<input type="text" name="authorprefix" class="form-control" value="JS" />
							</div>
							<div class="form-group">
								<input type="password" name="newpassword" class="form-control" placeholder="New password" />
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