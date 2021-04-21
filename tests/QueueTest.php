<?php
use PHPUnit\Framework\TestCase;
class QueueTest extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    protected function tearDown(): void
    {
        unset($this->queue);
    }

    public function testNewQueueIsEmpty() {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToQueue() {
        $this->queue->push("Q1");
        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemoveToQueue() {
        $this->queue->push("Q1");
        $item = $this->queue->pop();
        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals("Q1", $item);
    }
}