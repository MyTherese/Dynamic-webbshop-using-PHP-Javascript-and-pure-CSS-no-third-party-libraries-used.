
 <?php 

 class config {

  public static function connect() {
  $DATABASE_HOST = 'localhost';
  $DATABASE_USER = 'root';
  $DATABASE_PASS = 'root';
  $DATABASE_NAME = 'tickets';

  try { 

  $db = new PDO("mysql:host=$DATABASE_HOST; dbname=$DATABASE_NAME", $DATABASE_USER,$DATABASE_PASS);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  }catch(PDOException $e)
  {
     echo 'connection failed' .  $e->getMessage();
  }

  return $db;

}
 }
  ?>
