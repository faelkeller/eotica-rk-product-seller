<?php

namespace Rkeller\ProductSeller\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;


/**
 * Interface for product seller search results.
 */
interface ProductSellerSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get product sellers list.
     *
     * @return Rkeller\ProductSeller\Api\Data\ProductSellerInterface[]
     */
    public function getItems();

    /**
     * Set product sellers list.
     *
     * @api
     * @param Rkeller\ProductSeller\Api\Data\ProductSellerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
