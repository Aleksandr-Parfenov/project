<!DOCTYPE html>
<html>
	<head>
		<title>My view</title>
	</head>
<body>
    <p style="color: {{$param}}">
        Какойто абзац Page
    </p>
    <form method="post">
        <p>Цвет текста</p>
        <input type="radio" name="color" value="red">Красный</br>
        <input type="radio" name="color" value="green">Зеленый</br>
        <input type="radio" name="color" value="black">Черный</br>
        <input type="submit" name="Изменить цвет">

    </form>


</body>
</html>
