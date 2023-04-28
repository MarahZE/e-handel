<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>e-handel</title>
</head>

<body>
    <header>
        <nav class='navbar'>
            logo
            <a class='link' href="selectMakeup.php">Makeup</a>
            <a class='link' href="logout.php">Log out</a>
            <a class='link' href="register.html">Sign in</a>
        </nav>
    </header>
    <main>
        <section class="form-section">
            <form action="logIn.php" method="post" class="form">
                <h1>Logg in</h1>

                <input type="text" name="name" placeholder="Name" required=""> <br>

                <input type="text" name="password" placeholder="password" required=""> <br>
                <input type="submit" name="log-in" value="Logg in" />

            </form>
            <p>You don't have an account? .. <a href="register.html">Sign in</a></p>
        </section>


    </main>

    <footer class="footer">
        <p>Author: Marah Zeibak</p>
        <p><a href="mailto:hege@example.com">marah@example.com</a></p>
    </footer>

</body>

</html>