<!DOCTYPE html>
<html>
<head>
	<title>SignUp Page</title>
</head>
<body>
	<h1>Welcome to Sign Up Page</h1>

	{% if user.errors %}

		{% for errors in user.errors %}

			<ul>
				<li>{{errors}}</li>
			</ul>

		{% endfor %}


	{% endif %}

	<form method="POST" action="/serdelab/signup/create">
		
		<div>
			<label for="name">Username</label>
			<input id="name" name="username" placeholder="Username" autofocus>
		</div>

		<div>
			<label for="name">E mail</label>
			<input id="email" name="email" placeholder="e-mail address" autofocus>
		</div>

		<div>
			<label for="password">Password</label>
			<input id="password" name="password" placeholder="Password" type="password" autofocus>
		</div>

		<div>
			<label for="passwordconfirm">Password</label>
			<input id="passwordconfirm" name="passwordconfirm" placeholder="Password Confirmation" type="password" autofocus>
		</div>

		<button type="submit">Submit</button>
	</form>
</body>
</html>