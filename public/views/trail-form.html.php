<main class="page">
        <section class="page-intro">
            <p class="eyebrow">Panel administracyjny</p>
            <h1>Dodaj szlak</h1>
            <p>
                Formularz nowego szlaku. Na razie nie zapisuje danych do bazy.
            </p>
        </section>

        <section class="card">
            <form class="trail-form" method="get" action="/trails/new">
                <div class="form-grid">
                    <p class="field field-wide">
                        <label for="name">Nazwa szlaku</label>
                        <input id="name" name="name" type="text" required>
                    </p>
                    <p class="field">
                        <label for="region">Region</label>
                        <input id="region" name="region" type="text">
                    </p>
                    <p class="field field-wide">
                        <label for="description">Opis</label>
                        <textarea id="description" name="description" rows="4"></textarea>
                    </p>
                    <p class="field">
                        <label for="length">Długość (km)</label>
                        <input id="length" name="length" type="number" min="0" step="0.1">
                    </p>
                    <p class="field">
                        <label for="elevation">Przewyższenie (m)</label>
                        <input id="elevation" name="elevation" type="number" min="0">
                    </p>
                    <p class="field">
                        <label for="exposure">Ekspozycja</label>
                        <select id="exposure" name="exposure">
                            <option value="niska">Niska</option>
                            <option value="srednia">Średnia</option>
                            <option value="wysoka">Wysoka</option>
                        </select>
                    </p>
                    <p class="field">
                        <label for="difficulty">Trudność techniczna</label>
                        <input id="difficulty" name="difficulty" type="number" min="1" max="5">
                    </p>
                    <p class="field">
                        <label for="fitness">Wymagana kondycja</label>
                        <input id="fitness" name="fitness" type="number" min="1" max="5">
                    </p>
                    <p class="field field-checkbox">
                        <label for="hut">
                            <input id="hut" name="hut" type="checkbox" value="1">
                            Schronisko po drodze
                        </label>
                    </p>
                    <p class="field field-wide">
                        <label for="photo">Zdjęcie główne</label>
                        <input id="photo" name="photo" type="file" accept="image/*">
                        <span class="meta">Na razie bez wgrywania pliku na serwer.</span>
                    </p>
                </div>
                <p class="form-actions">
                    <button type="submit">Zapisz szlak</button>
                    <a href="/trails">Anuluj</a>
                </p>
            </form>
        </section>
    </main>
