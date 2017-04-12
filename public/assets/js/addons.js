(function() {

	$(".features.link").on("click", function() {
    $(".features-modal").modal("show");	    		
	});

  $(".edit-tag").on("click", function(e) {
    // update values
    var tagId = $(e.target).data("id");
    var tagName = $(e.target).data("name");
    $(".update-tag").attr("action", "/tag/"+tagId);
    $(".update-tag input[name='tagname']").val(tagName);
    $(".tag-modal").modal("show");
  });

	$(".edit-user").on("click", function(e) {
    var userId = $(e.target).data("userid");  
    var username = $(e.target).data("username");
    var authorPrefix = $(e.target).data("authorprefix");
    $(".update-user").attr("action", "/user/"+userId);
    $(".update-user input[name='username']").val(username);
    $(".update-user input[name='authorprefix']").val(authorPrefix);
    $(".user-modal").modal("show");
	});

  $(".plans-link").on("click", function(e) {
    $(".invite, .cloud, .standalone").hide();
    $(".plans-link").attr("style", "display:inline-block;text-decoration:none;border-bottom:2px solid #fff;margin-bottom:5px");
    $(e.target).attr("style", "display:inline-block;text-decoration:none;border-bottom:2px solid #337ab7;margin-bottom:5px");
    var option = $(e.target).data("option");
    $("."+option).show();
  })

})();

// Facebook SDK
(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

// Google Analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-68768008-1', 'auto');
ga('send', 'pageview');
//# sourceMappingURL=addons.js.map
