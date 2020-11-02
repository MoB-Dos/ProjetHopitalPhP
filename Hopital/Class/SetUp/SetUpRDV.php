<?php

class SetUpRDV
{
  private $date,$motif,$horaire,$docteurName;

  public function __construct(array $donnees)
  {
      $this->hydrate($donnees);
  }

  // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
  public function hydrate(array $donnees)
  {
      foreach ($donnees as $key => $value)
      {
          // On récupère le nom du setter correspondant à l'attribut.
          $method = 'set'.ucfirst($key);

          // Si le setter correspondant existe.
          if (method_exists($this, $method))
          {
              // On appelle le setter.
              $this->$method($value);
          }

      }
  }

  public function setHoraire($horaire) {
      if (isset($horaire)) {
          $this->_horaire = $horaire;
      } else { trigger_error('erreur apresmidi',E_USER_WARNING);
        return; }
  }


  public function setDocteurName($docteurName) {
    if (isset($docteurName)) {
        $this->_docteurName = $docteurName;
    } else { trigger_error('erreur apresmidi',E_USER_WARNING);
      return; }
}


  public function setDate($date) {
      if (isset($date)) {
          $this->_date = $date;
      } else { trigger_error('erreur prenom',E_USER_WARNING);
        return; }
  }


public function setMotif($motif) {

  if (strlen($motif) <= 200) {
      $this->_motif = $motif;
  } else { trigger_error('erreur sujet',E_USER_WARNING);
    return; }
}

public function getDate() { return $this->_date; }
public function getDocteurName() { return $this->_docteurName; }
public function getHoraire() { return $this->_horaire;}
public function getMotif() { return $this->_motif; }


}


 ?>
