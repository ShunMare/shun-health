<?php
  $dsn = 'mysql:dbname=db_shun_health;host=localhost;charset=utf8mb4';
  $user = 'root';
  $password = '';
  try {
    $pdo = new PDO($dsn, $user, $password);
    $sql = 'SELECT id, nutrition_name_1 FROM tb_nutrition';
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    exit($e->getMessage());
  }
  if(isset($_POST['submit'])){
    try{
      $pdo = new PDO($dsn, $user, $password);
      // $sql = 

      $stmt->bindValue(':userHeight', $_POST['userHeight'], PDO::PARAM_STR);
      echo ':userHeight';

    } catch (PDOException $e) {
      exit($e->getMessage());
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>ShunMare</title>
  <meta charset="utf-8">
  <meta name="description" content="フリーランスエンジニアとして活動しています。海外で活躍できるエンジニアを目指します。">
  <meta name="viewport" content="width=device-width", initial-scale="1.0">
  <link rel="shortcut icon" href="images/shunMARE.ico" type="image/vnd.microsoft.icon">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <!-- <link rel="stylesheet" href="css/common/style_common.css"> -->
  <link rel="stylesheet" href="css/common/style_header.css">
  <link rel="stylesheet" href="css/common/style_footer.css">
  <!-- <link rel="stylesheet" href="css/parts/style_pagetop.css"> -->
  <!-- <link rel="stylesheet" href="css/parts/style_more.css"> -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <header>
    <nav class="header-wrapper">
      <a href="#">tmp1</a>
      <a href="#">tmp2</a>
      <a href="#">tmp3</a>
      <a href="#">tmp4</a>
    </nav>
  </header>
  <div class="container">
    <div class="title-wrapper row mt-5">
      <div class="title d-flex justify-content-center mt-5">
        <p>微量栄養素一覧</p>
      </div>
    </div>
    <div class="input-wrapper row mt-5">
      <div class="d-flex justify-content-end col-10">
      </div>
      <div class="d-flex justify-content-end col-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          情報入力
        </button>
      </div>
    </div>
    <div class="table-wrapper row">
      <table class="table table-sm table-success table-striped table-hover mt-4">
        <thead class="text-center">
          <th scope="col">栄養素名</th>
          <th scope="col">摂取基準量</th>
          <th scope="col">単位</th>
          <th scope="col">含まれる食品</th>
          <th scope="col">詳細</th>
        </thead>
        <tbody class="text-center">
          <tr>
            <td scope="row">ロイシン</td>
            <td>10000</td>
            <td>mg</td>
            <td>プロテイン</td>
            <td>詳細</td>
          </tr>
          <?php
          foreach($results as $result){
            echo "
            <tr>
              <td scope='row'>{$result['nutrition_name_1']}</td>
            </tr>
            ";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div> 
  <!-- modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">情報入力</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="container modal-body px-5 needs-validation" method="post" novalidate>
        <!-- <form class="container modal-body px-5 was-validated" method="post" novalidate> -->
          <div class="row justify-content-center">
            <div class="col-7">
              <div class="input-group mb-3 col-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">身長</span>
                </div>
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="userHeight" name="userHeight" required>
                <div class="input-group-append">
                  <span class="input-group-text">cm</span>
                </div>
                <div class="invalid-feedback">身長を入力して下さい。</div>              
              </div>
              <div class="input-group  mb-3 col-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">体重</span>
                </div>
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="userWeight" name="userWeight" required>
                <div class="input-group-append">
                  <span class="input-group-text">kg</span>
                </div>
                <div class="invalid-feedback">体重を入力して下さい。</div>              
              </div>
            </div>
          </div>
          <div class="col-5">
            <select class="row form-select" aria-label="Default select example">
              <!-- <option selected>Open this select menu</option> -->
              <?php
              $cntValue = 0;
              for($age = 0; $age <= 100; $age++){
                echo "
                <option value='".$cntValue."'>{$age}</option>
                ";
                $cntValue++;
              }
              ?>
            </select>
            <div class="row d-flex mt-2">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioSex" id="flexRadioMale" checked>
                <label class="form-check-label" for="male">男性</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioSex" id="flexRadioFemale">
                <label class="form-check-label" for="female">女性</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  全て
                </label>
              </div>
            </div>
            <div class="col-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  EAA
                </label>
              </div>
            </div>
          </div>     
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
          <button type="button submit" class="btn btn-primary" data-bs-dismiss="" id="enterSubmit">確定</button>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="footer-sns-wrapper">
      <a href="https://www.facebook.com/japan.shun.o/"><img src="images/facebook.png" alt="Facebookのリンク"></a>
      <a href="https://www.instagram.com/shun.inyan/"><img src="images/instagram.png" alt="Instagramのリンク"></a>
      <a href="https://github.com/ShunMare"><img src="images/github.png" alt="GitHubのリンク"></a>
    </div>
    <div class="footer-copyright-wrapper">
      <span class="footer-copyright">&copy;2022 ShunHealth, Inc. All Rights Reserved. </span>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>