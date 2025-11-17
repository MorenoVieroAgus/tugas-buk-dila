<?php
class AuthService {
    private $users = [];

    public function register($email, $password) {
        foreach ($this->users as $u) {
            if ($u['email'] === $email) {
                return false;
            }
        }
        $this->users[] = [
            'email' => $email,
            'password' => $password
        ];
        return true;
    }

    public function login($email, $password) {
        foreach ($this->users as $u) {
            if ($u['email'] === $email && $u['password'] === $password) {
                return true;
            }
        }
        return false;
    }
}
