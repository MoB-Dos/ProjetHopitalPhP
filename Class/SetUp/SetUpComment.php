<?php

class SetUpComment
{
  private $_film,$_message,$_Note;


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

 

  public function setFilm($film) {
      if (is_string($film) && strlen($film) <= 100) {
          $this->_film = $film;
      } else {trigger_error('erreur login',E_USER_WARNING);
        return; }
  }


    public function setMessage($message) {

        if (strlen($message) > 1 && strlen($message) <= 200) {
            $this->_message = $message;
        } else { trigger_error('erreur message',E_USER_WARNING);
          return; }
      }

      public function setNote($note) {

        if (strlen($note) >= 1 && strlen($note) <= 5) {
            $this->_note = $note;
        } else { trigger_error('erreur message',E_USER_WARNING);
          return; }
      }


public function getMessage() { return $this->_message; }
public function getNote() { return $this->_note; }
public function getFilm() { return $this->_film; }


}


 ?>
