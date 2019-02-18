<html>
	<head>
		<title>Shennanigans</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>

	<body>
		<div id="container">
			<div id="header">
				<h1>Joe's Website</h1>
			</div>
			
			<div id="content">
				<div id="nav">
					<h3>Navigation</h3>
					<ul>
						<li>Home</li>
						<li>About</li>
						<li>Contact</li>
					</ul>
				</div>
				
				<div id="header2">
					<h2>Date/Time Assignment</h2>
				</div>
				
				<div id="main">
						
					<p>Demonstrate at least 3 functions they have created:</p>
						<p>1.Calling today's date with PHP's getdate() function</p>
						<?php
							$Date = getdate();
							//echo " $Date";
						?>
							<p>Today's date is: <?php echo $Date ?> </p>
						
						<p>2.Calling the current time with PHP's gettimeofday() function</p>
						<?php
							$TOD = gettimeofday();
							
						?>
							<p>The current time is: <?php echo $TOD ?> </p>
						
					<p>Use PHP date-time functions to calculate and display the dates and the number of days between at least 4 significant events chosen by the student.</p>
					<?php
						$date1=date_create("2006-05-20");
						$date2=date_create("2018-04-15");
						$diffN=date_diff($date1,$date2);
					?>
					<p>Days since I left the Navy: <?php echo $diffN->format("%R%a days"); ?> </p>
					
					<?php
						$date3=date_create("1991-06-02");
						$date4=date_create("2018-04-15");
						$diffG=date_diff($date3,$date4);
					?>
					<p>Days since I graduated high school: <?php echo $diffG->format("%R%a days"); ?> </p>
					
					<?php
						$date5=date_create("2007-10-13");
						$date6=date_create("2018-04-15");
						$diffM=date_diff($date5,$date6);
					?>
					<p>Days since I got married: <?php echo $diffM->format("%R%a days");?></p>
					<?php
						$date7=date_create("1973-09-24");
						$date8=date_create("2018-04-15");
						$diffB=date_diff($date7,$date8);
					?>
					<p>Days since my birth: <?php echo $diffB->format("%R%a days");?></p>
					
				</div>
				
			</div>
			
			<div id="footer">
				Copyright &copy; 2019 RUXOJO
			</div>
			
		</div>
		
	</body>
	
</html>