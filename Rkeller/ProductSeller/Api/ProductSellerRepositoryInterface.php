<?php
namespace Rkeller\ProductSeller\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Rkeller\ProductSeller\Api\Data\ProductSellerInterface;

interface ProductSellerRepositoryInterface
{

    /**
     * POST for ProductSeller api
     * @param ProductSellerInterface $productSeller
     * @return ProductSellerInterface
     */
    public function save(ProductSellerInterface $productSeller): ProductSellerInterface;

    /**
     * Retrieve product sellers which match a specified criteria.
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Rkeller\ProductSeller\Api\Data\ProductSellerSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
