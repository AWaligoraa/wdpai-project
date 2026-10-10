# Nazwa projektu

Aplikacja internetowa realizowana w ramach przedmiotu WdPAI — środowisko kontenerowe oparte o PHP i Nginx.

## Funkcje

| Obszar | Co robi |
|---|---|
| Strona startowa | Wyświetla stronę powitalną i weryfikuje poprawne działanie PHP oraz Nginx |

## Tech stack

| Warstwa | Technologie |
|---|---|
| Backend | PHP 8.3 |
| Serwer HTTP | Nginx |
| Konteneryzacja | Docker Compose |

## Szybki start

```bash
git clone https://github.com/AWaligoraa/wdpai-project
cd REPOZYTORIUM
docker compose up --build -d
```

Aplikacja: http://localhost:8080

## Struktura projektu

```text
├── docker/
│   ├── nginx/
│   │   ├── Dockerfile       # Obraz Nginx z konfiguracją hosta
│   │   └── nginx.conf       # Konfiguracja serwera HTTP (przekierowania do PHP-FPM)
│   └── php/
│       └── Dockerfile       # Obraz PHP 8.3-FPM (Alpine)
├── public/
│   └── index.php            # Główny punkt wejścia aplikacji 
├── .gitignore               # Pliki ignorowane przez Gita (np. .env, vendor/)
├── docker-compose.yml       # Definicja kontenerów (serwer Nginx + usługa PHP-FPM)
└── README.md                # Dokumentacja projektu
```
## Zasady developmentu

- Branch dla każdej funkcji.
- Małe, logiczne commity.
- Sekrety wyłącznie w .env.

## Autorzy

- Adrian Waligóra — zakres odpowiedzialności