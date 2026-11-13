<?php

declare(strict_types=1);

namespace App\Controller;

final class SecurityController extends AppController
{
    public function login(): void
    {
        if ($this->isPost()) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // TODO: sprawdzić email w bazie i porównać hash hasła
            var_dump($email, $password);

            $this->render('login', [
                'pageTitle' => 'Logowanie',
            ]);
            return;
        }

        $this->render('login', [
            'pageTitle' => 'Logowanie',
        ]);
    }

    public function register(): void
    {
        if ($this->isPost()) {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // TODO: insert do bazy
            var_dump($name, $email, $password);

            $this->render('register', [
                'pageTitle' => 'Rejestracja',
            ]);
            return;
        }

        $this->render('register', [
            'pageTitle' => 'Rejestracja',
        ]);
    }
}
