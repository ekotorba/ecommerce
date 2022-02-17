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
use Sylius\Component\Resource\Model\ResourceInterface;


/**
 * @ORM\Entity
 * @ORM\Table(name="product_color")
 */
interface ColorInterface extends ResourceInterface
{

    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getProducts(): ?string;
}
