<md-content class="md-padding" layout-xs="column" layout="row" style="background:none;padding:0">
    <div flex-xs flex-gt-xs="100" layout="column">
  		<md-card> 
  			<div style="padding:15px">
				<h4>Stream stats</h4>
				<ul class="totals">
					<li>Streams&nbsp;&nbsp;<span class="stream-total badge" style="background-color:#eeeeee;color:black;font-weight:normal;">0</span></li>
					<li>Posts&nbsp;&nbsp;<span class="post-total badge" style="background-color:#eeeeee;color:black;font-weight:normal;">0</span></li>
				</ul>
			</div>
		</md-card>
	</div>
</md-content>
@if (Auth::check())
<md-content class="md-padding user-totals-wrapper" layout-xs="column" layout="row" style="background:none;padding:0">
    <div flex-xs flex-gt-xs="100" layout="column">
  		<md-card>
  			<div style="padding:15px">
				<h4 class="username">&nbsp;</h4>
				<ul class="user-totals">
				    <li>Streams&nbsp;&nbsp;<span class="stream-total badge" style="background-color:#eeeeee;color:black;font-weight:normal;">0</span></li>
				    <li>Posts&nbsp;&nbsp;<span class="post-total badge" style="background-color:#eeeeee;color:black;font-weight:normal;">0</span></li>
				</ul>
			</div>
		</md-card>
	</div>
</md-content>
@endif