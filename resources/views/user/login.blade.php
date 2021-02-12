<!DOCTYPE html>
<html>
<head>
    <title>register</title>
</head>
<body>
<h1>Авторизация</h1>
<p>
    Введите данные вашей учетной записи:
</p>
<form method="post">
    {{ csrf_field() }}
    <p>Ваш email: <input type="email" name="email"></p>
    <p>Ваш пароль: <input type="password" name="password"></p>
    <input type="submit" name="submit" value="Войти">
</form>



</body>
</html>
