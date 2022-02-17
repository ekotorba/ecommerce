<?php

declare(strict_types=1);

namespace App\Entity\Product;

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

use App\Entity\ProductColor\ColorInterface;
use App\Entity\SupplierInterface;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product")
 */
class Product extends BaseProduct
{
//Entity of color_id to BitBag Task
    /**
     * @var ColorInterface|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductColor\Color", inversedBy="products")
     * @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     */
    private $color;

    //Geters And Setters of Colors

    public function getColor(): ?ColorInterface
    {
        return $this->color;
    }

    public function setColor(ColorInterface $color): void
    {
        $this->color = $color;
    }

    //End Geters And Setters of color


    /**
     * @var SupplierInterface|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Supplier", inversedBy="products")
     * @ORM\JoinColumn(name="supplier_id", referencedColumnName="id")
     */
    private $supplier;

public function getSupplier(): ?SupplierInterface
{
    return $this->supplier;
}

public function setSupplier(?SupplierInterface $supplier): void
{
    $this->supplier = $supplier;
}

    protected function createTranslation(): ProductTranslationInterface
    {
        return new ProductTranslation();
    }
}
