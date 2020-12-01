<?php
class PublicApi{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    //Get all players
    public function getAllPlayers(){
        $this->db->query("SELECT players.* , teams.name AS tname FROM players INNER JOIN teams ON players.team_id = teams.id ORDER BY created_at DESC");
        $results = $this->db->resultSet();
        //$results = $this->db->rowCount();
        return $results;
    }
    //Get Teams
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
    public function create($data){
        //insert query Stat
        $this->db->query("INSERT INTO stat (speed) VALUE (:speed)");
        $this->db->bind(':speed', $data['speed']);

        try {
            //$this->db->beginTransaction();
            $this->db->execute();
            //$this->db->commit();
            $stat_id = $this->db->lastInsertId();
        } catch(PDOExecption $e) {
            $this->db->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
        }
            //insert query Player
            $this->db->query("INSERT INTO players (team_id,stat_id,firstname,lastname,img,pos,num) 
            VALUE (:team_id,:stat_id,:firstname,:lastname,:img,:pos,:num)");
            //Bind
            $this->db->bind(':stat_id', $stat_id);
            $this->db->bind(':team_id', $data['team_id']);
            $this->db->bind(':firstname', $data['first_name']);
            $this->db->bind(':lastname', $data['last_name']);
            $this->db->bind(':img', $data['img']);
            $this->db->bind(':pos', $data['position']);
            $this->db->bind(':num', $data['number']);
            //Execute Player
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
         
        
        
    }


}