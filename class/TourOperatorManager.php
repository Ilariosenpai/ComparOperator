<?php

class TourOperatorManager{


    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $query = $this->db->prepare('SELECT * FROM tour_operators');
        $query->execute();
        $tourOperators = $query->fetchAll(PDO::FETCH_ASSOC);
        return $tourOperators;
    }

    public function find($id)
    {
        $query = $this->db->prepare('SELECT * FROM tour_operators WHERE id = :id');
        $query->execute(['id' => $id]);
        $tourOperator = $query->fetch(PDO::FETCH_ASSOC);
        return $tourOperator;
    }

    public function findByName($name)
    {
        $query = $this->db->prepare('SELECT * FROM tour_operators WHERE name = :name');
        $query->execute(['name' => $name]);
        $tourOperator = $query->fetch(PDO::FETCH_ASSOC);
        return $tourOperator;
    }

    public function findPremium()
    {
        $query = $this->db->prepare('SELECT * FROM tour_operators WHERE is_premium = 1');
        $query->execute();
        $tourOperators = $query->fetchAll(PDO::FETCH_ASSOC);
        return $tourOperators;
    }

    public function findGrade($id)
    {
        $query = $this->db->prepare('SELECT grade_total, grade_count FROM tour_operators WHERE id = :id');
        $query->execute(['id' => $id]);
        $tourOperator = $query->fetch(PDO::FETCH_ASSOC);
        return $tourOperator;
    }

    public function findBestGrade()
    {
        $query = $this->db->prepare('SELECT * FROM tour_operators WHERE grade_total/grade_count = (SELECT MAX(grade_total/grade_count) FROM tour_operators)');
        $query->execute();
        $tourOperators = $query->fetchAll(PDO::FETCH_ASSOC);
        return $tourOperators;
    }

    public function findBestPremium()
    {
        $query = $this->db->prepare('SELECT * FROM tour_operators WHERE is_premium = 1 AND grade_total/grade_count = (SELECT MAX(grade_total/grade_count) FROM tour_operators WHERE is_premium = 1)');
        $query->execute();
        $tourOperators = $query->fetchAll(PDO::FETCH_ASSOC);
        return $tourOperators;
    }
}

