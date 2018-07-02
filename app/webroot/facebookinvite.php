<html>
  <head>
  <title>My Great Website</title>
  </head>
  <body>
  <a href="javascript:void(0);" onclick="FacebookInviteFriends()">Invite friends</a>
  <div id="fb-root"></div>
  <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
	<script>
	FB.init({
	appId:'374477216026233',
	cookie:true,
	status:true,
	frictionlessRequests:true,
	xfbml:true
	});
	function FacebookInviteFriends()
	{
	FB.ui({
	method: 'apprequests',
	title:'Join our website',
	message:'join our shop fit website'
	});
	}
	</script>
  </body>
</html>