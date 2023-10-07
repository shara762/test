<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login and Registration Form in HTML & CSS</title>
    <link rel="stylesheet" href="login.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $emailerr=$passerr=$gerr=$passerr=$aerr=$perr=$eerr=$aerr=$bgerr=$berr=$merr=$cerr=$areaerr="";
?>
   </head>
   
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/login1.jpg" alt="">
  
      </div> 
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="#" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope">
                    
                </i> <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <span class="error"><?php if(empty($_POST["email"]))
        {
            $emailerr="Email is required";
        }
        else
        {
          $email=test_input($_POST["email"]);
          if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
              $emailerr="Invalid email format";
          }
        }
         echo $emailerr;?> </span>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" placeholder="Enter your password" required>
              </div>
              <span class="error"><?php echo $passerr; ?> </span>
               <div class="title1">
                Login by:
             </div>
             <div class="radio">
                <input type="radio" value="User" name="r" required>&nbsp; User &nbsp;
                 <input type="radio" value="Nurse" name="r" required>&nbsp; Nurse &nbsp;
                  <input type="radio" value="Admin" name="r" required>&nbsp; Admin
                
                </div>
                 <span class="error"><?php  
      echo $gerr; ?> </span>
              
              <div class="text"><a href="#">Forgot password?</a></div>
             
              <div class="button input-box">
                <input type="submit" name="login" value="submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
      
        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="#" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                 <i class="fas fa-child"></i>
                <input type="text" placeholder="Enter child full name"  name="child" required>
              </div>
              <span class="error"><?php if(empty($_POST["child"]))
        {
            $cerr="Please enter child name";
        }
        else{
          $child=test_input($_POST["child"]);
          if (!preg_match ("/^[a-zA-z]*$/", $child))
          {
              $cerr="Only characters and white spaces are allowed";
              
          }
          if(strlen($child) > 32)
          {
                  $cerr="Can't take long names";
          }
           
        }
         echo $cerr; ?></span>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter mother name" name="mother" required>
              </div>
               <span class="error"><?php echo $merr; ?></span>
              <div class="input-box">
                <i class="fas fa-calendar"></i>
                <input type="text" placeholder="Enter Birth date"
        onfocus="(this.type='date')"
        onblur="(this.type='text')" name="bdate" required>
     
              </div>
          <span class="error"><?php echo $berr; ?></span>   
             <div class="radio1">
                  <i class="fas fa-child"></i>
                <input type="radio" value="Boy" name="g" required>&nbsp; Boy &nbsp;
                 <input type="radio" value="Girl" name="g" required> Girl &nbsp;
               
                </div>
              <span class="error"><?php echo $bgerr; ?></span>              
              <div class="input-box">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" placeholder="Enter address" name="addr" required>
              </div>
          <span class="error"><?php echo $aerr; ?></span>
          <div class="input-box">
               
               <select id="area" name="area">
                   <option value="katraj">Katraj</option>
                   <option value="saswad">Saswad</option>
                   <option value="gokulnagar">Gokulnagar</option>
                   <option value="balajinagar">Balajinagar</option>
               </select>
              </div>
             <span class="error"><?php echo $areaerr; ?></span>
              <div class="input-box">
                <i class="fas fa-phone-alt"></i>
                <input type="number" placeholder="Enter phone no" name="phone" required>
              </div>
              <span class="error"><?php echo $perr; ?></span>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter email" name="cemail" required>
              </div>
          <span class="error"><?php echo $eerr; ?></span> 
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter password" name="password" required>
              </div>
           <span class="error"><?php echo $passerr; ?></span> 
              <div class="button input-box">
                <input type="submit" name="signup" value="Submit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
<?php
    $emailerr=$passerr=$gerr=$passerr=$aerr=$perr=$eerr=$aerr=$bgerr=$berr=$merr=$cerr=$areaerr="";
    interface Login
    {
        public function connect();
    }
    class User implements Login
    {
        public $email,$pass;
        function __construct($email,$pass)
        {
            $this->email=$email;
            $this->pass=$pass;
        }
        public function connect()
        {
            $conn=mysqli_connect("localhost","root","","test");
            if(!$conn)
            {
                echo '<script> alert("connection failed"); </script>';
            }
            $sql="select email,pass from user where email='$this->email' and pass='$this->pass'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
                echo '<script> alert("Login successfully"); </script>';
                echo '<script> window.open("home.html"); ';
            }
            else
            {
                echo '<script> alert("Not match"); </script>';
            }
        }
    }
    
    
    class Nurse implements Login
    {
        public $email,$pass;
        function __construct($email,$pass)
        {
            $this->email=$email;
            $this->pass=$pass;
        }
        public function connect()
        {
            $conn=mysqli_connect("localhost","root","","test");
            if(!$conn)
            {
                echo '<script> alert("connection failed"); </script>';
            }
            $sql="select email,pass from nurse where email='$this->email' and pass='$this->pass'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
                echo '<script> alert("Login successfully"); </script>';
                echo '<script> window.open("nurse.html"); ';
            }
            else
            {
                echo '<script> alert("Not match"); </script>';
            }
        }
    }
    class Admin implements Login
    {
        public $email,$pass;
        function __construct($email,$pass)
        {
            $this->email=$email;
            $this->pass=$pass;
        }
        public function connect()
        {
            $conn=mysqli_connect("localhost","root","","test");
            if(!$conn)
            {
                echo '<script> alert("connection failed"); </script>';
            }
            $sql="select email,pass from admin where email='$this->email' and pass='$this->pass'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
                echo '<script> alert("Login successfully"); </script>';
                echo '<script> window.open("home.html"); ';
            }
            else
            {
                echo '<script> alert("Not match"); </script>';
            }
        }
    }
    
    
    class Signup{
        public $child,$mother,$bdate,$addr,$phone,$email,$area,$pass,$gender,$nurse;
        public function __construct($c,$m,$b,$p,$e,$a,$ar,$pa,$g,$n){
            $this->child=$c;
            $this->mother=$m;
            $this->bdate=$b;
            $this->addr=$a;
            $this->phone=$p;
            $this->email=$e;
            $this->area=$ar;
            $this->pass=$pa;
            $this->gender=$g;
            $this->nurse=$n;
        }
        public function insert()
        {
            $conn=mysqli_connect("localhost","root","","test");
            if(!$conn)
            {
                echo '<script> alert("connection failed");</script>';
            }
            
            $sql="insert into user(child,mother,bdate,addr,phone,email,area,pass,gender,nurseid) values('$this->child','$this->mother','$this->bdate','$this->addr','$this->phone','$this->email','$this->area','$this->pass','$this->gender','$this->nurse')";
            if(mysqli_query($conn,$sql)){
                echo '<script>alert("Signup successfully, Please Login");</script>';
            }
            else{
                echo '<script>alert("Signup failed");</script>';
            }
            mysqli_close($conn);
        }
    }
    
    
    
    
    if(isset($_POST['login']))
    {
        if(empty($_POST["email"]))
        {
            $emailerr="Email is required";
        }
        else
        {
          $email=test_input($_POST["email"]);
          if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
              $emailerr="Invalid email format";
          }
        }
        
       if(empty($_POST["pass"]))
        {
            $passerr="Password is required";
        }
        else
        {
          $pass=test_input($_POST["pass"]);
        }
        
       if(empty($_POST["r"]))
        {
            $gerr="It is required";
        }
        else
        {
          $ch=test_input($_POST["r"]);
         
        } 
         switch($ch)
         {
             case "User":
               $ob=new User($email,$pass);
               $ob->connect();
               break;
             case "Nurse":
               $ob1=new Nurse($email,$pass);
               $ob1->connect();
               break;
             case "Admin":
               $ob2=new Admin($email,$pass);
               $ob2->connect();
               break;
        }
   }
    function test_input($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    
    if(isset($_POST['signup']))
    {
        if(empty($_POST["child"]))
        {
            $cerr="Please enter child name";
        }
        else{
          $child=test_input($_POST["child"]);
          if (!preg_match ("/^[a-zA-z]*$/", $child))
          {
              $cerr="Only characters and white spaces are allowed";
              
          }
          if(strlen($child) > 32)
          {
                  $cerr="Can't take long names";
          }
           
        }
        
        if(empty($_POST["mother"]))
        {
            $merr="Please enter mother name";
        }
        else{
        $mother=test_input($_POST["mother"]);
         if (!preg_match ("/^[a-zA-z]*$/", $mother))
          {
              $merr="Only characters and white spaces are allowed";
              
          }  
         if(strlen($mother) > 16)
         {
                  $merr="Can't take long names";
         }
        }
        
        if(empty($_POST["bdate"]))
        {
            $berr="Please enter birth date";
        }
        else{
          $bdate=test_input($_POST["bdate"]);
           
        }
        
        if(empty($_POST["addr"]))
        {
            $aerr="Please enter address";
        }
        else{
          $addr=test_input($_POST["addr"]);
          if(strlen($addr)>50)
          {
              $aerr="Only 50 characters are allowed";
          }
           
        }
        
        
        if(empty($_POST["area"]))
        {
            $areaerr="Please choose near area for vaccination";
        }
        else{
          $area=test_input($_POST["area"]);
           
        }
       
       
        if(empty($_POST["phone"]))
        {
            $perr="Please enter phone no";
        }
        else{
          $phone=test_input($_POST["phone"]);
           if(strlen((string)$phone) != 10)
           {
               $perr="Only 10 digits are allowed";
           }
        }
        
        
        if(empty($_POST["g"]))
        {
            $bgerr="Please choose gender";
        }
        else{
          $bg=test_input($_POST["g"]);
           
        }
        
        if(empty($_POST["cemail"]))
        {
            $eerr="Email is required";
        }
        else
        {
          $cemail=test_input($_POST["cemail"]);
          if(!filter_var($cemail,FILTER_VALIDATE_EMAIL)){
              $eerr="Invalid email format";
          }
        }
        
       if(empty($_POST["password"]))
        {
            $perr="Password is required";
        }
        else
        {
            $password=test_input($_POST["password"]);
            if(strlen($password) < 8)
           {
               $perr="Minimum 8 characters or digits";
           }
          
        }
        if($area=="saswad"){
                $nurse=1;
            }
            else if($area=="balajinagar")
            {
                $nurse=2;
            }
            else if($area=="katraj"){
                $nurse=3;
            }
            else{
                $nurse=4;
            }
        $obj = new Signup($child,$mother,$bdate,$phone,$cemail,$addr,$area,$password,$bg,$nurse);
        $obj->insert();
    }
?>
