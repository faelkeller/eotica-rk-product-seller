<?php
namespace Rkeller\ProductSeller\Api;

use Rkeller\ProductSeller\Api\Data\ProductSellerInterface;

interface ProductSellerRepositoryInterface
{

    /**
     * POST for ProductSeller api
     * @param ProductSellerInterface $productSeller
     * @return ProductSellerInterface
     */
    public function save(ProductSellerInterface $productSeller): ProductSellerInterface;
}
