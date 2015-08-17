<?php namespace BT;

class MemoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Memory
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Memory;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->object = null;
    }

    /**
     * @covers BT\Memory::__toString
     */
    public function testToString()
    {
        ob_start();
        echo $this->object;
        $content = ob_get_contents();
        ob_end_clean();
        
        $this->assertInternalType("string", $content);
    }
    
    /**
     * @covers BT\Memory::used
     */
    public function testUsed()
    {
        $this->assertInstanceOf("\BT\BinaryDigit", $this->object->used());
        $this->assertInstanceOf("\BT\BinaryDigit", $this->object->used());
    }
    
    public function testAllocated()
    {
        $this->assertInstanceOf("\BT\BinaryDigit", $this->object->allocated());
        $this->assertInstanceOf("\BT\BinaryDigit", $this->object->allocated());
    }
}
