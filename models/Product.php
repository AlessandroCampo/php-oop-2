<?php

include './traits/Review.php';

class ShopProduct implements JsonSerializable
{
    private $productName;
    private $productType;
    private $productBrand;
    private $productCategory;
    public  $productPrice;
    private $productImage;
    private $productVote;
    private $productReviewsCount;
    private $productIcon;
    use ReviewTrait;

    public function __construct(string $productName, string $productBrand, string $productType, string $productCategory, float $productPrice, string $productImage, int $productVote, int $productReviewsCount)
    {
        $this->productName = $productName;
        $this->productBrand = $productBrand;
        $this->productType = $productType;
        $this->productCategory = $productCategory;
        $this->productPrice = $productPrice;
        $this->productImage = $productImage;
        $this->productVote = $productVote;
        $this->productReviewsCount = $productReviewsCount;
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
            'productReviewsCount' => $this->productReviewsCount,
            'productIcon' => $this->productIcon,
            'productReviews' => $this->reviews,
        ];
    }
}
