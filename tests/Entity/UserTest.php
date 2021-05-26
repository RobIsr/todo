<?php

namespace App\Entity;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for entity User.
 */
class UserTest extends TestCase
{
    /**
     * Construct object and verify that the object is of the expected
     * instance.
     */
    public function testCreateObject()
    {
        $user = new User();
        $this->assertInstanceOf("\App\Entity\User", $user);
    }

    /**
     * Call getId on the User Object and confim result
     * is null, since this should be auto generated via Doctrine.
     */
    public function testgetId()
    {
        $user = new User();
        $result = $user->getId();
        $this->assertEquals(null, $result);
    }

    /**
     * Call setEmail on the user Object and confim result
     * via getEmail is equal.
     */
    public function testSetAndGetMessage()
    {
        $user = new User();
        $user->setEmail("test@test.com");
        $result = $user->getEmail();
        $this->assertEquals("test@test.com", $result);
    }

    /**
     * Call getUsername on the user Object and confim result
     * is the same as email address set with setEmail.
     */
    public function testGetUsername()
    {
        $user = new User();
        $user->setEmail("test@test.com");
        $result = $user->getUserName();
        $this->assertEquals("test@test.com", $result);
    }

    /**
     * Call setRoles on the user Object and confim result
     * via getRoles is equal and that the default role "ROLE_USER" is added.
     */
    public function testGetAndSetRoles()
    {
        $user = new User();
        $user->setRoles(["ROLE_1", "ROLE_2"]);
        $result = $user->getRoles();
        $this->assertEquals(["ROLE_1", "ROLE_2", "ROLE_USER"], $result);
    }

    /**
     * Call getPassword on the user Object and confim result
     * is the same as password set with setPassword.
     */
    public function testGetAndSetPassword()
    {
        $user = new User();
        $user->setPassword("password");
        $result = $user->getPassword();
        $this->assertEquals("password", $result);
    }

    /**
     * Call getSalt on the user Object and confim result
     * is null as bcrypt hashing algorithm is used.
     */
    public function testGetSalt()
    {
        $user = new User();
        $result = $user->getSalt();
        $this->assertEquals(null, $result);
    }

    /**
     * Call eraseCredentials on the user Object and confim result
     * is null.
     */
    public function testEraseCredentials()
    {
        $user = new User();
        $result = $user->eraseCredentials();
        $this->assertEquals(null, $result);
    }
}
