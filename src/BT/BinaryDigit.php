<?php namespace BT;

class BinaryDigit
{
    const PREFIX_IEC = 2;
    
    const PREFIX_SI  = 10;
    
    const PRECISION  = 2;
        
    protected $binaryTerm = array(
      
        self::PREFIX_IEC => array(
            "byte"     => array("B",0),
            "kibibyte" => array("KiB",10),
            "mebibyte" => array("MiB",20),
            "gibibyte" => array("GiB",30),
            "tebibyte" => array("TiB",40),
            "pebibyte" => array("PiB",50),
            "exbibyte" => array("EiB",60),
            "zebibyte" => array("ZiB",70),
            "yobibyte" => array("YiB",80)
        ),
        self::PREFIX_SI => array(
            "byte"      => array("B",0),
            "kilobyte"  => array("kB",3),
            "megabyte"  => array("MB",6),
            "gigabyte"  => array("GB",9),
            "terabyte"  => array("TB",12),
            "petabyte"  => array("PB",15),
            "exabyte"   => array("EB",18),
            "zetabyte"  => array("ZB",21),
            "yottabyte" => array("YB",24)
        )
    );
    
    protected $symbol;
    protected $precision;

    public function __construct($bytes,$pattern = self::PREFIX_SI,$precision = self::PRECISION)
    {
        $this->measurement($bytes,$pattern,$precision);
    }
    
    private function measurement($bytes,$pattern,$precision)
    {
        $measures = $this->binaryTerm[$pattern];
        $headers = array_keys($measures);
        $base = $pattern;
        
        foreach ($headers as $head)
        {
            $exp = $measures[$head][1];
            $size = pow($base, $exp);
            
            if(($bytes >= $size)){
                $this->symbol = $measures[$head][0];
                $this->size = (float) round(($bytes / $size), $precision);
            }else{
                continue;
            }
            
        }
    }

    public function __toString()
    {
        return "{$this->size}{$this->symbol}";
    }
    
    public function getSize()
    {
        return (float) $this->size;
    }

    public function setSize($bytes,$pattern = self::PREFIX_SI,$precision = self::PRECISION)
    {
        $this->measurement($bytes, $pattern, $precision);
        return $this;
    }
    
    public function getSymbol()
    {
        return $this->symbol;
    }
        
    /**
     * Compara se este objeto é iqual a outro
     * @param \BT\BinaryDigit $object
     * @return boolean
     */
    public function equals(BinaryDigit $object)
    {
        return ($this->getSize()==$object->getSize()) ? true : false ;
    }
}

