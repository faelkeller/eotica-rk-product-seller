<?php

namespace Rkeller\ProductSeller\Api\Data;

use Rkeller\ProductSeller\Model\ProductSeller;

interface ProductSellerInterface
{
    const ID = "seller_id";
    const NAME = "name";
    const TELEPHONE = "telephone";
    const PRODUCT_ID = "product_id";

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     *
     * @return ProductSeller
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param $name
     *
     * @return ProductSeller
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getTelephone();

    /**
     * @param $telephone
     *
     * @return ProductSeller
     */
    public function setTelephone($telephone);

    /**
     * @return int
     */
    public function getProductId();

    /**
     * @param $productId
     *
     * @return ProductSeller
     */
    public function setProductId($productId);

}
