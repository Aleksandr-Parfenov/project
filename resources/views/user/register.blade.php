<!DOCTYPE html>
<html>
<head>
    <title>register</title>
</head>
<body>
<h1>Регистрация</h1>
<p>
    Введите ваши данные:
</p>
<form method="post">
    {{ csrf_field() }}
    <p>Ваше имя: <input type="text" name="name"></p>
    <p>Ваш email: <input type="email" name="email"></p>
    <p>Ваш пароль: <input type="password" name="password"></p>
    <input type="submit" name="submit" value="Зарегистрировать">
</form>



</body>
</html>
