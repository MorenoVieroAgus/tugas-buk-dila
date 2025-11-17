<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/AuthService.php';

class AuthServiceTest extends TestCase
{
    public function test_register_new_user()
    {
        $auth = new AuthService();
        $this->assertTrue($auth->register("user@mail.com", "1234"));
    }

    public function test_register_duplicate()
    {
        $auth = new AuthService();
        $auth->register("user@mail.com", "1234");
        $this->assertFalse($auth->register("user@mail.com", "9999"));
    }

    public function test_login_success()
    {
        $auth = new AuthService();
        $auth->register("user@mail.com", "1234");
        $this->assertTrue($auth->login("user@mail.com", "1234"));
    }

    public function test_login_failed()
    {
        $auth = new AuthService();
        $this->assertFalse($auth->login("user@mail.com", "xxxx"));
    }
}
