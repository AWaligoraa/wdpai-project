<main class="page">
        <section class="page-intro">
            <p class="eyebrow">
                Szlak <?= (int) $trailId ?> · crux <?= (int) $cruxId ?>
            </p>
            <h1><?= htmlspecialchars((string) $cruxName, ENT_QUOTES, 'UTF-8') ?></h1>
            <p>
                Najtrudniejsze miejsce na trasie: opis, zdjęcie i film przejścia.
            </p>
        </section>

        <section class="card">
            <h2>Opis</h2>
            <p>
                Strome miejsce z łańcuchami. Przejście wymaga uwagi i pewnego kroku.
            </p>
            <p>
                <a class="button" href="/trails/<?= (int) $trailId ?>">Wróć do szlaku</a>
            </p>
        </section>

        <section class="detail-grid">
            <article class="card media-placeholder">
                <h2>Zdjęcie</h2>
                <p>Tu będzie zdjęcie cruxu.</p>
            </article>
            <article class="card media-placeholder">
                <h2>Film</h2>
                <p>Tu będzie film z przejścia cruxu.</p>
            </article>
        </section>
    </main>
