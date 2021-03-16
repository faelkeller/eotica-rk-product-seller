<?php

namespace Rkeller\ProductSeller\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\VersionControl\AbstractDb;

/**
 * Product seller resource model
 *
 * @author  Rafael Keller <faelkeller@gmail.com>
 */
class ProductSeller extends AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('rk_product_seller', 'seller_id');
    }
}
