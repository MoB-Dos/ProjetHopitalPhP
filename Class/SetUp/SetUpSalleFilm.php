<?php

class SetUpSalleFilm
{

  private $_salle,$_film,$_description,$_place;

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

 



public function setPlace($place) {

  if ($place > 1 && $place <= 20) {
      $this->_place = $place;
  } else { trigger_error('erreur place',E_USER_WARNING);
    return; }
}


    public function setSalle($salle) {

    if ($salle >= 1 && $salle <= 20) {
        $this->_salle = $salle;
    } else { trigger_error('erreur salle',E_USER_WARNING);
      return; }
    }

    
    public function setPrix($prix) {

        if ($prix >= 1 ) {
            $this->_prix = $prix;
        } else { trigger_error('erreur prix',E_USER_WARNING);
          return; }
        }
    

    public function setFilm($film) {

        if (strlen($film) > 1 && strlen($film) <= 20) {
            $this->_film = $film;
        } else { trigger_error('erreur film',E_USER_WARNING);
          return; }
      }

      public function setDescription($synopsis) {

        if (strlen($synopsis) > 1 && strlen($synopsis) <= 200) {
            $this->_synopsis = $synopsis;
        } else { trigger_error('erreur description',E_USER_WARNING);
          return; }
      }




public function getFilm() { return $this->_film; }
public function getDescription() { return $this->_synopsis; }
public function getPrix() { return $this->_prix; }
public function getSalle() { return $this->_salle; }
public function getPlace() { return $this->_place; }

    }



 ?>
