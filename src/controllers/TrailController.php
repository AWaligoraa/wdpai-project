<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\TrailRepository;

final class TrailController extends AppController
{
    public function index(): void
    {
        $filters = $this->readFilters($_GET);
        $trails = (new TrailRepository())->filter($filters);

        $this->render('trails', [
            'pageTitle' => 'Szlaki',
            'trails' => $trails,
            'filters' => $filters,
        ]);
    }

    public function create(): void
    {
        $this->render('trail-form', [
            'pageTitle' => 'Dodaj szlak',
        ]);
    }

    public function show(int $id): void
    {
        $this->render('trail', [
            'pageTitle' => 'Szczegóły trasy',
            'trailId' => $id,
            'trailName' => 'Nazwa trasy',
            'difficulty' => 'Średnia',
            'length' => '10 km',
        ]);
    }

    /**
     * @param array<string, mixed> $query
     * @return array{
     *     exposure: string|null,
     *     technical_min: int|null,
     *     technical_max: int|null,
     *     fitness_min: int|null,
     *     fitness_max: int|null,
     *     km_min: float|null,
     *     km_max: float|null,
     *     elevation_min: int|null,
     *     elevation_max: int|null,
     *     huts: bool
     * }
     */
    private function readFilters(array $query): array
    {
        $allowedExposure = ['niska', 'srednia', 'wysoka', 'skrajna'];
        $exposure = isset($query['exposure']) ? (string) $query['exposure'] : '';

        return [
            'exposure' => in_array($exposure, $allowedExposure, true) ? $exposure : null,
            'technical_min' => $this->optionalInt($query['technical_min'] ?? null, 1, 5),
            'technical_max' => $this->optionalInt($query['technical_max'] ?? null, 1, 5),
            'fitness_min' => $this->optionalInt($query['fitness_min'] ?? null, 1, 5),
            'fitness_max' => $this->optionalInt($query['fitness_max'] ?? null, 1, 5),
            'km_min' => $this->optionalFloat($query['km_min'] ?? null, 0, 100),
            'km_max' => $this->optionalFloat($query['km_max'] ?? null, 0, 100),
            'elevation_min' => $this->optionalInt($query['elevation_min'] ?? null, 0, 5000),
            'elevation_max' => $this->optionalInt($query['elevation_max'] ?? null, 0, 5000),
            'huts' => isset($query['huts']) && (string) $query['huts'] === '1',
        ];
    }

    private function optionalInt(mixed $value, int $min, int $max): ?int
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (!is_numeric($value)) {
            return null;
        }

        $number = (int) $value;

        if ($number < $min || $number > $max) {
            return null;
        }

        return $number;
    }

    private function optionalFloat(mixed $value, float $min, float $max): ?float
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (!is_numeric($value)) {
            return null;
        }

        $number = (float) $value;

        if ($number < $min || $number > $max) {
            return null;
        }

        return $number;
    }
}
