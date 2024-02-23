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



    public function getOperatorByDestination($id)
  {

    $q = $this->db->prepare('SELECT * FROM tour_operator WHERE id = ?');
    $q->execute([$id]);
    $operator = $q->fetch(PDO::FETCH_ASSOC);

    return new Touroperator($operator);
  }


  public function getAllOperator()
  {
    $allOperator = [];
    $q = $this->db->prepare('SELECT * FROM tour_operator');
    $q->execute();
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach ($donnees as $donnee) {
      $allOperator[] = new Touroperator($donnee);
    }
    return $allOperator;
  }

  public function operatorExist($operator)
  {
    $CharacterStatement = $this->db->prepare("SELECT COUNT(*) FROM tour_operator WHERE name = ?");
    $CharacterStatement->execute([
      $operator->getName()
    ]);
    $result = empty($CharacterStatement->fetchColumn());
    return (bool) $result;
  }

  public function updateOperatorToPremium(Touroperator $tourOperator)
  {
    $updatePremium = $this->db->prepare('UPDATE tour_operator SET is_premium = :is_premium WHERE id = :id');
    $updatePremium->bindValue(':is_premium', $tourOperator->getIspremium());
    $updatePremium->bindValue(':id', $tourOperator->getId());

    $updatePremium->execute();
  }


  public function getOperatorById($param)
  {

    if (is_int($param)) {
      $CharacterStatement = $this->db->prepare('SELECT * FROM tour_operator WHERE id = :id');
      $CharacterStatement->bindValue(':id', $param, PDO::PARAM_INT);
      $CharacterStatement->execute();
      $operatorArray = $CharacterStatement->fetch(PDO::FETCH_ASSOC);

      return $operatorArray;
    }
  }

  public function createTourOperator(Touroperator $tourOperator)
  {
    $q = $this->db->prepare('INSERT INTO tour_operator (name, link, grade_total, is_premium) VALUES(:name, :link, :grade_total, :is_premium)');
    $q->bindValue(':name', $tourOperator->getName());
    $q->bindValue(':grade_total', $tourOperator->getGradeTotal());
    $q->bindValue(':link', $tourOperator->getLink());
    $q->bindValue(':is_premium', $tourOperator->getIsPremium());
    $q->execute();
  }

  public function updateTO(Touroperator $operator)
  {
    $updateTO = $this->db->prepare('UPDATE tour_operator SET name= :name, grade= :grade_count, link=:link, is_premium = :is_premium,WHERE id=:id');

    $updateTO->bindValue("is_premium", $operator->getIsPremium());
    $updateTO->bindValue("link", $operator->getLink(), PDO::PARAM_STR);
    $updateTO->bindValue("name", $operator->getName(), PDO::PARAM_STR);
    $updateTO->bindValue("id", $operator->getId(), PDO::PARAM_INT);
    $updateTO->execute();
  }
  

  public function deleteTo(Touroperator $operator)
  {

    $deleteTo = $this->db->prepare('DELETE FROM tour_operator WHERE id = :id');
    $deleteTo->bindValue(':id', $operator->getId(), PDO::PARAM_INT);
    $deleteTo->execute();
  }

  public function updateGradeByOperator(Touroperator $tourOperator)
  {
    $updateGrade = $this->db->prepare('UPDATE tour_operator SET grade = :grade WHERE id = :id');
    $updateGrade->bindValue(':grade', $tourOperator->getGradeCount());
    $updateGrade->bindValue(':id', $tourOperator->getId());

    $updateGrade->execute();
  }
}



