<main class="page">
        <section class="page-intro">
            <p class="eyebrow">Konto</p>
            <h1>Rejestracja</h1>
            <p>Utwórz konto, aby dodawać i edytować szlaki.</p>
        </section>

        <section class="card">
            <form class="trail-form" method="post" action="/register">
                <div class="form-grid">
                    <p class="field field-wide">
                        <label for="name">Imię</label>
                        <input id="name" name="name" type="text" required autocomplete="name">
                    </p>
                    <p class="field field-wide">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" required autocomplete="email">
                    </p>
                    <p class="field field-wide">
                        <label for="password">Hasło</label>
                        <input id="password" name="password" type="password" required autocomplete="new-password">
                    </p>
                </div>
                <p class="form-actions">
                    <button type="submit">Zarejestruj</button>
                    <a href="/login">Mam już konto</a>
                </p>
            </form>
        </section>
    </main>
