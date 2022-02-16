<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <br><br><br><br>
    <div class="container text-center">
    <table class="table text-center table-bordered table-hover">
        <tr>
            <th colspan="2" class="bg-dark"><h2 class="text-white">Result</h2></th>
        </tr>
        <tr>
            <td>Questions Attempted</td>



            <?php
            session_start();
            if(!isset($_SESSION['username']))
            {
                header('location:login.php');
            }
            $con=mysqli_connect('localhost','root');
            mysqli_select_db($con,'quizdb');
            $result=0;
            $wrong=0;
            $unattempted=0;
            $i=1;
            // if(isset($_POST['submitBtn'])){
                if(!empty($_POST['quizcheck']))
                {
                    $count=count($_POST['quizcheck']);
            ?>
                    <td>
                    <?php
                    echo $count. " questions";
                    ?>
                    </td>
            <?php
                    $selected=$_POST['quizcheck'];
                    $q="SELECT * from questions";
                    $query=mysqli_query($con,$q);
                    while($rows =mysqli_fetch_array($query)){
                        if (isset($selected[$i])) {
                        $checked= $rows['ans_id']== $selected[$i];
                        }
                        else{
                            $checked=-1;
                        }
                        if($checked==1)
                        {
                            $result++;
                        }
                        if($checked==0)
                        {
                            $wrong++;
                        }
                        if (!(isset($selected[$i]))) {
                            $unattempted++;
                        }
                        $i++;
                    }

                }
                
            // }
            else{
                ?>
                <td>
                <?php
                    echo "0 Questions";
                ?> 
                </td> 
            <?php
            }
            ?>
            
            <tr>
                <td>Score</td>
                <td colspan="2">
                <?php
                echo"Your total score is ".$result ;
                ?>
            </td>
            </tr>
            <tr>
                <td>Right Answers</td>
                <td colspan="2">
                <?php
                echo $result ;
                ?>
            </td>
            </tr>
            <tr>
                <td>Wrong Answers</td>
                <td colspan="2">
                <?php
                echo $wrong ;
                ?>
            </td>
            </tr>
            <tr>
                <td>Unattempted</td>
                <td colspan="2">
                <?php
                echo $unattempted;
                ?>
            </td>
            </tr>
            </table>
            <?php
            $name=$_SESSION['username'];
            $finalresult="insert into user( username,totalques,answerscorrect) values('$name','21','$result')";
            $queryresult= mysqli_query($con,$finalresult);
        
            ?>
            <a href="result.php" class="btn btn-primary">Report Card</a>
            <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
</body>
</html>