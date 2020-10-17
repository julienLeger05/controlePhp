<?php
require('../config.php');
class Country
{
    public $code;
    public $name;
    public $continent;
    public $region;
    public $surfaceArea;
    public $indepYear;
    public $population;
    public $lifeEx;
    public $gnp;
    public $gnpOld;
    public $localName;
    public $gov;
    public $headState;
    public $capital;
    public $code2;



    //constructeur utilisé avec $user = new User([mon tableau])
    public function __construct($data = [])
    {
        $this->populate($data);
    }

    public function populate($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists(self::class, $key)) {
                $this->$key = $value;
            }
        }
    }


    /**
     * read
     * @param int $id
     * @return Country
     */
    public static function find($code)
    {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM country where code=:code');
        $req->bindValue('code', $code, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Country');
        //renvoie une instance de User
        return $req->fetch();
    }

    /**
     * read
     * @param int $id
     * @return City[]
     */
    public static function findAll()
    {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM Country');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Country');
        //renvoie une instance de User
        return $req->fetchAll();
    }

    public function save()
    {
        if ($this->code === null) {
            $this->create();
        } else {
            $this->update();
        }
    }

    public function create()
    {
        $bdd = getBdd();
        $req = $bdd->prepare('INSERT INTO country (name, continent,region,surfacearea,indepyear,population,lifeexpectancy,gnp,gnpold,LocalName,governmentform,headofstate,capital,code2) 
            VALUE (:name, :continent,:region,:surfacearea,:indepyear,:population,:lifeexpectancy,:gnp,:gnpold,:LocalName,:governmentform,:headofstate,:capital,:code2)');
        $req->bindValue('name', $this->name);
        $req->bindValue('continent', $this->continent);
        $req->bindValue("region", $this->region);
        $req->bindValue("surfacearea", $this->surfaceArea);
        $req->bindValue("indepyear", $this->indepYear);
        $req->bindValue("population", $this->population);
        $req->bindValue("lifeexpectancy", $this->lifeEx);
        $req->bindValue("gnp", $this->gnp);
        $req->bindValue("gnpold", $this->gnpOld);
        $req->bindValue("LocalName", $this->localName);
        $req->bindValue("governmentform", $this->gov);
        $req->bindValue("headofstate", $this->headState);
        $req->bindValue("capital", $this->capital);
        $req->bindValue("code2", $this->code2);





        $req->execute();
        $this->code = $bdd->lastInsertId();
    }

    public function update()
    {
        $bdd = getBdd();
        $req = $bdd->prepare('UPDATE country SET 
            name=:name, continent=:continent,region=:region,surfacearea=:surfacearea,indepyear=:indepyear,population=:population,lifeexpectancy=:lifeexpectancy,gnp=:gnp,gnpold=:gnold,LocalName=:LocalName,governmentform=:governmentform,headofstate=:headofstate,capital=:capital,code2=:code2
            WHERE code=:code');
        $req->bindValue('name', $this->name);
        $req->bindValue('continent', $this->continent);
        $req->bindValue("region", $this->region);
        $req->bindValue("surfacearea", $this->surfaceArea);
        $req->bindValue("indepyear", $this->indepYear);
        $req->bindValue("population", $this->population);
        $req->bindValue("lifeexpectancy", $this->lifeEx);
        $req->bindValue("gnp", $this->gnp);
        $req->bindValue("gnpold", $this->gnpOld);
        $req->bindValue("LocalName", $this->localName);
        $req->bindValue("governmentform", $this->gov);
        $req->bindValue("headofstate", $this->headState);
        $req->bindValue("capital", $this->capital);
        $req->bindValue("code2", $this->code2);
        $req->bindValue('code', $this->code, PDO::PARAM_INT);
        $req->execute();
    }

    public function delete()
    {
        $bdd = getBdd();
        $req = $bdd->prepare('DELETE FROM country
            WHERE code=:code');
        $req->bindValue('code', $this->code, PDO::PARAM_INT);
        $req->execute();
    }
}
