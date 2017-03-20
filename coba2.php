<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- Auth0 lock script -->
	<script src="bower_components\jquery\dist\jquery.min.js"></script>
<script src="https://cdn.auth0.com/js/lock/10.8/lock.min.js"></script>

<!-- Setting the right viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

</head>
<body>

	<input type="submit" class="btn-login" />

</body>


<script>
	var userProfile;

	$('.btn-login').click(function(e) {
	  e.preventDefault();
	  lock.show();
	});

</script>

</html>