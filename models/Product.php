<?php

include './traits/Review.php';

class ShopProduct implements JsonSerializable

{
    use ReviewTrait;
    private $productIcon;


    public function __construct(
        private string $productName,
        private string $productBrand,
        private string $productType,
        private string $productCategory,
        public float $productPrice,
        private string $productImage,
        private int $productVote,
        private int $productReviewsCount
    ) {
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
