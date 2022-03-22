<?php

trait Sayap{
    protected $panjangSayap;

    function kepakkan(){
        echo "terbang!\n";
    }
}

trait SayapPenguin{
    function kepakkan(){
        echo "menari!\n";
    }
}

class Merpati{
    use Sayap;
    function __construct($panjangSayap)
    {
        $this->panjangSayap = $panjangSayap;
    }
}

class Penguin{
    use Sayap, SayapPenguin {
        SayapPenguin::kepakkan insteadof Sayap;
    }
    
    function __construct($panjangSayap)
    {
        $this->panjangSayap = $panjangSayap;
    }
}
$merpati = new Merpati(4.2);
$penguin = new Penguin(5.4);

$merpati->kepakkan();
$penguin->kepakkan();




//skenario
//cerita / diagram
