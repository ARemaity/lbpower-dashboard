
<?php
	/* Database connection settings */
	
  

  $host = "localhost";
$user = "root";
$pass ="";
$db="id8992783_isd";


	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	
	

	//query to get data from the table
	$sql1 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=1");
  $cum1 = mysqli_fetch_object($sql1);
  $q1  = (int)$cum1->sums;




  $sql2 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=2");
  $cum2 = mysqli_fetch_object($sql2);
  $q2  = (int)$cum2->sums;




  $sql3 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=3");
  $cum3 = mysqli_fetch_object($sql3);
  $q3  = (int)$cum3->sums;




  $sql4 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=4");

  $cum4 = mysqli_fetch_object($sql4);
  $q4  = (int)$cum4->sums;





  $sql5 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=5");

  $cum5 = mysqli_fetch_object($sql5);
  $q5  = (int)$cum5->sums;





  $sql6 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=6");

  $cum6 = mysqli_fetch_object($sql6);
  $q6  = (int)$cum6->sums;





  $sql7 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=7");

  $cum7 = mysqli_fetch_object($sql7);
  $q7  = (int)$cum7->sums;




  
  $sql8 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=8");

  $cum8 = mysqli_fetch_object($sql8);
  $q8  = (int)$cum8->sums;





  $sql9 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=9");

  $cum9 = mysqli_fetch_object($sql9);
  $q9  = (int)$cum9->sums;






  $sql10 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=10");

  $cum10 = mysqli_fetch_object($sql10);
  $q10  = (int)$cum10->sums;



  $sql11 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=11");

  $cum11 = mysqli_fetch_object($sql11);
  $q11  = (int)$cum11->sums;



  $sql12 = mysqli_query($mysqli, "SELECT sum(Total) as sums  from payment,client where payment.fk_client=client.id AND client.fkSupplier=2 AND payment.payment_st=1 AND month(payment.payment_date)=12");

  $cum12 = mysqli_fetch_object($sql12);
  $q12  = (int)$cum12->sums;

	//loop through the returned data
	
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

    <title>Document</title>
</head>
<body>
    <canvas id="line-chart" width="800" height="200"></canvas>
    <script>
        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
         new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    datasets: [{ 
        data: [<?php echo $q1;?>,<?php echo $q2;?>,<?php echo $q3;?>,<?php echo $q4;?>,<?php echo $q5;?>,<?php echo $q6;?>,<?php echo $q7;?>,<?php echo $q8;?>,<?php echo $q9;?>,<?php echo $q9;?>,<?php echo $q10;?>,<?php echo $q11;?>,<?php echo $q12;?>],
        label: "Monthly Revenue",
        borderColor: "#3e95cd",
        fill: false
      }
    ]
  },options: {
    title: {
      display: true,
      text: 'total revenue from client per month'
    }
  }
});
      </script>
</body>
</html>