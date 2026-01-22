<?php
namespace Magediary\DeliveryNote\Block\Order;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;

/**
 * Block class for displaying the delivery note on the order view page.
 */
class DeliveryNote extends Template
{
    /**
     * Core registry instance.
     *
     * @var Registry
     */
    protected Registry $registry;

    /**
     * DeliveryNote constructor.
     *
     * @param Template\Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve the current order from registry.
     *
     * @return \Magento\Sales\Api\Data\OrderInterface|null
     */
    public function getOrder()
    {
        return $this->registry->registry('current_order');
    }
}
