<?php

declare(strict_types=1);

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */
namespace App\Entity\ProductColor;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_color")
 */

class Color implements ColorInterface
{

    // INT in Database of color
    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // Class name of color

    /**
     * @var string|null
     *
     * @ORM\Column(type="string")
     */
    private $name;

    // Add Colors to product side
    // Set Collection bcs our data are an array
    // One to Many bcs we can set One color for lot of products

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Product\Product", mappedBy="color_id")
     */
    private $products;




    // Getters and setters for products
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    // Getters for products
    public function getProducts(): ?string
    {
        return $this->products;
    }
}
