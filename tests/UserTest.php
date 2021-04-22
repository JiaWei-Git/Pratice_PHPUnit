<?php
use PHPUnit\Framework\TestCase;
class UserTest extends TestCase
{
    public function testReturnFullName()
    {
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

    public function testNotificationIsSend()
    {
        $user = new User();
        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer->expects($this->once())
            ->method("sendMessage")
            ->with($this->equalTo("example@gmail.com"), $this->equalTo("Hello"))
            ->willReturn(true);
        $user->setMailer($mock_mailer);
        $user->email = "example@gmail.com";
        $this->assertTrue($user->notify("Hello"));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User();
        $mock_mailer = $this->getMockBuilder(Mailer::class)
                        ->setMethods(NULL)
                        ->getMock();
        $user->setMailer($mock_mailer);
        $this->expectException(Exception::class);
        $user->notify("Hello");
    }
}