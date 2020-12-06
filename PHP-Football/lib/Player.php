<?php
class Player{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    //Get all players
    public function getAllPlayers(){
        $this->db->query("SELECT players.* , teams.name AS tname FROM players INNER JOIN teams ON players.team_id = teams.id ORDER BY created_at DESC");
        $results = $this->db->resultSet();
        return $results;
    }
    //Get Team
    public function getTeams() {
        $this->db->query("SELECT *  FROM teams");
        $results = $this->db->resultSet();
        return $results;
    }

    //Get By team
    public function getByTeam($team){
        $this->db->query("SELECT players.* , teams.name AS tname FROM players INNER JOIN teams ON players.team_id = teams.id WHERE players.team_id = $team ORDER BY created_at DESC");
        $results = $this->db->resultSet();
        return $results;

    }

    public function getTeam($team_id){
        $this->db->query("SELECT * FROM teams WHERE id = :team_id");
        $this->db->bind(':team_id', $team_id);
        //
        $row =$this->db->single();
        //$results = $this->db->resultSet();
        return $row;

    }

    public function getPlayer($player_id){
        $this->db->query("SELECT players.* , teams.name AS tname, stat.speed FROM players INNER JOIN teams ON players.team_id = teams.id RIGHT JOIN stat ON players.stat_id = stat.id WHERE players.id= :player_id");
        $this->db->bind(':player_id', $player_id);
        //
        $row =$this->db->single();
        //$results = $this->db->resultSet();
        return $row;

    }
    public function findPlayer($searchq){
        $searchq = preg_replace("#[^0-9a-z]#","",$searchq);
        $this->db->query("SELECT players.* , teams.name AS tname FROM players 
        INNER JOIN teams ON players.team_id = teams.id
        WHERE firstname LIKE :searchq
        OR lastname LIKE :searchq
        ORDER BY created_at DESC");
        $this->db->bind(':searchq', '%'.$searchq.'%');
        $results = $this->db->resultSet();
        return $results;

    }



}