<?php

namespace App\Entity\Todo;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for entity PlainTask.
 */
class PlainTaskTest extends TestCase
{
    /**
     * Construct object and verify that the object is of the expected
     * instance.
     */
    public function testCreateObject()
    {
        $plainTask = new PlainTask();
        $this->assertInstanceOf("\App\Entity\Todo\PlainTask", $plainTask);
    }

    /**
     * Call setMessage on the plainTask Object and confim result
     * via getMessage is equal.
     */
    public function testSetAndGetMessage()
    {
        $plainTask = new PlainTask();
        $plainTask->setMessage("Test message");
        $result = $plainTask->getMessage();
        $this->assertEquals("Test message", $result);
    }
}
