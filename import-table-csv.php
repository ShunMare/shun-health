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
  $dsn = 'mysql:dbname=db_shun_health;host=localhost;charset=utf8mb4';
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
  $data_list = 
  array
    ('id',
    'nutrition_id',
    'group_id_1',
    'group_id_2',
    'group_id_3',
    'group_id_4',
    'group_id_5',
    'age_year',
    'age_month',
    'unit',
    'daily_requirement',
    'daily_requirement_perkg_LHMW'
  );

  /**
  * @brief
  * @param
  * @return
  */
  function load_from_csv(){
    global $data_list;

    $csv = file('C:\Users\okubo\OneDrive\デスクトップ\nutrition\tb_valine.csv');
    $csv_header = $csv[0];
    $csv_body = array_splice($csv, 1);
    
    foreach($csv_body as $row){
      $row_array = explode(',', $row);
      $tmp_array = array_combine($data_list, $row_array);
      save_data_to_db($tmp_array);
    };
  }
  /**
  * @brief
  * @param
  * @return
  */
  function save_data_to_db($target_array){
    global $dsn, $user, $password;
    $pdo = new PDO($dsn, $user, $password);
    $stmt = $pdo->prepare("INSERT INTO tb_valine
      (id,
      nutrition_id,
      group_id_1,
      group_id_2,
      group_id_3,
      group_id_4,
      group_id_5,
      age_year,
      age_month,
      unit,
      daily_requirement,
      daily_requirement_perkg_LHMW)
      VALUES
      (:id,
      :nutrition_id,
      :group_id_1,
      :group_id_2,
      :group_id_3,
      :group_id_4,
      :group_id_5,
      :age_year,
      :age_month,
      :unit,
      :daily_requirement,
      :daily_requirement_perkg_LHMW)
      ");
    $stmt->execute($target_array);
  }
  try{
    load_from_csv();
  }catch(PDOException $e){
    exit($e->getMessage());
  }
  ?>
</body>
</html>