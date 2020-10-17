<?php




/**
 * @return PDO
 */
function getBdd()
{
    try {
        $bdd = new PDO(
            'mysql:host=localhost;dbname=blog;charset=utf8',
            'root',
            '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
        );
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
