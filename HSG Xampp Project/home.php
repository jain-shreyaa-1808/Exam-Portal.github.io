<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location:login.php');
}
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'quizdb');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <script>
     if(localStorage.getItem("count_timer"))
     {
        var count_timer = localStorage.getItem("count_timer");
     } 
    else 
    {
        var count_timer = 60*20;
        
    }
    var t;
    var hours=parseInt(count_timer/3600);
    var minutes = parseInt((count_timer-(hours*3600))/60);
    var seconds = parseInt(count_timer%60);
    function countDownTimer(){
        if(seconds < 10)
        {
            seconds= "0"+ seconds ;
        }
        if(minutes < 10)
        {
            minutes= "0"+ minutes ;
        }
        document.getElementById("time").innerHTML = hours+" : "+minutes+" : "+seconds;
        if(count_timer <= 0)
        {
            clearTimeout(t);
            localStorage.clear("count_timer");
            document.getElementById("form1").submit();
        } 
        else 
        {
            count_timer--;
            hours=parseInt(count_timer/3600);
            minutes = parseInt(count_timer/60);
            seconds = parseInt(count_timer%60);
            localStorage.setItem("count_timer",count_timer);
            t=setTimeout("countDownTimer()",1000);
        }
    }
    setTimeout("countDownTimer()",1000);
    
    </script>
</head>
<body>
<div class="head">
      <div class="logo">
        <img src="https://s3-ap-southeast-1.amazonaws.com/tv-prod/member/photo/7801039-large.jpeg" alt="logo">
        <button class="btn btn-primary" style="float:right;margin-top:35px;margin-right:50px"><a class="lgnbtn" href="logout.php" style=" font-size:20px;text-decoration: none; color:white;">Logout &nbsp;&nbsp;<i class="fas fa-sign-in-alt" aria-hidden="true"></i></a></button>
      </div>
      <div class="name">
        Hello Study Global
      </div>
      
    </div><br><br><br><br><br>
    <div class="card">
                <div id="time" style="background-color:white;"class="card-header pull-right position-fixed"></div>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 m-auto d-block">
            
            <div class="card">
                <!-- <div id="time" class="card-header display-4 text-center"></div> -->
                <h2 class="text-center text-success card-header">Logical Reasoning</h2>
                <br><p class="text-center">Choose any one out of the 4 choices</p>
                
            </div>
                <form id="form1" action="check.php" method="POST">
                        <?php
                        $t="SELECT * from questions where qid>='1' && qid <='5'";
                        $res=mysqli_query($con,$t);
                        $n=mysqli_num_rows($res);
                        for($i=1;$i<6;$i++){
                            $q="SELECT * from questions where qid = $i";
                            $query=mysqli_query($con,$q);
                            while($rows=mysqli_fetch_array($query)){

                        ?>
                                <div class="card">
                                        <h6 class="card-header"><?php echo$rows['question'] ?></h6>
                                    <?php
                                        $q="SELECT * from answers where ans_id = $i";
                                        $query=mysqli_query($con,$q);
                                        while($rows=mysqli_fetch_array($query)){
                        
                                    ?>
                                    <div class="card-body">
                                    <input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>">
                                    <?php echo $rows['answer']; ?>
                                </div>
                                
                        <?php       
                            }
                        }
                        }
                        ?>
                        <input type="submit" name="submitBtn" value="Submit" class="btn btn-success m-auto d-block" id="submitButton">
                        <!-- <button type="submit" name="submit" class="btn btn-success m-auto d-block">Submit</button> -->
                </form>
        
            </div>
        
    </div>
</body>
</html>