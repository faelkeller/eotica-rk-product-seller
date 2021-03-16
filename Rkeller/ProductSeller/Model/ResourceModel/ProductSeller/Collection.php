<?php

namespace Rkeller\ProductSeller\Model\ResourceModel\ProductSeller;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Product seller collection
 *
 * @author Rafael Keller <faelkeler@gmail.com>
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'seller_id';

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Rkeller\ProductSeller\Model\ProductSeller::class, \Rkeller\ProductSeller\Model\ResourceModel\ProductSeller::class);
    }
}
