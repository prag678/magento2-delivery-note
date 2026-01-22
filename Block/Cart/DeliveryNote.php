<?php
namespace Magediary\DeliveryNote\Block\Cart;

use Magento\Checkout\Model\Session;
use Magento\Framework\View\Element\Template;

/**
 * Block for displaying and retrieving the delivery note on the cart page.
 */
class DeliveryNote extends Template
{
    /**
     * Checkout session instance.
     *
     * @var Session
     */
    protected Session $checkoutSession;

    /**
     * DeliveryNote constructor.
     *
     * @param Template\Context $context
     * @param Session $checkoutSession
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Session $checkoutSession,
        array $data = []
    ) {
        $this->checkoutSession = $checkoutSession;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve delivery note from the current quote.
     *
     * @return string|null
     */
    public function getDeliveryNote(): ?string
    {
        return $this->checkoutSession->getQuote()->getDeliveryNote();
    }
}
