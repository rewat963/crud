<?php 
 if(isset($_POST['submit'])){
    require_once 'db.php';
    $empno = $_POST['empno'];
    $ename = $_POST['ename'];
    $username = $_POST['username'];
    $password = MD5($_POST['password']);
    $sql = "INSERT INTO emp (EMPNO,ENAME,USERNAME,PASSWORD) VALUES (?,?,?,?)";
    $statement = $connection->prepare($sql);
    if ($statement->execute([$empno, $ename, $username, $password])) 
      {
      echo 'ลงทะเบียนเสร็จเรียบร้อย';
      }
} 
?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <center> <h3>สร้างบัญชี</h3></center>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
        <?= $message; ?>
        </div>
      <?php endif; ?>
<form name="register" action="" method="post">
<div>
  <input type="text" class="form-control" name="empno" placeholder="Student ID" required>
</div>
<br>
<div>
  <input type="text" class="form-control" name="ename" placeholder="Name" required>
</div>
<br>
<div>
  <input type="text" class="form-control" name="username" placeholder="Email" required>
</div>
<br>
<div>
  <input type="password" class="form-control" name="password" placeholder="Password" required>
</div>
<br>
<center>
<div>
  <input type="submit" name='submit' value="สมัคร" class="btn btn-primary">
</div>
</center>
</form>
<?php require 'footer.php'; ?>