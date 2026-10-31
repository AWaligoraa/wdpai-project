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
        <h1><?= htmlspecialchars($trailName) ?></h1>
        <p>Numer szlaku: <?= (int) $trailId ?></p>

        <section>
            <h2>Parametry</h2>
            <dl>
                <dt>Długość</dt>
                <dd><?= htmlspecialchars($length) ?></dd>
                <dt>Trudność</dt>
                <dd><?= htmlspecialchars($difficulty) ?></dd>
            </dl>
        </section>

        <section>
            <h2>Opis</h2>
            <p>
                Szlak prowadzący granią. Po drodze są miejsca wymagające uwagi:
                ekspozycja, łańcuchy i strome odcinki.
            </p>
        </section>

        <section>
            <h2>Cruxy</h2>
            <ol>
                <li><a href="/trails/<?= (int) $trailId ?>/cruxes/1">Komin na Kozią Przełęcz</a></li>
                <li><a href="/trails/<?= (int) $trailId ?>/cruxes/2">Grań za Kozimi Czubami</a></li>
                <li><a href="/trails/<?= (int) $trailId ?>/cruxes/3">Żleb Kulczyńskiego</a></li>
            </ol>
        </section>

        <section>
            <h2>Mapa</h2>
            <p>Tu będzie mapa z zaznaczonymi cruxami.</p>
        </section>
    </main>

    <footer>
        <p>Grań</p>
    </footer>
</body>
</html>
