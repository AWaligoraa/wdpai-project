<?php

declare(strict_types=1);

namespace App\Controller;

final class TrailController extends AppController
{
    public function index(): void
    {
        $this->render('trails', [
            'pageTitle' => 'Szlaki',
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
}