<?php
class Player{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    //Get all jobs
    public function getAllPlayers(){
        $this->db->query("SELECT players.* , teams.name AS tname FROM players INNER JOIN teams ON players.team_id = teams.id ORDER BY created_at DESC");
        $results = $this->db->resultSet();
        return $results;
    }
    //Get Categories
    public function getTeams() {
        $this->db->query("SELECT *  FROM teams");
        $results = $this->db->resultSet();
        return $results;
    }

    //Get By category
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
        $this->db->query("SELECT players.* , teams.name AS tname FROM players INNER JOIN teams ON players.team_id = teams.id WHERE players.id = :player_id");
        $this->db->bind(':player_id', $player_id);
        //
        $row =$this->db->single();
        //$results = $this->db->resultSet();
        return $row;

    }

    public function create($data){
        //insert query
        $this->db->query("INSERT INTO jobs (category_id,job_title,company,description,location,salary,contact_user,contact_email) 
        VALUE (:category_id,:job_title,:company,:description,:location,:salary,:contact_user,:contact_email)");
        //Bind
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Update job
    public function update($id, $data){
        //insert query
        $this->db->query("UPDATE jobs SET category_id=:category_id, job_title=:job_title, company=:company, 
        description=:description, location=:location, salary=:salary, contact_user=:contact_user, contact_email=:contact_email WHERE id=:id");
        //Bind
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);
        $this->db->bind(':id', $id);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Delete Job
    public function delete($id){
        //insert query
        $this->db->query("DELETE FROM jobs WHERE id= :id");
        //Bind
        $this->db->bind(':id', $id);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
}