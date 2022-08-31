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
  $filepath = 'C:\\Users\\okubo\\OneDrive\\デスクトップ\\nutrition\\';
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

    $sql = '
      LOAD DATA LOCAL INFILE "'.$filepath.'tb_isoleucine.csv"
      INTO TABLE tb_isoleucine
      FIELDS TERMINATED BY ","
      LINES TERMINATED BY "\n"
      IGNORE 1 LINES
      ';
    $pdo->query($sql);
    echo $sql;
  }catch(PDOException $e){
    echo $sql;

    exit($e->getMessage());
  }
  ?>
</body>
</html>