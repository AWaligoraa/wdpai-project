<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
</head>
<body>
    <header>
        <p>Grań</p>
        <nav>
            <ul>
                <li><a href="/">Strona główna</a></li>
                <li><a href="/trails">Szlaki</a></li>
                <li><a href="/trails/new">Dodaj szlak</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Szlaki</h1>

        <section>
            <h2>Filtry</h2>
            <form method="get" action="/trails">
                <p>
                    <label for="exposure">Ekspozycja</label>
                    <select id="exposure" name="exposure">
                        <option value="">Dowolna</option>
                        <option value="niska">Niska</option>
                        <option value="srednia">Średnia</option>
                        <option value="wysoka">Wysoka</option>
                    </select>
                </p>
                <p>
                    <label for="technical">Trudność techniczna</label>
                    <input id="technical" name="technical" type="number" min="1" max="5">
                </p>
                <p>
                    <label for="fitness">Wymagana kondycja</label>
                    <input id="fitness" name="fitness" type="number" min="1" max="5">
                </p>
                <p>
                    <label for="max-km">Długość do (km)</label>
                    <input id="max-km" name="max_km" type="number" min="0" step="0.1">
                </p>
                <p>
                    <label for="max-elevation">Przewyższenie do (m)</label>
                    <input id="max-elevation" name="max_elevation" type="number" min="0">
                </p>
                <p>
                    <label for="huts">
                        <input id="huts" name="huts" type="checkbox" value="1">
                        Schronisko po drodze
                    </label>
                </p>
                <p><button type="submit">Pokaż szlaki</button></p>
            </form>
        </section>

        <section>
            <h2>Wyniki</h2>
            <ul>
                <li>
                    <a href="/trails/1">Orla Perć</a>
                    — 4,5 km, przewyższenie 350 m, ekspozycja wysoka
                </li>
                <li>
                    <a href="/trails/2">Czerwone Wierchy</a>
                    — 15 km, przewyższenie 900 m, ekspozycja średnia
                </li>
                <li>
                    <a href="/trails/3">Dolina Pięciu Stawów</a>
                    — 8 km, przewyższenie 420 m, schronisko po drodze
                </li>
            </ul>
        </section>
    </main>

    <footer>
        <p>Grań</p>
    </footer>
</body>
</html>
