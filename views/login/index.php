<!--	Login Page index	-->
<style>
body {
	background: #FFFFFF;
}
</style>
<form action="login/run" method="post" class="form-signin" role="form">
	<h2 class="form-signin-heading">Please sign in</h2>
	<input type="text" class="form-control" placeholder="Username" name="login" required autofocus />
    <input type="password" class="form-control" placeholder="Password" name="password" required />
    <label class="checkbox">
    	<input type="checkbox" value="remember-me">
        Remember me
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>    