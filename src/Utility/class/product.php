<?php
namespace App;
session_start();
/**
 * Product class
 */
class Product
{
    public int $id;
    private string $name;
    private float $price;
    private string $image;

    /**
     * Product class constructor
     *
     * @param integer $id
     * @param string $name
     * @param float $price
     * @param string $image
     */
    public function __construct(int $id, string $name, float $price, string $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }

    /**
     * getter(productId)
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * getter(productName)
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * getter(productPrice)
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * getter(productImage)
     *
     * @return void
     */
    public function getImage()
    {
        return $this->image;
    }
}
