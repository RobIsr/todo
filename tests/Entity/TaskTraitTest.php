<?php

namespace App\Entity\Todo;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for entity PlainTask.
 */
class TaskTraitTest extends TestCase
{
    /**
     * Call getId on the TaskTrait Object and confim result
     * is null, since this should be auto generated via Doctrine.
     */
    public function testgetId()
    {
        $taskTrait = $this->getObjectForTrait(TaskTrait::class);
        $result = $taskTrait->getId();
        $this->assertEquals(null, $result);
    }

    /**
     * Call getUserId on the TaskTrait Object and confim result
     * is the same as the one set via setUserId.
     */
    public function testGetAndSetUserId()
    {
        $taskTrait = $this->getObjectForTrait(TaskTrait::class);
        $taskTrait->setUserId(1);
        $result = $taskTrait->getUserId();
        $this->assertEquals(1, $result);
    }

    /**
     * Call getTitle on the TaskTrait Object and confim result
     * is the same as the one set via setTitle.
     */
    public function testGetAndSetTitle()
    {
        $taskTrait = $this->getObjectForTrait(TaskTrait::class);
        $taskTrait->setTitle("Title");
        $result = $taskTrait->getTitle();
        $this->assertEquals("Title", $result);
    }
}
