<?php
use PHPUnit\Framework\TestCase;
class QueueTest extends TestCase
{
    public function testNewQueueIsEmpty() {
        $queue = new Queue();
        $this->assertEquals(0, $queue->getCount());
    }

    public function testAnItemIsAddedToQueue() {
        $queue = new Queue();
        $queue->push("Q1");
        $this->assertEquals(1, $queue->getCount());
    }

    public function testAnItemIsRemoveToQueue() {
        $queue = new Queue();
        $queue->push("Q1");
        $item = $queue->pop();
        $this->assertEquals(0, $queue->getCount());
        $this->assertEquals("Q1", $item);
    }
}