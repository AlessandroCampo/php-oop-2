
<?php
include 'models/Product.php';
include 'models/Kibble.php';





$naturalKibbleCat = new Kibble('Natural Trainer Sterilised Salmone Gatto', 'Natural Trainer', 'Cibo', 'gatto', 28.99, 'naturalKibbleCat.png', 5, 54, 300, 3);
$mongeKibbleCat = new Kibble('Monge Sterilised Trota per Gatto', 'Monge', 'Cibo', 'gatto', 14.99, 'mongeKibbleCat.png', 5, 27, 300, 3);
$royalKibbleCat = new Kibble('Royal Canin Cat Sterilised Alimento completo per gatti sterilizzati', 'Royal Canin', 'Cibo', 'gatto', 6.99, 'royalKibbleCat.png', 5, 21, 300, 3);
$mongeKibbleDog = new Kibble('Monge All Breeds Adult Salmone e Riso', 'Monge', 'Cibo', 'cane', 49.99, 'mongeKibbleDog.png', 5, 914, 300, 3);
$virtusKibbleDog = new Kibble('Virtus Dog Adult Rustic', 'Virtus', 'Cibo', 'cane', 45.90, 'virtusKibbleDog.png', 5, 263, 300, 3);
$acanaKibbleDog = new ShopProduct('Acana Classic Red', 'Acana', 'Cibo', 'dog', 68.90, 'acanaKibbleDog.png', 5, 263);
$pelucheDog = new ShopProduct('Gioco per Cane in Stoffa Peluche con Squittio', 'Trixie', 'Gioco', 'cane', 5.90, 'pelucheDog.png', 4, 12);
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
    if ($product instanceof Kibble) {
        $product->getPricePerKg();
    }
};

header('Content-Type: application/json');
echo json_encode($shopProducts);
