<?php

class ReviewModel
{
    public $Date;
    public $Fio;
    public $Email;
    public $Review;

    public function __construct($date, $fio, $email, $review)
    {
        $this->Date = $date;
        $this->Fio = $fio;
        $this->Email = $email;
        $this->Review = $review;
    }

}