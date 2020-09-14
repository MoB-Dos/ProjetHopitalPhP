<?php


class SetUpReservationPlace
{
  private $_login,$_date,$_place,$_film,$_heure,$_prix;



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


  public function setLogin($login) {
      if (is_string($login) && strlen($login) <= 100) {
          $this->_login = $login;
      } else {trigger_error('erreur login',E_USER_WARNING);
        return; }
  }

public function setPlace($place) {

  if ($place >= 1 && $place <= 20) {
      $this->_place = $place;
  } else { trigger_error('erreur place',E_USER_WARNING);
    return; }
}


public function setPrix($prix) {

  if (isset($prix)) {
    $this->_prix = $prix;
} else { trigger_error('erreur prix',E_USER_WARNING);
  return; }

}


public function setFilm($film) {

  if (isset($film)) {
      $this->_film = $film;
  } else { trigger_error('erreur film',E_USER_WARNING);
    return; }
}


public function setDate($date) {

  if (isset($date)) {
      $this->_date= $date;
  } else { trigger_error('erreur date',E_USER_WARNING);
    return; }
}



public function setHeure($heure) {

  if (isset($heure)) {
      $this->_heure= $heure;
  } else { trigger_error('erreur heure',E_USER_WARNING);
    return; }
}



public function getFilm() { return $this->_film; }
public function getHeure() { return $this->_heure; }
public function getDate() { return $this->_date; }
public function getPlace() { return $this->_place; }
public function getLogin() { return $this->_login; }
public function getPrix() { return $this->_prix; }


}



 ?>
