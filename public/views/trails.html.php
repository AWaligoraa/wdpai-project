<?php
$exposureLabels = [
    'niska' => 'niska',
    'srednia' => 'średnia',
    'wysoka' => 'wysoka',
    'skrajna' => 'skrajna',
];
$trailCount = count($trails);
$resultLabel = $trailCount === 1 ? '1 szlak' : $trailCount . ' szlaki';
if ($trailCount === 0 || $trailCount >= 5) {
    $resultLabel = $trailCount . ' szlaków';
}
?>
<main class="page">
        <section class="page-intro">
            <p class="eyebrow">Odkrywaj szlaki</p>
            <h1>Szlaki</h1>
            <p>
                Filtry ustawiasz z boku jako zakresy od–do. Wyniki pojawiają się
                obok, ze zdjęciem gdy je dodamy.
            </p>
        </section>

        <div class="trails-layout">
            <aside class="card filters-sidebar" aria-labelledby="filters-title">
                <h2 id="filters-title">Filtry</h2>
                <form class="filter-form" method="get" action="/trails">
                    <fieldset class="filter-group">
                        <legend>Ekspozycja</legend>
                        <p class="field">
                            <label for="exposure">Poziom</label>
                            <select id="exposure" name="exposure">
                                <option value="">Dowolna</option>
                                <?php foreach (['niska' => 'Niska', 'srednia' => 'Średnia', 'wysoka' => 'Wysoka', 'skrajna' => 'Skrajna'] as $value => $label): ?>
                                    <option
                                        value="<?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>"
                                        <?= ($filters['exposure'] ?? null) === $value ? 'selected' : '' ?>
                                    >
                                        <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </p>
                    </fieldset>

                    <fieldset class="filter-group">
                        <legend>Trudność techniczna</legend>
                        <div class="range-row">
                            <p class="field">
                                <label for="technical-min">Od</label>
                                <input
                                    id="technical-min"
                                    name="technical_min"
                                    type="number"
                                    min="1"
                                    max="5"
                                    placeholder="1"
                                    value="<?= $filters['technical_min'] !== null ? (int) $filters['technical_min'] : '' ?>"
                                >
                            </p>
                            <p class="field">
                                <label for="technical-max">Do</label>
                                <input
                                    id="technical-max"
                                    name="technical_max"
                                    type="number"
                                    min="1"
                                    max="5"
                                    placeholder="5"
                                    value="<?= $filters['technical_max'] !== null ? (int) $filters['technical_max'] : '' ?>"
                                >
                            </p>
                        </div>
                    </fieldset>

                    <fieldset class="filter-group">
                        <legend>Wymagana kondycja</legend>
                        <div class="range-row">
                            <p class="field">
                                <label for="fitness-min">Od</label>
                                <input
                                    id="fitness-min"
                                    name="fitness_min"
                                    type="number"
                                    min="1"
                                    max="5"
                                    placeholder="1"
                                    value="<?= $filters['fitness_min'] !== null ? (int) $filters['fitness_min'] : '' ?>"
                                >
                            </p>
                            <p class="field">
                                <label for="fitness-max">Do</label>
                                <input
                                    id="fitness-max"
                                    name="fitness_max"
                                    type="number"
                                    min="1"
                                    max="5"
                                    placeholder="5"
                                    value="<?= $filters['fitness_max'] !== null ? (int) $filters['fitness_max'] : '' ?>"
                                >
                            </p>
                        </div>
                    </fieldset>

                    <fieldset class="filter-group">
                        <legend>Długość (km)</legend>
                        <div class="range-row">
                            <p class="field">
                                <label for="km-min">Od</label>
                                <input
                                    id="km-min"
                                    name="km_min"
                                    type="number"
                                    min="0"
                                    step="0.1"
                                    placeholder="0"
                                    value="<?= $filters['km_min'] !== null ? htmlspecialchars((string) $filters['km_min'], ENT_QUOTES, 'UTF-8') : '' ?>"
                                >
                            </p>
                            <p class="field">
                                <label for="km-max">Do</label>
                                <input
                                    id="km-max"
                                    name="km_max"
                                    type="number"
                                    min="0"
                                    step="0.1"
                                    placeholder="30"
                                    value="<?= $filters['km_max'] !== null ? htmlspecialchars((string) $filters['km_max'], ENT_QUOTES, 'UTF-8') : '' ?>"
                                >
                            </p>
                        </div>
                    </fieldset>

                    <fieldset class="filter-group">
                        <legend>Przewyższenie (m)</legend>
                        <div class="range-row">
                            <p class="field">
                                <label for="elevation-min">Od</label>
                                <input
                                    id="elevation-min"
                                    name="elevation_min"
                                    type="number"
                                    min="0"
                                    placeholder="0"
                                    value="<?= $filters['elevation_min'] !== null ? (int) $filters['elevation_min'] : '' ?>"
                                >
                            </p>
                            <p class="field">
                                <label for="elevation-max">Do</label>
                                <input
                                    id="elevation-max"
                                    name="elevation_max"
                                    type="number"
                                    min="0"
                                    placeholder="2000"
                                    value="<?= $filters['elevation_max'] !== null ? (int) $filters['elevation_max'] : '' ?>"
                                >
                            </p>
                        </div>
                    </fieldset>

                    <p class="field field-checkbox">
                        <label for="huts">
                            <input
                                id="huts"
                                name="huts"
                                type="checkbox"
                                value="1"
                                <?= !empty($filters['huts']) ? 'checked' : '' ?>
                            >
                            Tylko ze schroniskiem
                        </label>
                    </p>

                    <p class="form-actions">
                        <button type="submit">Pokaż szlaki</button>
                        <a href="/trails">Wyczyść</a>
                    </p>
                </form>
            </aside>

            <section class="trails-results" aria-labelledby="results-title">
                <div class="section-heading">
                    <h2 id="results-title">Wyniki</h2>
                    <p class="meta"><?= htmlspecialchars($resultLabel, ENT_QUOTES, 'UTF-8') ?></p>
                </div>

                <?php if ($trailCount === 0): ?>
                    <p class="meta">Brak szlaków dla wybranych filtrów.</p>
                <?php else: ?>
                    <ul class="trail-results-list">
                        <?php foreach ($trails as $trail): ?>
                            <?php
                            $exposureLabel = $exposureLabels[$trail['exposure']] ?? $trail['exposure'];
                            $metaParts = [];
                            if ($trail['hasHut']) {
                                $metaParts[] = 'Schronisko po drodze';
                            } else {
                                $metaParts[] = 'Ekspozycja ' . $exposureLabel;
                            }
                            $metaParts[] = 'trudność ' . $trail['technical'] . '/5';
                            $lengthLabel = str_replace('.', ',', (string) $trail['lengthKm']);
                            $durationLabel = str_replace('.', ',', (string) $trail['durationHours']);
                            ?>
                            <li class="card trail-result-card">
                                <div class="trail-card-media">
                                    <img
                                        src="<?= htmlspecialchars((string) $trail['image'], ENT_QUOTES, 'UTF-8') ?>"
                                        alt="<?= htmlspecialchars((string) $trail['imageAlt'], ENT_QUOTES, 'UTF-8') ?>"
                                        width="800"
                                        height="520"
                                    >
                                </div>
                                <div class="trail-result-body">
                                    <h3>
                                        <a href="/trails/<?= (int) $trail['id'] ?>">
                                            <?= htmlspecialchars((string) $trail['name'], ENT_QUOTES, 'UTF-8') ?>
                                        </a>
                                    </h3>
                                    <p>
                                        <?= htmlspecialchars($lengthLabel, ENT_QUOTES, 'UTF-8') ?> km
                                        · przewyższenie <?= (int) $trail['elevationM'] ?> m
                                        · ok. <?= htmlspecialchars($durationLabel, ENT_QUOTES, 'UTF-8') ?> h
                                    </p>
                                    <p class="meta"><?= htmlspecialchars(implode(' · ', $metaParts), ENT_QUOTES, 'UTF-8') ?></p>
                                    <a class="button" href="/trails/<?= (int) $trail['id'] ?>">Szczegóły</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </section>
        </div>
    </main>
