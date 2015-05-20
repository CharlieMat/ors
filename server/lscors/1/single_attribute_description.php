<!DOCTYPE HTML>
<html>
<head>
<title>统计信息</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Trotting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://ajax.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
<script type="text/javascript" src="js/move-top.js"></script>
       <script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<script type="text/javascript" src="js/esl.js"></script>

<?php 
include 'db/outpatient_log_dbo.php';
// include 'db/db_operator.php';
include 'components/echart_diagrams.php';
?>
</head>

<body>
<!-- header -->
	<div class="banner1">
		<div class="container">
			<?php include 'components/guide.php';?>
		</div>
	</div>
	<div class="content">
			<div class="container">
				<h1 style="height:50px;margin:10px" align="center">统计信息-单属性特征描述</h1>
				<p align="center">门诊记录共有<?php 
					get_total_count();?>个记录，每个记录涉及18个属性，其中重要分析性属性共有8个。数据的时间从<?php get_first_date()?>到<?php get_last_date()?></p>
				<div class="about-us">
					 <div class="about-header">
					    <h3>性别比例</h3>
					 </div>
					<div class="about-info">
						<a href="record_scheme.php">当前科室门诊挂号记录中的男女人数比，鼠标移动到饼图上查看人数</a>
						<div id="s_a_d_gender" style="height:400px;align:center">
						<?php
							include 'components/statistics.php';
							draw_statistics_gender('s_a_d_gender');
						?>
					</div>
				</div>
				<div class="about-us">
					 <div class="about-header">
					    <h3>年龄分布</h3>
					 </div>
					<div class="about-info">
						<a href="record_scheme.php">当前科室门诊挂号记录人数按年龄段分布，横轴为年龄，纵轴为人数</a>
						<div id="s_a_d_age" style="height:400px;align:center">
							<?php draw_statistics_age('s_a_d_age');?>
					</div>
				</div>

				<div class="about-us">
					 <div class="about-header">
					    <h3>病症分布</h3>
					 </div>
					<div class="about-info">
						<a href="record_scheme.php">当前科室门诊挂号记录人数按照病症进行分布，同一个人可能被诊断多种病症也可能没有病症，图中横轴为病症，纵轴为人数</a>
						<div id="s_a_d_diagnosis" style="height:400px;align:center">
							<?php draw_statistics_diagnosis('s_a_d_diagnosis');?>
					</div>
				</div>

				<div class="about-us">
					 <div class="about-header">
					    <h3>等待时间分布</h3>
					 </div>
					<div class="about-info">
						<a href="record_scheme.php">当前科室门诊挂号记录中人数按照等待时间进行分布，横轴为等待时间的区间，纵轴为等待时间落在区间中的人数</a>
						<div id="s_a_d_wait" style="height:400px;align:center">
							<?php draw_statistics_wait('s_a_d_wait');?>
					</div>
				</div>

				<div class="about-us">
					 <div class="about-header">
					    <h3>看病人数趋势</h3>
					 </div>
					<div class="about-info">
						<a href="record_scheme.php">当前科室门诊接诊量随时间变化的图，横轴为日期，纵轴为不同时间点门诊接诊量</a>
						<div id="s_a_d_trend" style="height:400px;align:center">
							<?php draw_statistics_trend('s_a_d_trend');?>
					</div>
				</div>

				<div class="about-us">
					 <div class="about-header">
					    <h3>医生接诊数量</h3>
					 </div>
					<div class="about-info">
						<a href="record_scheme.php">当前科室门诊记录中人数按接诊医生分布，横轴为接诊量，纵轴为医生</a>
						内容
						<div id="s_a_d_doctor" style="height:600px;align:center">
							<?php draw_statistics_doctor('s_a_d_doctor');?>
					</div>
				</div>

				<div class="about-us">
					 <div class="about-header">
					    <h3>复诊率与非复诊确诊率</h3>
					 </div>
					<div class="about-info" style="height:400px">
						<a href="record_scheme.php">左边饼图描述确诊病人群的复诊比例，右边饼图描述所有非复诊人群的确诊比例</a>
						<div id="s_a_d_consultation" style="height:400px"></div>
						<?php 
						draw_statistics_consultation('s_a_d_consultation');?>
					</div>
				</div>
			</div>
			
		</div>
		<!-- footer -->
	<div class="footer">
		<div class="container">
			<p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
		</div>
	</div>
</body>