<?php

class GuestBook extends Controller
{
    private $file;

    public function __construct()
    {
        parent::__construct();
        $this->className = strtolower(__CLASS__) . '/';
    }

    public function index()
    {
        if (!empty($_POST)) {
            $this->file = fopen(APP_PATH . "public/files/message.inc", "a");
            $string = "\n" . date("d.m.y") . ";" .
                $_POST["name"] . ";" .
                $_POST["email"] . ";" .
                $_POST["review"];
            fwrite($this->file, $string);
            fclose($this->file);
        }
        $reviews = [];
        $this->file = fopen(APP_PATH . "public/files/message.inc", "r");
        while (!feof($this->file)) {
            $row = fgets($this->file);
            $message = explode(";", $row);
            $review = new ReviewModel($message[0], $message[1], $message[2], $message[3]);
            array_push($reviews, $review);
        }
        fclose($this->file);
        usort($reviews, function ($a, $b) {
            if ($a->Date == $b->Date) {
                return 0;
            }
            return ($a->Date < $b->Date) ? 1 : -1;
        });
        $this->view->generate($this->className . 'guest_book', compact("reviews"));
    }

    public function loadRecordsFromFile()
    {
        if (!empty($_FILES)) {
            $uploadDir = APP_PATH . "public/files/tmp/";
            $uploadFile = $uploadDir . basename($_FILES['records']['name']);
            if (move_uploaded_file($_FILES['records']['tmp_name'], $uploadFile)) {
                $file = fopen($uploadFile, "r");
                print_r($file);
                $this->file = fopen(APP_PATH . "public/files/message.inc", "a");
                fwrite($this->file, "\n");
                while (!feof($file)) {
                    $message = fgets($file);
                    print_r($message);
                    fwrite($this->file, $message);
                }
                fclose($file);
                fclose($this->file);
                unlink($uploadFile);
            } else {
                echo "Не удалось загрузить файл";
            }
            header("Location: " . "/guestBook");
        }
        $this->view->generate($this->className . 'loadRecordsFromFile');
    }
}