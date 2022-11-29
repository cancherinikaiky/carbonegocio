<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form enctype="multipart/form-data" method="post" id="formInsert">
    <input type="text" name="company_name">
    <input type="text" name="name">
    <input type="text" name="cpf">
    <input type="text" name="email">
    <input type="text" name="phone">
    <input type="text" name="description">
    <input type="file" name="photo">

    <button type="submit">Enviar</button>
</form>

<script type="text/javascript" async>
    const form = document.querySelector("#formInsert");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("<?= url("admin/registro"); ?>",{
            method: "POST",
            body: dataUser,
        });
        const user = await data.json();
        console.log(user);
    });
</script>

</body>
</html>