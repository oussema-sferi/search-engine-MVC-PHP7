<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h3 style="text-align: center;">Login Form</h3>
    <fieldset style="width:600px;margin: 10px auto">
    <form action="../router.php?controller=login" method="post" style="margin: 10px auto; width: 600px">
        <label> Enter your username : </label>
        <input name="username" type="text" placeholder="enter your username"/>
        <br>
        <br>
        <label> Enter your password : </label>
        <input name="password" type="password" placeholder="enter your password"/>
        <br>
        <br>
        <input type="submit" value="Login" >
    </form>
    </fieldset>
</body>
</html>