<?php

declare(strict_types=1);

namespace App\Repository;

final class TrailRepository
{
    /**
     * @return list<array{
     *     id: int,
     *     name: string,
     *     image: string,
     *     imageAlt: string,
     *     lengthKm: float,
     *     elevationM: int,
     *     durationHours: float,
     *     exposure: string,
     *     technical: int,
     *     fitness: int,
     *     hasHut: bool
     * }>
     */
    public function all(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Orla Perć',
                'image' => '/images/trail-orla-perc.jpg',
                'imageAlt' => 'Grań Orlej Perci',
                'lengthKm' => 4.5,
                'elevationM' => 1150,
                'durationHours' => 8.0,
                'exposure' => 'wysoka',
                'technical' => 5,
                'fitness' => 5,
                'hasHut' => false,
            ],
            [
                'id' => 2,
                'name' => 'Czerwone Wierchy',
                'image' => '/images/trail-czerwone-wierchy.jpg',
                'imageAlt' => 'Widok z Czerwonych Wierchów',
                'lengthKm' => 16.2,
                'elevationM' => 1240,
                'durationHours' => 7.0,
                'exposure' => 'srednia',
                'technical' => 3,
                'fitness' => 4,
                'hasHut' => false,
            ],
            [
                'id' => 3,
                'name' => 'Dolina Pięciu Stawów',
                'image' => '/images/trail-piec-stawow.jpg',
                'imageAlt' => 'Dolina Pięciu Stawów Polskich',
                'lengthKm' => 8.0,
                'elevationM' => 420,
                'durationHours' => 6.0,
                'exposure' => 'niska',
                'technical' => 2,
                'fitness' => 3,
                'hasHut' => true,
            ],
        ];
    }

    /**
     * @param array{
     *     exposure?: string|null,
     *     technical_min?: int|null,
     *     technical_max?: int|null,
     *     fitness_min?: int|null,
     *     fitness_max?: int|null,
     *     km_min?: float|null,
     *     km_max?: float|null,
     *     elevation_min?: int|null,
     *     elevation_max?: int|null,
     *     huts?: bool
     * } $filters
     * @return list<array<string, mixed>>
     */
    public function filter(array $filters): array
    {
        return array_values(array_filter(
            $this->all(),
            static function (array $trail) use ($filters): bool {
                if (
                    isset($filters['exposure'])
                    && $filters['exposure'] !== null
                    && $filters['exposure'] !== ''
                    && $trail['exposure'] !== $filters['exposure']
                ) {
                    return false;
                }

                if (
                    isset($filters['technical_min'])
                    && $filters['technical_min'] !== null
                    && $trail['technical'] < $filters['technical_min']
                ) {
                    return false;
                }

                if (
                    isset($filters['technical_max'])
                    && $filters['technical_max'] !== null
                    && $trail['technical'] > $filters['technical_max']
                ) {
                    return false;
                }

                if (
                    isset($filters['fitness_min'])
                    && $filters['fitness_min'] !== null
                    && $trail['fitness'] < $filters['fitness_min']
                ) {
                    return false;
                }

                if (
                    isset($filters['fitness_max'])
                    && $filters['fitness_max'] !== null
                    && $trail['fitness'] > $filters['fitness_max']
                ) {
                    return false;
                }

                if (
                    isset($filters['km_min'])
                    && $filters['km_min'] !== null
                    && $trail['lengthKm'] < $filters['km_min']
                ) {
                    return false;
                }

                if (
                    isset($filters['km_max'])
                    && $filters['km_max'] !== null
                    && $trail['lengthKm'] > $filters['km_max']
                ) {
                    return false;
                }

                if (
                    isset($filters['elevation_min'])
                    && $filters['elevation_min'] !== null
                    && $trail['elevationM'] < $filters['elevation_min']
                ) {
                    return false;
                }

                if (
                    isset($filters['elevation_max'])
                    && $filters['elevation_max'] !== null
                    && $trail['elevationM'] > $filters['elevation_max']
                ) {
                    return false;
                }

                if (!empty($filters['huts']) && !$trail['hasHut']) {
                    return false;
                }

                return true;
            },
        ));
    }
}
