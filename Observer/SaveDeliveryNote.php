<?php
namespace Magediary\DeliveryNote\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

/**
 * Class SaveDeliveryNote
 *
 * Observer to copy delivery note from quote to order on order placement.
 */
class SaveDeliveryNote implements ObserverInterface
{
    /**
     * Execute observer
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $quote = $observer->getEvent()->getQuote();
        $order = $observer->getEvent()->getOrder();

        $order->setDeliveryNote($quote->getDeliveryNote());
    }
}
