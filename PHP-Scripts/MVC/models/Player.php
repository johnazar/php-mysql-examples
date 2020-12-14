<?php


namespace app\models;


use app\Database;
use app\helpers\UtilHelper;


class Player
{
    public ?int $id = null;
    public string $firstname;
    public string $lastname;
    public string $pos;
    public string $num;
    public array $imageFile;
    public ?string $imagePath = null;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->pos = $data['pos'];
        $this->num = $data['num'];
        $this->imageFile = $data['imageFile'];
        $this->imagePath = $data['image'] ?? null;
    }

    public function save()
    {
        $errors = [];
        if (!is_dir(__DIR__ . '/../public/images')) {
            mkdir(__DIR__ . '/../public/images');
        }

        if (!$this->firstname) {
            $errors[] = 'Player firstname is required';
        }

        if (!$this->lastname) {
            $errors[] = 'Player lastname is required';
        }
        if (!$this->pos) {
            $errors[] = 'Player position is required';
        }
        if (!$this->num) {
            $errors[] = 'Player number is required';
        }

        if (empty($errors)) {
            var_dump($this->imageFile);
            //die();
            if ($this->imageFile && ($this->imageFile['size']>0)) {
                if ($this->imagePath) {
                    unlink(__DIR__ . '/../public/' . $this->imagePath);
                }
                $this->imagePath = 'images/' . UtilHelper::randomString(8) . '/' . $this->imageFile['name'];
                //$this->imagePath = 'images';
                mkdir(dirname(__DIR__ . '/../public/' . $this->imagePath));
                move_uploaded_file($this->imageFile['tmp_name'], __DIR__ . '/../public/' . $this->imagePath);
            }
            

            $db = Database::$db;
            if ($this->id) {
                $db->updatePlayer($this);
            } else {
                $db->createPlayer($this);
            }

        }
    }
}