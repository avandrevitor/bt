<?php namespace BT;

class BinaryDigitTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var BinaryDigit
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new BinaryDigit(1024);
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
     * @covers BT\BinaryDigit::getSize
     * @covers BT\BinaryDigit::setSize
     */
    public function testSize()
    {
        $this->assertInternalType("float", $this->object->getSize());
        
        $newSize = 1024*1024;
        $this->object->setSize($newSize);
        $this->assertInternalType("float", $this->object->getSize());
    }
    
    public function testChangeLabel()
    {
        $newSize = 1024*1024;
        $this->object->setSize($newSize);
        $this->assertInternalType("float", $this->object->getSize());
        $this->assertEquals("MB",$this->object->getSymbol());
    }
    
    /**
     * @covers BT\BinaryDigit::__construct
     * @covers BT\BinaryDigit::__toString
     */
    public function testFunctional()
    {
        ob_start();
        echo new BinaryDigit(1024*1024,  BinaryDigit::PREFIX_SI,1);
        $content = ob_get_contents();
        ob_end_clean();
        
        $this->assertInternalType("string", $content);
        $this->assertEquals("1MB",$content);
    }
    
    /**
     * @covers BT\BinaryDigit::equals
     */
    public function testEquals()
    {
        $a = new BinaryDigit(64);
        $b = new BinaryDigit(64);
        $c = new BinaryDigit(32);
        $this->assertTrue($a->equals($b));
        $this->assertFalse($a->equals($c));
    }
}
