<?php namespace BT;

class Memory
{
    /**
     * @var BT\BinaryDigit 
     */
    protected $used;

    /**
     * @var BT\BinaryDigit 
     */
    protected $allocated;

    public function used()
    {
        if(is_null($this->used))
        {
            $this->used = new BinaryDigit(memory_get_usage());
        }
        return $this->used;
    }
    
    public function allocated()
    {
        if(is_null($this->allocated))
        {
            $this->allocated = new BinaryDigit(memory_get_peak_usage());
        }
        return $this->allocated;
    }
    
    public function __toString()
    {
        return "Used: {$this->used()} and Allocated: {$this->allocated()}\n";
    }
}
