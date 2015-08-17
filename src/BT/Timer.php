<?php namespace BT;

class Timer
{

    const START_ON = 0.0;

    protected $start;
    protected $stop;

    public function start()
    {
        $this->start = microtime(true);
    }

    public function stop()
    {
        $this->stop = microtime(true);
    }

    public function getStart()
    {
        return (float) $this->start;
    }

    public function getStop()
    {
        return (float) $this->stop;
    }

    public function reset()
    {
        $this->start = $this->stop = null;
    }

    public function diffBetweenPoints()
    {
        if ($this->getStart() == self::START_ON) {
            throw new \LogicException("Timer not initialized !!!!");
        }

        if ($this->getStop() == self::START_ON) {
            throw new \LogicException("Timer not finished !!!!");
        }
        return ($this->getStop() - $this->getStart());
    }

    /**
     * Convert this object to String
     * @return string
     */
    function __toString()
    {
        return "Executed:\t\t" . number_format($this->diffBetweenPoints(), 20) . "\n";
    }
}
