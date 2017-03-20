<!DOCTYPE html>
<html>
<head>
</head>
<body>
<input type="button"  value="Login" onclick="login()" />
<input type="button"  value="Logout" onclick="logout()" />
 
<div id="profile"></div>
<script type="text/javascript">
 
function logout()
{
    gapi.auth.signOut();
    location.reload();
}
function login() 
{
  var myParams = {
    'clientid' : '200453912889-ne0gsr1stps83uqqrhfa1abcb39lmjq1.apps.googleusercontent.com',
    'cookiepolicy' : 'single_host_origin',
    'callback' : 'loginCallback',
    'approvalprompt':'force',
    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
  };
  gapi.auth.signIn(myParams);
}
 
function loginCallback(result)
{
    if(result['status']['signed_in'])
    {
        var request = gapi.client.plus.people.get(
        {
            'userId': 'me'
        });
        request.execute(function (resp)
        {
            var email = '';
            if(resp['emails'])
            {
                for(i = 0; i < resp['emails'].length; i++)
                {
                    if(resp['emails'][i]['type'] == 'account')
                    {
                        email = resp['emails'][i]['value'];
                    }
                }
            }
 
            var str = "Name:" + resp['displayName'] + "<br>";
            str += "Image:" + resp['image']['url'] + "<br>";
            str += "<img src='" + resp['image']['url'] + "' /><br>";
 
            str += "URL:" + resp['url'] + "<br>";
            str += "Email:" + email + "<br>";
            document.getElementById("profile").innerHTML = str;
        });
 
    }
 
}
function onLoadCallback()
{
    gapi.client.setApiKey('AIzaSyAaSPxgGMe1ZuDkWv430a_LmKwhlgQl25Q ');
    gapi.client.load('plus', 'v1',function(){});
}
 
    </script>
 
<script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
</script>
 
</body>
</html>