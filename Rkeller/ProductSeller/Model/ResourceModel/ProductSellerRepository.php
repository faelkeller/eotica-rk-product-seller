<?php

namespace Rkeller\ProductSeller\Model\ResourceModel;

use Rkeller\ProductSeller\Api\ProductSellerRepositoryInterface;
use Rkeller\ProductSeller\Api\Data\ProductSellerInterface;
use Rkeller\ProductSeller\Model\ProductSellerFactory;
use Magento\Framework\Exception\LocalizedException;
use Rkeller\ProductSeller\Api\Data\ProductSellerInterfaceFactory;


/**
 * Product Seller CRUD class
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ProductSellerRepository implements ProductSellerRepositoryInterface
{
    /**
     * @var ProductSeller
     */
    protected $productSellerResourceModel;

    /**
     * @var ProductSellerFactory
     */
    protected $productSellerFactory;

    /**
     * @var ProductSellerInterfaceFactory
     */
    protected $productSellerDataFactory;

    /**
     * @param ProductSeller $productSellerResourceModel
     * @param ProductSellerFactory $productSellerFactory
     */
    public function __construct(
        ProductSeller $productSellerResourceModel,
        ProductSellerFactory $productSellerFactory,
        ProductSellerInterfaceFactory $productSellerDataFactory
    ) {
        $this->productSellerResourceModel = $productSellerResourceModel;
        $this->productSellerFactory = $productSellerFactory;
        $this->productSellerDataFactory = $productSellerDataFactory;
    }

    /**
     * @inheritdoc
     */
    public function save(ProductSellerInterface $productSeller): ProductSellerInterface
    {
        $productSellerModel = $this->productSellerFactory->create();

        $productSellerModel->setData($productSeller->__toArray());
        try {
            $this->productSellerResourceModel->save($productSellerModel);
        } catch (LocalizedException $e) {
            throw $e;
        }

        return $this->productSellerDataFactory->create()
        ->setId($productSellerModel->getId())
        ->setName($productSellerModel->getName())
        ->setTelephone($productSellerModel->getTelephone())
        ->setProductId($productSellerModel->getProductId());
    }
}
