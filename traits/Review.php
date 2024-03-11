<?php


trait ReviewTrait
{
    private $reviews = [];
    public function addReview(string $review)
    {
        if (!is_string($review)) {
            throw new UnexpectedValueException('La recensione deve essere in formato testuale');
        } else if (strlen($review) < 20) {
            throw new LengthException('La recensione deve contenere almeno 20 caratteri');
        } else if (strlen($review) > 200) {
            throw new LengthException('La recensione può contenere un massimo di 200 caratteri');
        } else {
            $this->productReviewsCount++;
            $this->reviews[] = $review;
        }
    }

    public function getReviews()
    {
        return $this->reviews;
    }

    public function clearReviews()
    {
        $this->reviews = [];
    }

    public function getReviewsCount()
    {
        return count($this->reviews);
    }
}
