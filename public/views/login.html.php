<main class="page">
        <section class="page-intro">
            <p class="eyebrow">Konto</p>
            <h1>Logowanie</h1>
            <p>Zaloguj się, aby zarządzać szlakami i cruxami.</p>
        </section>

        <section class="card">
            <form class="trail-form" method="post" action="/login">
                <div class="form-grid">
                    <p class="field field-wide">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" required autocomplete="email">
                    </p>
                    <p class="field field-wide">
                        <label for="password">Hasło</label>
                        <input id="password" name="password" type="password" required autocomplete="current-password">
                    </p>
                </div>
                <p class="form-actions">
                    <button type="submit">Zaloguj</button>
                    <a href="/register">Załóż konto</a>
                </p>
            </form>
        </section>
    </main>
