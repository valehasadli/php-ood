<?php

/**
 * Interface Shape
 */
interface Shape
{
    /**
     * @return float|int
     */
    public function area(): float|int;
}

/**
 * Class Rectangle
 */
class Rectangle implements Shape
{
    private int|float $width;
    private int|float $height;

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

/**
 * Class Circle
 */
class Circle implements Shape
{
    /**
     * @var int|float
     */
    private int|float $radius;

    /**
     * @param int|float $radius
     */
    public function setRadius(int|float $radius): void
    {
        $this->radius = $radius;
    }

    /**
     * @return float|int
     */
    public function area(): float|int
    {
        return $this->radius * $this->radius * M_PI;
    }
}

/**
 * Class Square
 */
class Square implements Shape
{
    /**
     * @var int|float
     */
    private int|float $side;

    /**
     * @param int|float $side
     */
    public function setSide(int|float $side): void
    {
        $this->side = $side;
    }

    /**
     * @return float|int
     */
    public function area(): float|int
    {
        return $this->side * $this->side;
    }
}

//$rectangle = new Rectangle();
//$rectangle->setHeight(10);
//$rectangle->setWidth(10.5);
//echo 'rectangle area: ' . $rectangle->area();

//$circle = new Circle();
//$circle->setRadius(100);
//echo 'circle area: ' . $circle->area();

//$square = new Square();
//$square->setSide(10);
//echo 'square area: ' . $square->area();
