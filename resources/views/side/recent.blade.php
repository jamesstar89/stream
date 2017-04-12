<md-content class="md-padding" layout-xs="column" layout="row" style="background:none;padding:0">
    <div flex-xs flex-gt-xs="100" layout="column">
  		<md-card> 
  			<div style="padding:15px">
			    <h5>Recent streams @if (Auth::check())<a href="tag/e/edit/" class="text-muted">(edit)</a>@endif</h5>
			    <div class="recent-tags"></div>
			</div>
		</md-card>
	</div>
</md-content>