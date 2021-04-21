<?php
use PHPUnit\Framework\TestCase;
class QueueTest extends TestCase
{
    public function testNewQueueIsEmpty() {
        $queue = new Queue();
        $this->assertEquals(0, $queue->getCount());

        return $queue;
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testAnItemIsAddedToQueue(Queue $queue) {
        $queue->push("Q1");
        $this->assertEquals(1, $queue->getCount());
        return $queue;
    }

    /**
     * @depends testAnItemIsAddedToQueue
     */
    public function testAnItemIsRemoveToQueue(Queue $queue) {
        $item = $queue->pop();
        $this->assertEquals(0, $queue->getCount());
        $this->assertEquals("Q1", $item);
    }
}