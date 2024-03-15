<?php

class abstract personne
{
    // att
    protected $nom;
    protected $prenom ;

    // methode
    public abstract function Getnom();
    public abstract function GetPrenom();



}

class employer extends personne
{

    public function Getnom()
    {
        return $this->$nom;
    }
    public function GetPrenom()
    {
        return $this->$prenom;
    }

    public function fullname()
    {
        return $this->Getnom +"."+ $this->GetPrenom;
    }


}

$obj = new  employer;
?>
