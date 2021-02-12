<!DOCTYPE html>
<html>
<head>
    <title>register</title>
</head>
<body>
<h1>Кабинет пользователя</h1>
<p>Привет пользователь под номером: {{session('id_user')}}</p>
<form method="post">
    {{ csrf_field() }}
    <p><input type="submit" name="exit" value="Выйти из аккаунта"> </p>
</form>


</body>
</html>
