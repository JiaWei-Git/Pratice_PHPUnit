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

    public function testAnItemIsRemoveFormTheFrontOfTheQueue() {
        $this->queue->push("Q1");
        $this->queue->push("Q2");
        $this->assertEquals("Q1", $this->queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded() {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }
        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function testExceptionThrowWhenAddingAnItemToFullQueue() {
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage("Queue is full");
        for ($i = 0; $i < Queue::MAX_ITEMS + 1; $i++) {
            $this->queue->push($i);
        }
    }
}