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
        <h1>Dodaj szlak</h1>

        <form method="get" action="/trails/new">
            <p>
                <label for="name">Nazwa szlaku</label>
                <input id="name" name="name" type="text" required>
            </p>
            <p>
                <label for="region">Region</label>
                <input id="region" name="region" type="text">
            </p>
            <p>
                <label for="description">Opis</label>
                <textarea id="description" name="description"></textarea>
            </p>
            <p>
                <label for="length">Długość (km)</label>
                <input id="length" name="length" type="number" min="0" step="0.1">
            </p>
            <p>
                <label for="elevation">Przewyższenie (m)</label>
                <input id="elevation" name="elevation" type="number" min="0">
            </p>
            <p>
                <label for="exposure">Ekspozycja</label>
                <select id="exposure" name="exposure">
                    <option value="niska">Niska</option>
                    <option value="srednia">Średnia</option>
                    <option value="wysoka">Wysoka</option>
                </select>
            </p>
            <p>
                <label for="difficulty">Trudność techniczna</label>
                <input id="difficulty" name="difficulty" type="number" min="1" max="5">
            </p>
            <p>
                <label for="fitness">Wymagana kondycja</label>
                <input id="fitness" name="fitness" type="number" min="1" max="5">
            </p>
            <p>
                <label for="hut">
                    <input id="hut" name="hut" type="checkbox" value="1">
                    Schronisko po drodze
                </label>
            </p>
            <p>
                <label for="photo">Zdjęcie główne</label>
                <input id="photo" name="photo" type="file" accept="image/*">
            </p>
            <p><button type="submit">Zapisz szlak</button></p>
        </form>
    </main>

    <footer>
        <p>Grań</p>
    </footer>
</body>
</html>
