<?php
class DestinationManager
{

  private $bdd;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function setDb(PDO $db)
  {
    $this->bdd = $db;
  }

  public function getAllDestination()
  {

    $q = $this->bdd->prepare('SELECT * FROM destination');
    $q->execute();
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);

    return $this->hydrate($donnees);
  }

  public function getDestinationByName(string $name)
  {


    $q = $this->bdd->prepare('SELECT * FROM destination WHERE location = ?');
    $q->execute([$name]);
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);

    return $this->hydrate($donnees);
  }

  public function getDestinationByIdTo($id)
  {

    $q = $this->bdd->prepare(
      'SELECT * FROM destination
        WHERE id_tour_operator = ?'
    );
    $q->execute([$id]);
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);

    return $this->hydrate($donnees);
  }

  public function deleteDestination(Destination $destination)
  {

    $deleteTo = $this->bdd->prepare('DELETE FROM destination WHERE id = :id');
    $deleteTo->bindValue(':id', $destination->getId(), PDO::PARAM_INT);
    $deleteTo->execute();
  }


  public function hydrate(array $data)
  {
    $objectArray = [];
    foreach ($data as $destination) {
      $objectArray[] = new Destination($destination);
    }
    return $objectArray;
  }
}
