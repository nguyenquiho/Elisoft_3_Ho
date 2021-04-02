<?php
	if(isset($_POST['answer']))
	{
		//ID cua lua chon
		$id = $_POST['answer'];
		//Tang so luot vote
		$sql = 'UPDATE `nn_answer` SET `vote`=`vote`+1
		WHERE `id`='.$id;
		mysqli_query($link, $sql);	
		
		//Lay lai du lieu sau khi update
		$sql = 'SELECT `id`,`content`,`vote` FROM `nn_answer` WHERE `question_id`='.$r_question['id'];
		$rs_answer = mysqli_query($link, $sql);
		//Chuyen trang - xu ly form resubmition khi refresh (F5)
		header('location:?mod=poll');
	}
	
?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
		  <?php
		  	while($r = mysqli_fetch_assoc($rs_answer))
			{
		  ?>
          	['<?=$r['content']?>',     <?=$r['vote']?>],
		 <?php
			}
		 ?>
        ]);

        var options = {
          title: '<?=$r_question['content']?>',
		  is3D: true,
		  legend:{position: 'bottom', textStyle: {color:'red',fontSize:22}},
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <div id="piechart" style="width: 700px; height: 500px;"></div>