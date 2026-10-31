<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php require __DIR__ . '/nav.html.php'; ?>

    <main>
        <section class="hero">
            <div class="hero-copy">
                <p>Ekspozycja, trudność i schroniska</p>
                <h1>Znajdź szlak, który naprawdę dasz radę przejść</h1>
                <p>
                    Filtruj szlaki w Tatrach po ekspozycji, trudności, kondycji,
                    długości, przewyższeniu i schroniskach.
                </p>
                <p>
                    <a class="button" href="/trails">Przeglądaj szlaki</a>
                    <a href="/trails">Kalkulator sił trudności</a>
                </p>
                <ul class="stats">
                    <li>275 km opisanych szlaków</li>
                    <li>82 cruxy ze zdjęciem</li>
                    <li>8 schronisk po drodze</li>
                </ul>
            </div>
            <div class="hero-media card">
                <p>Tu będzie zdjęcie grani.</p>
                <p>Kozi Wierch, 2137 m n.p.m.</p>
            </div>
        </section>

        <section id="o-aplikacji">
            <h2>Trzy warstwy weryfikacji przed wejściem na szlak</h2>
            <ul class="card-grid">
                <li class="card">
                    <h3>Ekspozycja i cruxy</h3>
                    <p>Widzisz trudne miejsca, zanim wyjdziesz na szlak.</p>
                </li>
                <li class="card">
                    <h3>Schroniska po drodze</h3>
                    <p>Sprawdzasz, czy po drodze jest gdzie przenocować.</p>
                </li>
                <li class="card">
                    <h3>Zdjęcia i film z trudnego miejsca</h3>
                    <p>Oglądasz przejście cruxu przed decyzją.</p>
                </li>
            </ul>
        </section>

        <section>
            <h2>Popularne trasy tatrzańskie</h2>
            <ul class="card-grid">
                <li class="card">
                    <h3>Orla Perć</h3>
                    <p>4,3 km, przewyższenie 1150 m</p>
                    <a href="/trails/1">Szczegóły</a>
                </li>
                <li class="card">
                    <h3>Czerwone Wierchy</h3>
                    <p>16,2 km, przewyższenie 1240 m</p>
                    <a href="/trails/2">Szczegóły</a>
                </li>
                <li class="card">
                    <h3>Dolina Pięciu Stawów</h3>
                    <p>15,5 km, przewyższenie 820 m</p>
                    <a href="/trails/3">Szczegóły</a>
                </li>
            </ul>
        </section>

        <section class="card">
            <h2>Profil wysokościowy trasy</h2>
            <p>wykres</p>
        </section>

        <section class="banner">
            <h2>Zawrócenie ze szlaku to nie porażka</h2>
            <a class="button" href="/trails">Przeglądaj szlaki</a>
        </section>
    </main>

    <footer class="site-footer">
        <p class="logo">Grań</p>
        <p>Szlaki, cruxy i schroniska w polskich Tatrach.</p>
    </footer>
</body>
</html>