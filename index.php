<html>
<head>
	<title>Pittsford Panthers Robotics Team Scouting Website</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<article style="border: 3px solid #1e208d;">
		<img src="http://pittsfordrobotics.org/Images/PantherBanner1.png" width=100%/>
	</article>
	<article style="border: 3px solid #1e208d;">
		<h1 class="scouting">Match Scouting</h1>
		<br/>
		<table style="width: 100%"><tr><td style="width: 50%">
		<form action="scout.php" method="POST" class="login">
			Your Team Number:<input type="number" name="num" min="1" required/>
			<br/>
			Your Name:<input name="name" required/>
			<br/>
			Match Number:<input type="number" name="match" min="1" required/>
			<br/>
			Event:<select name="event">
				<?php
					$events = array();
					if($handle = opendir("events"))
					{
						while(false !== ($entry = readdir($handle)))
						{
							if(is_dir("events/$entry") && $entry != '.' && $entry != '..')
							{
								$events[] = $entry;
							}
						}
						closedir($handle);
					}
					for($i = 0; $i < count($events); ++$i)
					{
				?>
				<option value="<?php echo($events[$i]); ?>"><?php echo(file_get_contents("events/".$events[$i]."/name")); ?></option>
				<?php
					}
				?>
			</select>
			<br/>
			<input type="submit" value="Start Scouting"/> 
		</form></td>
		<td style="text-align: left; width: 50%">
			Event not listed? <input type="button" onclick="window.location='editevent.php'" value="Create One"/>
			<br/>
				<form action="results.php" method="POST">
				If you've scouted, <input type="submit" value="View Results"/>
				<br/>
				For Team <select name="team">
				<?php
					$robots = array();
					if($handle = opendir("robots"))
					{
						while(false !== ($entry = readdir($handle)))
						{
							if($entry != '.' && $entry != '..')
							{
								$robots[] = substr($entry,0,-4);
							}
						}
						closedir($handle);
					}
					for($i = 0; $i < count($robots); ++$i)
					{
				?>
				<option value="<?php echo($robots[$i]) ?>"><?php echo($robots[$i]) ?></option>
				<?php
					}
				?>
				</select>
				<br/>
				As <input name="name" required/>
				<br/>
				From Team <input type="number" name="scouterteam" min="1" required/>
			</form>
		</td></tr></table>
	</article>
	<article>
		<a style="text-decoration: none" href="https://github.com/brpylko/FRC-Scouting">
			<img style="height: 5%" src="GitHub-Mark.png"/>
		</a>
		<a style="text-decoration: none" href="https://www.gnu.org/licenses/gpl.html">
			<img style="height: 5%" src="GPL3.jpg"/>
		</a>
		<a style="text-decoration: none" href="http://www3.usfirst.org/roboticsprograms/frc">
			<img style="height: 5%" src="logo-frc.gif"/>
		</a>
	</article>
</body>
</html>
