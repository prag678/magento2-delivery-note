<?php
namespace Magediary\DeliveryNote\Controller\Cart;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Framework\Controller\Result\JsonFactory;

/**
 * Class Save
 *
 * Handles saving of delivery notes to the quote.
 */
class Save extends Action
{
    /**
     * @var CheckoutSession
     */
    protected $checkoutSession;

    /**
     * @var CartRepositoryInterface
     */
    protected $quoteRepository;

    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * Save constructor.
     *
     * @param Context $context
     * @param CheckoutSession $checkoutSession
     * @param CartRepositoryInterface $quoteRepository
     * @param JsonFactory $resultJsonFactory
     */
    public function __construct(
        Context $context,
        CheckoutSession $checkoutSession,
        CartRepositoryInterface $quoteRepository,
        JsonFactory $resultJsonFactory
    ) {
        parent::__construct($context);
        $this->checkoutSession = $checkoutSession;
        $this->quoteRepository = $quoteRepository;
        $this->resultJsonFactory = $resultJsonFactory;
    }

    /**
     * Save delivery note to quote.
     *
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        try {
            $deliveryNote = $this->getRequest()->getParam('delivery_note');
            $quote = $this->checkoutSession->getQuote();
            $quote->setData('delivery_note', $deliveryNote);
            $this->quoteRepository->save($quote);

            return $result->setData([
                'success' => true,
                'message' => __('Delivery note saved.')
            ]);
        } catch (\Exception $e) {
            return $result->setData([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
