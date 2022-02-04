
<?php
/**  NR le 24/12/2020
* Ce fichier sera inclus dans toutes les pages
* Il permet de définir des fonctions générales 
* qui peuvent être utilisés dans toutes les pages
* la fonction escape peut être utilisées pour éviter des injections XSS



 *   escape retourne la chaine de caractères avec changement 
 *    des doubles quotes en simple quote
 *   $data représente la chaine de caractères à traiter
 */
function escape(string $data) : string {
    return htmlentities($data, ENT_QUOTES, 'UTF-8');
}