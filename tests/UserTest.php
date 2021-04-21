<?php
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnFullName()
    {
        require 'User.php';
        $user = new User();
        $user->first_name = "Owen";
        $user->surname = "Fu";
        $this->assertEquals("Owen Fu", $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();
        $this->assertEquals("", $user->getFullName());
    }

}