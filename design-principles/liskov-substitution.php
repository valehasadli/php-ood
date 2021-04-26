<?php

class Rectangle
{
    protected int|float $width;
    protected int|float $height;

    /**
     * @param int|float $width
     */
    public function setWidth(int|float $width): void
    {
        $this->width = $width;
    }

    /**
     * @param int|float $height
     */
    public function setHeight(int|float $height): void
    {
        $this->height = $height;
    }

    /**
     * @return float|int
     */
    public function area(): float|int
    {
        return $this->height * $this->width;
    }
}

class Square extends Rectangle
{
    /**
     * @param int|float $side
     */
    public function setSide(int|float $side): void
    {
        $this->width = $side;
        $this->height = $side;
    }
}


//$rectangle = new Rectangle();
//$rectangle->setWidth(12);
//$rectangle->setHeight(2);
//echo 'rectangle area: ' . $rectangle->area();

$square = new Square();
$square->setSide(11);
echo 'square area: ' . $square->area();