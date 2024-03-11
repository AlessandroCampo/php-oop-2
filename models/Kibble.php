<?php



class Kibble extends ShopProduct
{
    protected $calories;
    protected $kilograms;
    protected $pricePerKg;

    public function __construct(string $productName, string $productBrand, string $productType, string $productCategory, float $productPrice, string $productImage, int $productVote, int $productReviews, int $calories, float $kilograms)
    {
        parent::__construct($productName, $productBrand, $productType, $productCategory, $productPrice, $productImage, $productVote, $productReviews);

        $this->calories = $calories;
        $this->kilograms = $kilograms;
    }

    public function getPricePerKg()
    {
        $this->pricePerKg = $this->productPrice / $this->kilograms;
    }

    public function jsonSerialize()
    {
        $parentSerialized = parent::jsonSerialize();

        return array_merge($parentSerialized, [
            'calories' => $this->calories,
            'kilograms' => $this->kilograms,
            'getPricePerKg' => $this->pricePerKg
        ]);
    }
}
