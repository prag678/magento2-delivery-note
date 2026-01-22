<?php
namespace Magediary\DeliveryNote\Block\Adminhtml\Order\View\Info;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Sales\Api\Data\OrderInterface;

class DeliveryNote extends \Magento\Backend\Block\Template
{
    /**
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * DeliveryNote constructor.
     *
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Get current order
     *
     * @return OrderInterface|null
     */
    public function getOrder()
    {
        return $this->coreRegistry->registry('current_order');
    }

    /**
     * Get Delivery Note
     *
     * @return string|null
     */
    public function getDeliveryNote()
    {
        $order = $this->getOrder();
        if ($order) {
            return $order->getData('delivery_note');
        }
        return null;
    }
}
