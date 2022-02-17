<?php

namespace App\Listener;

use App\Checker\TrustedCustomerCheckerInterface;
use SM\Factory\FactoryInterface;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\ProductReviewTransitions;
use Sylius\Component\Review\Model\ReviewInterface;
use Symfony\Component\EventDispatcher\GenericEvent;


class ReviewCreationListener
{
    /** @var FactoryInterface */
private $stateMachineFactory;

/** @var TrustedCustomerCheckerInterface */
private $trustedCustomerChecker;


 public function __construct(
     FactoryInterface $stateMachineFactory,
     TrustedCustomerCheckerInterface $trustedCustomerChecker)
{
    $this->stateMachineFactory = $stateMachineFactory;
    $this->trustedCustomerChecker = $trustedCustomerChecker;
}

public function acceptForTrustedAuthor(GenericEvent $event): void
{
    /** @var ReviewInterface $review */
   $review = $event->getSubject();
   /** @var CustomerInterface $author */
   $author = $review->getAuthor();

   if(!$this->trustedCustomerChecker->check($author)){
       return ;
   }
   $stateMachine = $this->stateMachineFactory->get($review, ProductReviewTransitions::GRAPH);
   $stateMachine->apply(ProductReviewTransitions::TRANSITION_ACCEPT);
}
}
