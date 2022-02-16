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
    <title>Document</title>
    <script>
     if(localStorage.getItem("count_timer"))
     {
        var count_timer = localStorage.getItem("count_timer");
     } 
    else 
    {
        var count_timer = 60*1;
        
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
    <script>
        document.getElementById("next".addEventListener('click',()=>{
            <?php
            $next=2;
            quest($next++);
            ?>
        }))
        </script>
</head>
<body>

    <div class="container">
    <div class="nav navbar navbar-right">
    <h1 class="text-center">GRE TEST</h1>
    <a href="logout.php" class="btn btn-primary float-right">Logout</a>

    </div>
<div class="col-lg-8 m-auto d-block">
    <div class="card">
    <div id="time" class="card-header display-4 text-center"></div>
        <h2 class="text-center text-success card-header">Logical Reasoning</h2>
        <br><p class="text-center">Choose any one out of the 4 choices</p>
        
     </div>
     <form id="form1" action="check.php" method="POST">
         <?php
          $t="SELECT * from questions where qid>='1' && qid <='5'";
          $res=mysqli_query($con,$t);
          $n=mysqli_num_rows($res);
        //   for($i=1;$i<6;$i++){
            quest(1);
            function quest($i){
                global $con;
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
?>

            <button id="next" class="btn btn-primary m-auto" style="width:70px;">Next</button><br><br>
<?php
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