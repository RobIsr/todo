<?php

namespace App\Entity\Todo;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for entity PlainTask.
 */
class ShoppingTaskTest extends TestCase
{
    /**
     * Construct object and verify that the object is of the expected
     * instance.
     */
    public function testCreateObject()
    {
        $plainTask = new ShoppingTask();
        $this->assertInstanceOf("\App\Entity\Todo\ShoppingTask", $plainTask);
    }

    /**
     * Call setProducts on the shoppingTask Object and confim result
     * via getProducts is equal.
     */
    public function testSetAndGetProducts()
    {
        $plainTask = new ShoppingTask();
        $plainTask->setProducts(["Bröd","Mjölk"]);
        $result = $plainTask->getProducts();
        $this->assertEquals(["Bröd", "Mjölk"], $result);
    }

    /**
     * Call getType on the shoppingTask Object and confirm that
     * the correct type is returned
     */
    public function testGetType()
    {
        $plainTask = new ShoppingTask();
        $result = $plainTask->getType();
        $this->assertEquals("ShoppingTask", $result);
    }
}
