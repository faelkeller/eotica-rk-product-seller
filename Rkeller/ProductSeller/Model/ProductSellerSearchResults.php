<?php

declare(strict_types=1);

namespace Rkeller\ProductSeller\Model;

use Rkeller\ProductSeller\Api\Data\ProductSellerSearchResultsInterface;
use Magento\Framework\Api\SearchResults;

/**
 * Service Data Object with Product Seller search results.
 */
class ProductSellerSearchResults extends SearchResults implements ProductSellerSearchResultsInterface
{
}
