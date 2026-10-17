<?php

declare(strict_types=1);

namespace App\Controller;

final class CruxController extends AppController
{
    public function showCrux(int $id, int $cruxId): void
    {
        $cruxNames = [
            1 => 'Komin na Kozią Przełęcz',
            2 => 'Grań za Kozimi Czubami',
            3 => 'Żleb Kulczyńskiego',
        ];

        $this->render('crux', [
            'pageTitle' => 'Szczegóły cruxu',
            'trailId' => $id,
            'cruxId' => $cruxId,
            'cruxName' => $cruxNames[$cruxId] ?? 'Crux',
        ]);
    }
}