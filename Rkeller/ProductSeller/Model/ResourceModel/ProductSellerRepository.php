<?php

namespace Rkeller\ProductSeller\Model\ResourceModel;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Rkeller\ProductSeller\Api\Data\ProductSellerInterface;
use Rkeller\ProductSeller\Api\Data\ProductSellerInterfaceFactory;
use Rkeller\ProductSeller\Api\ProductSellerRepositoryInterface;
use Rkeller\ProductSeller\Model\ProductSellerFactory;
use Rkeller\ProductSeller\Api\Data\ProductSellerSearchResultsInterfaceFactory;

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
     * @var ProductSellerSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param ProductSeller $productSellerResourceModel
     * @param ProductSellerFactory $productSellerFactory
     * @param ProductSellerInterfaceFactory $productSellerDataFactory
     * @param ProductSellerSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ProductSeller $productSellerResourceModel,
        ProductSellerFactory $productSellerFactory,
        ProductSellerInterfaceFactory $productSellerDataFactory,
        ProductSellerSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor = null
    ) {
        $this->productSellerResourceModel = $productSellerResourceModel;
        $this->productSellerFactory = $productSellerFactory;
        $this->productSellerDataFactory = $productSellerDataFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
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

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $collection = $this->productSellerFactory->create()->getCollection();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $sellers = [];

        foreach ($collection as $seller) {
            $sellerDataObject = $this->productSellerDataFactory->create()
                ->setId($seller->getId())
                ->setName($seller->getName())
                ->setTelephone($seller->getTelephone())
                ->setProductId($seller->getProductId());

            $sellers[] = $sellerDataObject;
        }
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($sellers);
        return $searchResults;
    }

    /**
     * Retrieve collection processor
     *
     * @deprecated 101.0.0
     * @return CollectionProcessorInterface
     */
    private function getCollectionProcessor()
    {
        if (!$this->collectionProcessor) {
            $this->collectionProcessor = \Magento\Framework\App\ObjectManager::getInstance()->get(
                \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface::class
            );
        }
        return $this->collectionProcessor;
    }
}
