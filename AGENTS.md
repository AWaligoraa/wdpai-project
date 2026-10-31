# AGENTS.md

Ten plik jest przewodnikiem dla agentów AI pracujących w tym repozytorium. Przed wprowadzeniem zmian przeczytaj go razem z `README.md` i sprawdź aktualny stan kodu. Nie zakładaj, że opisana funkcja istnieje, dopóki nie potwierdzisz tego w plikach projektu.

## Cel projektu

Grań to edukacyjna aplikacja webowa do wyszukiwania szlaków w polskich Tatrach. Użytkownik ma filtrować trasy po ekspozycji, trudności, kondycji, długości, przewyższeniu i schroniskach, a potem zobaczyć opis szlaku oraz crux ze zdjęciem i filmem.

Aplikacja jest napisana w czystym PHP 8.3 i korzysta z lekkiej, samodzielnie zaimplementowanej architektury MVC, bez frameworka PHP. Działa w kontenerach Nginx i PHP-FPM uruchamianych przez Docker Compose. PostgreSQL jest w Compose, ale aplikacja jeszcze z niego nie korzysta. Dane na widokach są na razie wpisane na sztywno.

Aktualnie aplikacja obsługuje:

- stronę główną pod `/`,
- listę szlaków pod `/trails`,
- formularz dodawania szlaku pod `/trails/new` (bez zapisu),
- szczegóły szlaku pod `/trails/{id}`,
- szczegóły cruxu pod `/trails/{id}/cruxes/{cruxId}`,
- laboratoryjne trasy `/projects` i `/projects/{id}`,
- odpowiedź 404 dla nieznanych tras.

## Stack technologiczny

- PHP 8.3 z `declare(strict_types=1)`
- Composer i autoloading PSR-4
- Nginx jako serwer HTTP
- PHP-FPM do wykonywania kodu PHP
- Docker oraz Docker Compose
- PostgreSQL przygotowany w Compose, jeszcze niepodłączony do aplikacji
- HTML i CSS bez frameworka frontendowego

## Struktura katalogów

```text
.
├── docker/
│   ├── nginx/                 # obraz i konfiguracja Nginx
│   ├── php/                   # obraz PHP-FPM i rozszerzenia PHP
│   └── db/                    # obraz PostgreSQL
├── public/                    # jedyny publicznie dostępny katalog
│   ├── css/style.css          # style, obecnie głównie strony głównej
│   ├── index.php              # front controller i definicje tras
│   └── views/                 # szablony HTML renderowane przez kontrolery
├── src/
│   ├── controllers/           # kontrolery aplikacji
│   └── Routing.php            # rejestracja i obsługa tras
├── composer.json              # konfiguracja autoloadingu
└── docker-compose.yaml        # usługi server, php, db, mailpit i pgadmin
```

Nie umieszczaj logiki aplikacji ani danych wrażliwych w `public/`. Ten katalog jest document rootem Nginx i służy tylko jako punkt wejścia oraz miejsce na widoki i zasoby publiczne.

## Architektura MVC

Projekt stosuje uproszczony przepływ MVC:

```text
przeglądarka
    -> Nginx
    -> public/index.php
    -> Routing
    -> Controller
    -> Model / serwis (gdy zostanie dodany)
    -> View
    -> odpowiedź HTML
```

### Front Controller

`public/index.php` jest jedynym punktem wejścia aplikacji. Ładuje autoloader Composera, rejestruje trasy, przekazuje metodę HTTP i URI do routera oraz uruchamia widok 404, gdy żadna trasa nie pasuje.

Nowe trasy dodawaj w tym pliku w postaci:

```php
$routing->get('/example', ExampleController::class, 'index');
$routing->post('/example', ExampleController::class, 'store');
```

Trasę statyczną, na przykład `/trails/new`, rejestruj przed wzorcem `/trails/{id}`.

### Router

`src/Routing.php` łączy metodę HTTP i ścieżkę URL z publiczną metodą kontrolera. Parametry zapisane jako `{name}` są obecnie dopasowywane tylko do cyfr, konwertowane na `int` i przekazywane do akcji kontrolera przez nazwane argumenty.

Przykład: `/trails/{id}/cruxes/{cruxId}` wywołuje `CruxController::showCrux(int $id, int $cruxId)`.

Router obsługuje obecnie metody GET i POST. Nie dodawaj logiki biznesowej do routera.

### Controller

Kontrolery znajdują się w `src/controllers/`, używają przestrzeni nazw `App\Controller` i dziedziczą po `AppController`.

- `DefaultController` obsługuje stronę główną i 404.
- `TrailController` obsługuje listę, formularz i szczegóły szlaku.
- `CruxController` obsługuje szczegóły cruxu.
- `ProjectController` to trasa z laboratorium i nie jest częścią Grań.

Zadaniem kontrolera jest odebranie danych, przygotowanie ich dla widoku i wybranie szablonu przez `$this->render()`. Kontroler powinien być cienki. Nie umieszczaj w nim rozbudowanych zapytań do bazy, HTML ani stylów.

### Model

Warstwa Model nie jest jeszcze zaimplementowana. Nie udawaj, że dane widoczne w widokach pochodzą z bazy danych. Gdy funkcja wymaga trwałego przechowywania danych, wydziel klasy modelu albo repozytorium zamiast dodawać zapytania SQL do kontrolera.

Dla nowych klas zgodnych z mapowaniem `App\` w Composerze preferuj katalogi i nazwy klas o zgodnej wielkości liter, na przykład:

```text
src/Model/Trail.php                    -> App\Model\Trail
src/Repository/TrailRepository.php     -> App\Repository\TrailRepository
```

Po dodaniu lub przeniesieniu klas odśwież autoloader poleceniem `composer dump-autoload`.

### View

Widoki znajdują się w `public/views/` i mają nazwy `*.html.php`. `AppController::render()` przekazuje do nich dane jako zmienne przy użyciu `extract(..., EXTR_SKIP)`.

Widoki odpowiadają za prezentację. Dozwolone są w nich proste instrukcje warunkowe i pętle, ale nie logika biznesowa, dostęp do bazy ani obsługa routingu.

Każda wartość pochodząca od użytkownika lub z bazy musi być escapowana w kontekście HTML:

```php
<?= htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') ?>
```

Style trzymaj w `public/css/style.css`. Kolory i odstępy bierz ze zmiennych CSS, nie wpisuj nowych wartości szesnastkowych w regułach elementów.

## Konwencje implementacji

- Zachowuj `declare(strict_types=1)` we wszystkich nowych plikach PHP.
- Używaj deklaracji typów parametrów, zwracanych wartości i właściwości.
- Nazwy klas zapisuj w `PascalCase`, a metod i zmiennych w `camelCase`.
- Nazwy techniczne w kodzie zapisuj po angielsku. Tekst interfejsu może być po polsku.
- Jeden kontroler powinien obsługiwać jeden spójny obszar aplikacji.
- Dane przekazuj do widoku jawnie w tablicy drugiego argumentu `render()`.
- Nie twórz globalnego stanu i nie używaj `$_GET`, `$_POST` ani `$_SERVER` poza warstwą wejścia, jeżeli dane można przekazać jako argument.
- Nie dodawaj frameworka ani dużej biblioteki bez wyraźnej potrzeby i zgody użytkownika.
- Sekrety umieszczaj w `.env`. Nigdy nie commituj haseł, tokenów ani danych dostępowych.
- Nie edytuj `vendor/` ręcznie.
- Zachowuj zakres zadania i nie zmieniaj niezwiązanych plików.

## Dodawanie nowej funkcji

Typowy porządek prac:

1. Dodaj trasę w `public/index.php`.
2. Dodaj albo rozszerz kontroler w `src/controllers/`.
3. Dodaj model, repozytorium lub serwis, jeśli funkcja zawiera logikę biznesową albo dostęp do danych.
4. Dodaj widok w `public/views/` i przekaż do niego tylko potrzebne dane.
5. Dodaj lub zmień style w `public/css/style.css`.
6. Sprawdź poprawną trasę, dane wejściowe, HTML oraz zachowanie dla błędów i 404.

## Uruchamianie projektu

```bash
docker compose up --build -d
```

Aplikacja jest domyślnie dostępna pod `http://localhost:8080`. Port można zmienić przez zmienną `APP_PORT`.

Przydatne polecenia:

```bash
docker compose ps
docker compose logs -f
docker compose exec php php -l src/Routing.php
docker compose exec php composer dump-autoload
docker compose down
```

Jeśli katalog `vendor/` nie istnieje, zainstaluj zależności poleceniem:

```bash
docker compose run --rm php composer install
```

## Weryfikacja zmian

W projekcie nie ma obecnie skonfigurowanego zestawu testów automatycznych ani narzędzia do formatowania. Po zmianie:

- uruchom `php -l` dla każdego zmienionego pliku PHP,
- sprawdź `composer dump-autoload`, jeżeli zmieniałeś klasy lub namespace,
- uruchom kontenery i sprawdź zmienione adresy,
- sprawdź przypadek poprawny, błędne dane oraz nieistniejącą trasę,
- upewnij się, że logi `docker compose logs` nie zawierają nowych błędów,
- nie twierdź, że testy przeszły, jeżeli ich faktycznie nie uruchomiono.

## Zasady dla agentów AI

- Najpierw przeczytaj pliki bezpośrednio związane z zadaniem i potwierdź aktualną implementację.
- Przed edycją sprawdź `git status`. Zachowaj zmiany użytkownika i nie cofaj ich.
- Wprowadzaj najmniejszą spójną zmianę realizującą wymaganie.
- Utrzymuj rozdział odpowiedzialności MVC.
- Nie rozszerzaj zakresu zadania o refaktoryzację, migracje lub nowe zależności bez uzasadnienia.
- Jeśli wymaganie jest niejednoznaczne, wybierz rozwiązanie zgodne z istniejącymi wzorcami. Pytaj tylko wtedy, gdy wybór istotnie zmieni zachowanie aplikacji.
- Po zakończeniu opisz zmienione pliki oraz wykonaną weryfikację.
- Nie odczytuj ani nie commituj sekretów z `.env`.
