<?php

namespace Rkeller\ProductSeller\Model;

use Magento\Framework\Model\AbstractModel;
use Rkeller\ProductSeller\Model\ResourceModel\ProductSeller as ProductSellerResource;

class ProductSeller extends AbstractModel
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ProductSellerResource::class);
    }
}
