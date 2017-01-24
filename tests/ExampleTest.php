<?php

namespace League\Skeleton;

class ExampleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that true does in fact equal true
     */
    public function testTrueIsTrue()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function test_false_is_false()
    {
        $this->assertFalse(false);
    }
}
