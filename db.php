
<?php

class ShopProduct implements JsonSerializable
{
    private $productName;
    private $productType;
    private $productBrand;
    private $productCategory;
    private $productPrice;
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
            $this->productPrice *= 0.8; // Shortcut for $this->productPrice = $this->productPrice * 0.8;
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


$naturalKibbleCat = new ShopProduct('Natural Trainer Sterilised Salmone Gatto', 'Natural Trainer', 'Cibo', 'gatto', 28.99, 'naturalKibbleCat.png', 5, 54);
$mongeKibbleCat = new ShopProduct('Monge Sterilised Trota per Gatto', 'Monge', 'Cibo', 'gatto', 14.99, 'mongeKibbleCat.png', 5, 27);
$royalKibbleCat = new ShopProduct('Royal Canin Cat Sterilised Alimento completo per gatti sterilizzati', 'Royal Canin', 'Cibo', 'gatto', 6.99, 'royalKibbleCat.png', 5, 21);
$mongeKibbleDog = new ShopProduct('Monge All Breeds Adult Salmone e Riso', 'Monge', 'Cibo', 'cane', 49.99, 'mongeKibbleDog.png', 5, 914);
$virtusKibbleDog = new ShopProduct('Virtus Dog Adult Rustic', 'Virtus', 'Cibo', 'cane', 45.90, 'virtusKibbleDog.png', 5, 263);
$acanaKibbleDog = new ShopProduct('Acana Classic Red', 'Acana', 'Cibo', 'dog', 68.90, 'acanaKibbleDog.png', 5, 263);
$pelucheDog = new ShopProduct('Gioco per Cane in Stoffa Peluche con Squittio', 'Trixie', 'Gioco', 'cane', 5.90, 'pelucheDog.png', 4, 9);
$ballDog = new ShopProduct('Palla per Cane Snack Labirint Gomma', 'Trixie', 'Gioco', 'cane', 5.90, 'ballDog.png', 4, 9);
$ballCat = new ShopProduct('Yes! Gatto Pallina Peluche Rosa', 'Yes', 'Gioco', 'gatto', 1.28, 'ballCat.png', 4, 13);
$fishCat = new ShopProduct('Gioco Pesce Guizzante per Gatto', 'Trixie', 'Gioco', 'gatto', 9.90, 'fish.jpg', 4, 44);
$bowlCat = new ShopProduct('Ciotola in Ceramica Rialzata Ciclamino', 'Trixie', 'Ciotola', 'gatto', 7.99, 'catBowl.png', 5, 16);
$bowlDog = new ShopProduct('Ciotola Antiscivolo Bridge Blu', 'Lovedì', 'Ciotola', 'cane', 8.99, 'dogBowl.png', 5, 1);
$basketDog = new ShopProduct('Cuccia esterna per Cani Eco Lodge', 'pet around you', 'cuccia', 'cane', 89.99, 'dogBasket.png', 4, 14);
$basketCat = new ShopProduct('Cuccia Igloo Mimì per Gatto', 'trixie', 'cuccia', 'gatto', 39.99, 'catBasket.png', 5, 3);

$shopProducts = [$naturalKibbleCat, $mongeKibbleCat, $royalKibbleCat, $mongeKibbleDog, $virtusKibbleDog, $acanaKibbleDog, $pelucheDog, $ballDog, $ballCat, $fishCat, $bowlCat, $bowlDog, $basketDog, $basketCat];

foreach ($shopProducts as $product) {
    $product->setDiscount();
    $product->setIcon();
};

header('Content-Type: application/json');
echo json_encode($shopProducts);
