<?php

namespace Rkeller\ProductSeller\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use Rkeller\ProductSeller\Api\Data\ProductSellerInterface;

/**
 * Product Seller data model.
 */
class ProductSeller extends AbstractExtensibleObject implements ProductSellerInterface
{
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->_get(self::ID);
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->_get(self::NAME);
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->_get(self::PRODUCT_ID);
    }

    /**
     * @param $productId
     * @return $this
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->_get(self::TELEPHONE);
    }

    /**
     * @param $telephone
     * @return $this
     */
    public function setTelephone($telephone)
    {
        return $this->setData(self::TELEPHONE, $telephone);
    }
}
