<?php
namespace BT;

class TimerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Timer
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Timer();
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
     * @covers BT\Timer::start
     * @covers BT\Timer::getStart
     */
    public function testStarting()
    {
        $this->assertInternalType("float", $this->object->getStart());
        $this->object->start();
        $this->assertInternalType("float", $this->object->getStart());
        $this->assertGreaterThan(0.0, $this->object->getStart());
    }
    
    /**
     * @covers BT\Timer::start
     * @covers BT\Timer::stop
     * @covers BT\Timer::getStop
     */
    public function testStopping()
    {
        $this->assertInternalType("float", $this->object->getStop());
        $this->object->start();
        $this->object->stop();
        $this->assertInternalType("float", $this->object->getStop());
        $this->assertGreaterThan(0.0, $this->object->getStop());
    }
    
    /**
     * @covers BT\Timer::reset
     */
    public function testReset()
    {
        $this->object->start();
        $this->object->stop();
        
        $this->assertInternalType("float", $this->object->getStart());
        $this->assertInternalType("float", $this->object->getStop());
        
        $this->object->reset();
        
        $this->assertInternalType("float", $this->object->getStart());
        $this->assertInternalType("float", $this->object->getStop());
    }
    
    /**
     * @covers BT\Timer::diffBetweenPoints
     */
    public function testDiffBetweenPoints()
    {
        $this->object->start();
        $this->object->stop();
        
        $this->assertInternalType("float", $this->object->diffBetweenPoints());
        $this->assertGreaterThan(0.0, $this->object->diffBetweenPoints());
    }
    
    /**
     * @covers BT\Timer::diffBetweenPoints
     * @expectedException \LogicException
     */
    public function testFaieldDiffBetweenPointsOne()
    {
        $this->object->diffBetweenPoints();
    }
    
    /**
     * @covers BT\Timer::diffBetweenPoints
     * @expectedException \LogicException
     */
    public function testFaieldDiffBetweenPointsTwo()
    {
        $this->object->start();
        $this->object->diffBetweenPoints();
    }
    
    /**
     * @covers BT\Timer::diffBetweenPoints
     * @expectedException \LogicException
     */
    public function testFaieldDiffBetweenPointsTree()
    {
        $this->object->stop();
        $this->object->diffBetweenPoints();
    }
    
    public function testToString()
    {
        $this->object->start();
        $this->object->stop();
        
        ob_start();
        echo $this->object;
        $content = ob_get_contents();
        ob_end_clean();
        
        $this->assertInternalType("string", $content);
        $this->assertNotEmpty($content);
    }
}
