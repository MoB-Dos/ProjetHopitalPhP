<?php

class SetUpDossier
{
  private $_nom,$_prenom,$_date,$_adresse,$_mutuel,$_sq,$_optionTv,$_optionWifi,$_regime;

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

  public function setDate($date){
    $this->_date = $date;
    return; }

  public function setAdresse($adresse){
      $this->_adresse = $adresse;
      return; }

  public function setMutuel($mutuel){
      $this->_mutuel = $mutuel;
     return; }

   public function setSq($sq){
     $this->_sq = $sq;
    return; }   

    public function setOptionTv($optionTv){
     $this->_optionTv = $optionTv;
    return; }

    public function setOptionWifi($optionWifi){
      $this->_optionWifi = $optionWifi;
     return; }

    public function setRegime($regime){
      $this->_regime = $regime;
     return; }



public function getNom() { return $this->_nom; }
public function getPrenom() { return $this->_prenom; }
public function getDate() { return $this->_date; }
public function getAdresse() { return $this->_adresse; }
public function getMutuel() { return $this->_mutuel; }
public function getSq() { return $this->_sq; }
public function getOptionTv() { return $this->_optionTv; }
public function getOptionWifi() { return $this->_optionWifi; }
public function getRegime() { return $this->_regime; }

}


 ?>
