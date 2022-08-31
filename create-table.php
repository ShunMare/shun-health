<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  $dsn = 'mysql:dbname=shun_health;host=localhost;charset=utf8mb4';
  $user = 'root';
  $password = '';

  $tbNutritionGroupArray = [
    'tb_essential_amino_acid', 
    'tb_aromatic_amino_acid', 
    'tb_sulfur_containing_amino_acid'
  ];
  $tbNutritionArray = [
    'tb_histidine',
    'tb_isoleucine',
    'tb_leucine',
    'tb_lysine',
    'tb_methionine',
    'tb_phenylalanine',
    'tb_threonine',
    'tb_tryptophan',
    'tb_valine'
  ];
  try{
    $pdo = new PDO($dsn, $user, $password);

    $sql = 'CREATE TABLE IF NOT EXISTS tb_nutrition(
      id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      group_id_1 INT(11) NOT NULL,
      group_id_2 INT(11) NOT NULL,
      group_id_3 INT(11) NOT NULL,
      group_id_4 INT(11) NOT NULL,
      group_id_5 INT(11) NOT NULL,
      nutrition_name_1 VARCHAR(60) NOT NULL,
      nutrition_name_2 VARCHAR(60) NOT NULL,
      nutrition_name_3 VARCHAR(60) NOT NULL,
      nutrition_name_eng_1 VARCHAR(60) NOT NULL,
      nutrition_name_eng_2 VARCHAR(60) NOT NULL,
      nutrition_name_eng_3 VARCHAR(60) NOT NULL,
      including_food VARCHAR(255) NOT NULL,
      detail_link VARCHAR(255) NOT NULL
      )';
    $pdo->query($sql);
    echo 'tb_nutrition<br>';

    $sql = 'CREATE TABLE IF NOT EXISTS tb_nutrition_group(
      id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      group_id_1 INT(11) NOT NULL,
      group_id_2 INT(11) NOT NULL,
      group_id_3 INT(11) NOT NULL,
      group_id_4 INT(11) NOT NULL,
      group_id_5 INT(11) NOT NULL,
      nutrition_name_1 VARCHAR(60) NOT NULL,
      nutrition_name_2 VARCHAR(60) NOT NULL,
      nutrition_name_3 VARCHAR(60) NOT NULL,
      nutrition_name_eng_1 VARCHAR(60) NOT NULL,
      nutrition_name_eng_2 VARCHAR(60) NOT NULL,
      nutrition_name_eng_3 VARCHAR(60) NOT NULL,
      nutrition_name_eng_abbreviation_1 VARCHAR(60) NOT NULL,
      nutrition_name_eng_abbreviation_2 VARCHAR(60) NOT NULL,
      nutrition_name_eng_abbreviation_3 VARCHAR(60) NOT NULL,
      including_food VARCHAR(255) NOT NULL,
      detail_link VARCHAR(255) NOT NULL
      )';      
    $pdo->query($sql);
    echo 'tb_nutrition_group<br>';

    foreach($tbNutritionGroupArray as $target){
      $sql = 'CREATE TABLE IF NOT EXISTS '.$target.'(
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        group_id_myself INT(11) NOT NULL,
        group_id_1 INT(11) NOT NULL,
        group_id_2 INT(11) NOT NULL,
        group_id_3 INT(11) NOT NULL,
        group_id_4 INT(11) NOT NULL,
        group_id_5 INT(11) NOT NULL,
        age_year INT(11) NOT NULL,
        age_month INT(11) NOT NULL,
        unit VARCHAR(60) NOT NULL,
        daily_requirement DECIMAL(7, 3) NOT NULL,
        daily_requirement_perkg_LHMW DECIMAL(7, 3) NOT NULL
        )';
      $pdo->query($sql);
      echo $target.'<br>';
    }
    foreach($tbNutritionArray as $target){
      $sql = 'CREATE TABLE IF NOT EXISTS '.$target.'(
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nutrition_id INT(11) NOT NULL,
        group_id_1 INT(11) NOT NULL,
        group_id_2 INT(11) NOT NULL,
        group_id_3 INT(11) NOT NULL,
        group_id_4 INT(11) NOT NULL,
        group_id_5 INT(11) NOT NULL,
        age_year INT(11) NOT NULL,
        age_month INT(11) NOT NULL,
        unit VARCHAR(60) NOT NULL,
        daily_requirement DECIMAL(7, 3) NOT NULL,
        daily_requirement_perkg_LHMW DECIMAL(7, 3) NOT NULL
        )';
      $pdo->query($sql);
      echo $target.'<br>';
    }
  }catch(PDOException $e){
    exit($e->getMessage());
  }
  ?>
</body>
</html>