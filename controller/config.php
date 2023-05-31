<?php
class Config
{
  public $con;

  function __construct()
  {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "realtime-rank";

    $this->con = mysqli_connect($hostname, $username, $password, $database);

    if (!$this->con) {
      echo "<h2>Error Connecting Database!</h2>";
      die();
    }
  }

  public function dd($value, $die = false)
  {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    $die ? die() : "";
  }

  public function getTeam()
  {
    $sql = "SELECT * FROM teams WHERE is_joining = 1 ORDER BY id DESC LIMIT 4";
    $execute = mysqli_query($this->con, $sql);
    $datas = [];

    $i = 0;
    while ($data = mysqli_fetch_assoc($execute)) {
      $data["sort"] = ++$i;
      array_push($datas, $data);
    }

    echo json_encode($datas);
  }

  public function createTeam($value)
  {
    extract($value);

    $ext = explode(".", $files['logo']['name']);
    $ext = array_pop($ext);

    $file_name = str_replace(" ", "-", strtolower($datas["name"])) . "." . $ext;
    $target_dir = "./assets/img/";
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($files["logo"]["tmp_name"], $target_file)) {
      $sql = "INSERT INTO teams (`name`, `organization`,`logo`) VALUES('{$datas['name']}', '{$datas['organization']}', '$file_name')";
      $execute = mysqli_query($this->con, $sql);

      if ($execute) {
        header('location:setting.php');
      } else {
?>
        <script>
          Swal.fire('Error!', 'Something wrong in the system.', 'error');
        </script>
      <?php
      }
    } else {
      ?>
      <script>
        Swal.fire('Error!', 'Something wrong in the system.', 'error');
      </script>
      <?php
    }
  }

  public function editTeam($value)
  {
    extract($value);

    if ($files['logo']['name'] != "") {
      $ext = explode(".", $files['logo']['name']);
      $ext = array_pop($ext);

      $file_name = str_replace(" ", "-", strtolower($datas["name"])) . "." . $ext;
      $target_dir = "./assets/img/";
      $target_file = $target_dir . $file_name;

      unlink($target_dir . $datas["old_logo"]);
      if (move_uploaded_file($files["logo"]["tmp_name"], $target_file)) {
        $sql = "UPDATE teams SET name='{$datas['name']}', organization='{$datas['organization']}', logo='{$file_name}' WHERE id='{$datas['id']}'";
        $execute = mysqli_query($this->con, $sql);

        if ($execute) {
          header('location:setting.php');
        } else {
      ?>
          <script>
            Swal.fire('Error!', 'Something wrong in the system.', 'error');
          </script>
        <?php
        }
      } else {
        ?>
        <script>
          Swal.fire('Error!', 'Something wrong in the system.', 'error');
        </script>
      <?php
      }
    } else {
      $sql = "UPDATE teams SET name='{$datas['name']}', organization='{$datas['organization']}' WHERE id='{$datas['id']}'";
      $execute = mysqli_query($this->con, $sql);

      if ($execute) {
        header('location:setting.php');
      } else {
      ?>
        <script>
          Swal.fire('Error!', 'Something wrong in the system.', 'error');
        </script>
<?php
      }
    }
  }

  public function editTeamPoint($value)
  {
    extract($value);

    $sql = "UPDATE teams SET point={$point} WHERE id={$id}";
    $execute = mysqli_query($this->con, $sql);

    // $execute = true;

    echo $execute ? "success" : "error";
  }

  public function deleteTeam($id)
  {
    $sql = mysqli_query($this->con, "SELECT * FROM teams WHERE id='{$id}'");
    $data = mysqli_fetch_assoc($sql);

    $sql = "DELETE FROM teams WHERE id='{$id}'";
    $execute = mysqli_query($this->con, $sql);
    // $execute = true;

    unlink("../assets/img/" . $data["logo"]);
    // var_dump($data);

    echo $execute ? "success" : "error";
  }
}
