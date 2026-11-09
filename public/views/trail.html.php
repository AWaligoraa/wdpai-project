<main class="page">
        <section class="page-intro">
            <p class="eyebrow">Szlak <?= (int) $trailId ?></p>
            <h1><?= htmlspecialchars((string) $trailName, ENT_QUOTES, 'UTF-8') ?></h1>
            <p>
                Opis trasy, parametry i miejsca wymagające uwagi przed wyjściem
                na grań.
            </p>
        </section>

        <section class="detail-grid">
            <article class="card">
                <h2>Parametry</h2>
                <dl class="spec-list">
                    <div>
                        <dt>Długość</dt>
                        <dd><?= htmlspecialchars((string) $length, ENT_QUOTES, 'UTF-8') ?></dd>
                    </div>
                    <div>
                        <dt>Trudność</dt>
                        <dd><?= htmlspecialchars((string) $difficulty, ENT_QUOTES, 'UTF-8') ?></dd>
                    </div>
                </dl>
            </article>

            <article class="card">
                <h2>Opis</h2>
                <p>
                    Szlak prowadzący granią. Po drodze są miejsca wymagające uwagi:
                    ekspozycja, łańcuchy i strome odcinki.
                </p>
            </article>
        </section>

        <section>
            <h2>Cruxy</h2>
            <ol class="card-grid crux-list">
                <li class="card">
                    <h3>Komin na Kozią Przełęcz</h3>
                    <p class="meta">Crux 1</p>
                    <a class="button" href="/trails/<?= (int) $trailId ?>/cruxes/1">Zobacz crux</a>
                </li>
                <li class="card">
                    <h3>Grań za Kozimi Czubami</h3>
                    <p class="meta">Crux 2</p>
                    <a class="button" href="/trails/<?= (int) $trailId ?>/cruxes/2">Zobacz crux</a>
                </li>
                <li class="card">
                    <h3>Żleb Kulczyńskiego</h3>
                    <p class="meta">Crux 3</p>
                    <a class="button" href="/trails/<?= (int) $trailId ?>/cruxes/3">Zobacz crux</a>
                </li>
            </ol>
        </section>

        <section class="card media-placeholder">
            <h2>Mapa</h2>
            <p>Tu będzie mapa z zaznaczonymi cruxami.</p>
        </section>
    </main>
