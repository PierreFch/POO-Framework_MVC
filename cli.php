<?php
//snake_case   nom des fichiers
//camelCase    fonctions et variables
//PascalCase   nom de classe
//kebab-case


////////////////////////////// Classes //////////////////////////////

class User
{
    public function __construct(public string $firstname, public string $lastname, public string $birthday){
    }

    public function getFullName(): string{
        return $this->firstname . " " . $this->lastname;
    }

    public function getAge(): int{
        $date = new DateTime($this->birthday);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    public function isAdult(): bool{
        return $this->getAge() >= 18;
    }
}

function getRandomElement(array $array){
    $randomKey = array_rand($array);
    return $array[$randomKey];
}

$users = [
    new User("Mathis", "GASPAROTTO", "2001-02-23"),
    new User("Tom", "PERRET", "2002-02-03"),
    new User("Melvyn", "REBECA", "1990-02-12"),
    new User("JFR", "SIMBARE", "1998-03-30"),
    new User("Pierre", "FAUCHEUR", "2000-09-20"),
];

$randomUser = getRandomElement($users);

echo "{$randomUser->getFullName()} tu as été choisi et tu as ";
echo "{$randomUser->getAge()} ans.";
