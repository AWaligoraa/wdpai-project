<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="site-header">
        <p class="logo">Grań</p>
        <nav>
            <ul class="nav-list">
                <li><a href="/">Strona główna</a></li>
                <li><a href="/trails">Szlaki</a></li>
                <li><a href="/trails/new">Dodaj szlak</a></li>
            </ul>
        </nav>
    </header>

    <main class="hero">
        <h1>Znajdź szlak, który naprawdę dasz radę przejść</h1>
        <p>
            Filtruj szlaki w Tatrach po ekspozycji, trudności, kondycji,
            długości, przewyższeniu i schroniskach.
        </p>
        <p><a class="button" href="/trails">Przeglądaj szlaki</a></p>
    </main>

    <footer class="site-footer">
        <p>Grań</p>
    </footer>
</body>
</html>
