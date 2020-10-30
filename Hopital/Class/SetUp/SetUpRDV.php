<?php

class SetUpRDV
{
  private $heure,$date,$motif;

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

  public function setNom($heure) {
      if (isset($heure)) {
          $this->_heure = $heure;
      } else { trigger_error('erreur nom',E_USER_WARNING);
        return; }
  }

  public function setPrenom($date) {
      if (isset($date)) {
          $this->_date = $date;
      } else { trigger_error('erreur prenom',E_USER_WARNING);
        return; }
  }


public function setmotif($motif) {

  if (strlen($motif) <= 200) {
      $this->_sujet = $motif;
  } else { trigger_error('erreur sujet',E_USER_WARNING);
    return; }
}

public function getDate() { return $this->_date; }
public function getHeure() { return $this->_heure; }
public function getMotif() { return $this->_motif; }


}


 ?>
