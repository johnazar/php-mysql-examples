<?php
class Job{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    //Get all jobs
    public function getAllJobs(){
        $this->db->query("SELECT jobs.* , categories.name AS cname FROM jobs INNER JOIN categories ON jobs.category_id = categories.id ORDER BY post_date DESC");
        $results = $this->db->resultSet();
        return $results;
    }
    //Get Categories
    public function getCategories() {
        $this->db->query("SELECT *  FROM categories");
        $results = $this->db->resultSet();
        return $results;
    }

    //Get By category
    public function getByCategory($catrgory){
        $this->db->query("SELECT jobs.* , categories.name AS cname FROM jobs INNER JOIN categories ON jobs.category_id = categories.id WHERE jobs.category_id = $catrgory ORDER BY post_date DESC");
        $results = $this->db->resultSet();
        return $results;

    }

    public function getCategory($catrgory_id){
        $this->db->query("SELECT * FROM categories WHERE id = :catrgory_id");
        $this->db->bind(':catrgory_id', $catrgory_id);
        //
        $row =$this->db->single();
        //$results = $this->db->resultSet();
        return $row;

    }

    public function getJob($job_id){
        $this->db->query("SELECT * FROM jobs WHERE id = :job_id");
        $this->db->bind(':job_id', $job_id);
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