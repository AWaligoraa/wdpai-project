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
        <p>Szlak <?= (int) $trailId ?>, crux <?= (int) $cruxId ?></p>
        <h1><?= htmlspecialchars($cruxName) ?></h1>

        <section>
            <h2>Opis</h2>
            <p>
                Strome miejsce z łańcuchami. Przejście wymaga uwagi i pewnego kroku.
            </p>
        </section>

        <section>
            <h2>Zdjęcie</h2>
            <p>Tu będzie zdjęcie cruxu.</p>
        </section>

        <section>
            <h2>Film</h2>
            <p>Tu będzie film z przejścia cruxu.</p>
        </section>
    </main>

    <footer>
        <p>Grań</p>
    </footer>
</body>
</html>
