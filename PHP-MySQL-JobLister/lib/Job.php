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
}