<?php

class SetUpUser
{
  private $_nom,$_prenom,$_mail,$_login,$_mdp,$_mdp2,$_objet,$_sujet,$_sujet2,$_message;

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

  public function setNom($nom) {
      if (is_string($nom) && strlen($nom) <= 20) {
          $this->_nom = $nom;
      } else { trigger_error('erreur nom',E_USER_WARNING);
        return; }
  }

  public function setPrenom($prenom) {
      if (is_string($prenom) && strlen($prenom) <= 20) {
          $this->_prenom = $prenom;
      } else { trigger_error('erreur prenom',E_USER_WARNING);
        return; }
  }

  public function setMail($mail){
  $string = $mail;
  if(stristr($string, '@') === FALSE) {
    trigger_error('erreur mail',E_USER_WARNING);
      return;
  }else{
      $this->_mail = $mail;
  }
}

  public function setLogin($login) {
      if (is_string($login) && strlen($login) <= 100) {
          $this->_login = $login;
      } else {trigger_error('erreur login',E_USER_WARNING);
        return; }
  }

  public function setMdp($mdp) {

    if (strlen($mdp) > 5 && strlen($mdp) <= 500) {

        $this->_mdp = $mdp;
    } else { trigger_error('erreur mdp',E_USER_WARNING);
      return; }
}

public function setMdp2($mdp2) {

  if (strlen($mdp2) > 5 && strlen($mdp2) <= 500) {

      $this->_mdp2 = $mdp2;
  } else { trigger_error('erreur mdp',E_USER_WARNING);
    return; }
}


public function setObjet($objet) {

  if (strlen($objet) > 1 && strlen($objet) <= 20) {
      $this->_objet = $objet;
  } else { trigger_error('erreur objet',E_USER_WARNING);
    return; }
}

public function setSujet($sujet) {

  if (strlen($sujet) <= 200) {
      $this->_sujet = $sujet;
  } else { trigger_error('erreur sujet',E_USER_WARNING);
    return; }
}

public function setSujet2($sujet2) {

  if (strlen($sujet2) <= 200) {
      $this->_sujet2 = $sujet2;
  } else { trigger_error('erreur sujet',E_USER_WARNING);
    return; }
}

public function setMessage($message) {

  if (strlen($message) <= 200) {
      $this->_message = $message;
  } else { trigger_error('erreur sujet',E_USER_WARNING);
    return; }
}
public function getObjet() { return $this->_objet; }
public function getSujet() { return $this->_sujet; }
public function getNom() { return $this->_nom; }
public function getPrenom() { return $this->_prenom; }
public function getLogin() { return $this->_login; }
public function getMail() { return $this->_mail; }
public function getMdp() { return $this->_mdp; }
public function getMdp2() { return $this->_mdp2; }
public function getSujet2() { return $this->_sujet2; }
public function getMessage() { return $this->_message; }


}


 ?>
