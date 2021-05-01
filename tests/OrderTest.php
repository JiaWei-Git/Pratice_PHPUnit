<?php
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testOrderIsProcess()
    {
        $geteway = $this->getMockBuilder("PaymentGeteway")
                        ->setMethods(['charge'])
                        ->getMock();
        $geteway->method("charge")
                ->willReturn(true);
        $order = new Order($geteway);
        $order->amount = 200;
        $this->assertTrue($order->process());
    }

    public function testOrderIsProcessUsingMockery()
    {
        $geteway = Mockery::mock('PaymentGeteway');
        $geteway->shouldReceive('charge')
                ->once()       
                ->with(200)
                ->andReturn(true);   
        
        $order = new Order($geteway);
        $order->amount = 200;
        $this->assertTrue($order->process());
    }
}