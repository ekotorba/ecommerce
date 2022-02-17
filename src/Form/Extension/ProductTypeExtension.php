<?php

namespace App\Form\Extension;
/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

use App\Entity\Supplier;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension
{
 public function buildForm(FormBuilderInterface $builder, array $options)
 {
    $builder
        ->add('supplier', EntityType::class, [
            'class' => Supplier::class,
            'choice_label' => 'name',
            'label' => 'app.ui.supplier',
    ]);
 }

 public static function getExtendedTypes(): iterable
 {
     return [ProductType::class];
 }
}
