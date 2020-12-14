<?php
//to do
namespace app\controllers;
use app\models\Player;
use app\Router;

class PlayerController{
    public function index(Router $router){
        $keyword = $_GET['search'] ?? '';
        $players = $router->database->getPlayers($keyword);
        echo $router->renderView('players/index',[
            'players'=>$players,
            'keyword'=>$keyword
        ]);
    }

    public function create(Router $router)
    {
        $playerData = [
            'img' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $playerData['firstname'] = $_POST['firstname'];
            $playerData['lastname'] = $_POST['lastname'];
            $playerData['pos'] = $_POST['pos'];
            $playerData['num'] = $_POST['num'];
            $playerData['img'] = $_FILES['img'] ?? null;

            $player = new Player();
            $player->load($playerData);
            $player->save();
            header('Location: /players');
            exit;
        }
        $router->renderView('player/create', [
            'player' => $playerData
        ]);
    }

    public function update(Router $router)
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /players');
            exit;
        }
        $playerData = $router->database->getPlayerById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $playerData['firstname'] = $_POST['firstname'];
            $playerData['lastname'] = $_POST['lastname'];
            $playerData['pos'] = $_POST['pos'];
            $playerData['num'] = $_POST['num'];
            $playerData['img'] = $_FILES['img'] ?? null;

            $player = new Player();
            $player->load($playerData);
            $player->save();
            header('Location: /players');
            exit;
        }

        $router->renderView('player/update', [
            'player' => $playerData
        ]);
    }

    public function delete(Router $router)
    {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            header('Location: /players');
            exit;
        }

        if ($router->database->deletePlayer($id)) {
            header('Location: /players');
            exit;
        }
    }
}