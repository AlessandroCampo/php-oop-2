<?php

class ShopProduct implements JsonSerializable
{
    private $productName;
    private $productType;
    private $productBrand;
    private $productCategory;
    public  $productPrice;
    private $productImage;
    private $productVote;
    private $productReviews;
    private $productIcon;

    public function __construct(string $productName, string $productBrand, string $productType, string $productCategory, float $productPrice, string $productImage, int $productVote, int $productReviews)
    {
        $this->productName = $productName;
        $this->productBrand = $productBrand;
        $this->productType = $productType;
        $this->productCategory = $productCategory;
        $this->productPrice = $productPrice;
        $this->productImage = $productImage;
        $this->productVote = $productVote;
        $this->productReviews = $productReviews;
    }

    public function setDiscount()
    {
        if ($this->productCategory == 'gatto') {
            $this->productPrice *= 0.8;
        }
    }

    public function setIcon()
    {
        if ($this->productCategory == 'gatto') {
            $this->productIcon = 'catIcon.png';
        } else {
            $this->productIcon = 'dogIcon.png';
        }
    }



    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'productName' => $this->productName,
            'productBrand' => $this->productBrand,
            'productType' => $this->productType,
            'productCategory' => $this->productCategory,
            'productPrice' => $this->productPrice,
            'productImage' => $this->productImage,
            'productVote' => $this->productVote,
            'productReviews' => $this->productReviews,
            'productIcon' => $this->productIcon,
        ];
    }
}
