<?php
include_once "dbconnect.php";
$check = $_POST['check'];
if ($check == "getcontributioncount"){
	$name = $_POST['name'];
	$count = 0;
	$result = mysqli_query($con,"select * from data where user = '{$name}' and status = 'publish'");
	while($row = mysqli_fetch_array($result)){
		$count += 1 ;
	}
	echo($count);
}
elseif($check == "getpendingpostcount"){
	$count = 0;
	$result = mysqli_query($con,"select * from data where status = 'pending'");
	while($row = mysqli_fetch_array($result)){
		$count += 1 ;
	}
	echo($count);
}
elseif ($check == "getcontributionlist") {
}
elseif($check == "gettopcontributors"){
	$result = mysqli_query($con,"SELECT * FROM users ORDER BY contribution DESC");
	$list = "";
	$i = 3;
	while($row = mysqli_fetch_array($result)){
		if ($i <= 0){
			$list .= "<div style = 'box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16);background-color:#fff;padding:20px;padding-top:8px;margin-bottom:10px;'><img class='circle' style ='width:50px;border-radius:50%;float:left;margin-right:10px;' src='/assets/img/usr/{$row['id']}.jpg' onError=\"this.onerror=null;this.src='/assets/img/usr/sample.png';\"><p style = 'text-align:left;'>{$row['name']}&nbsp;&nbsp;<span style='color:#62a8ea;background-color:#f3f3f3;padding:10px;padding-left:30px;padding-right:30px;border-radius:200px;float:right;'>{$row['contribution']} contributions</span></p></div>";
		}
		$i -= 1;
	}
	exit($list);
}
elseif ($check == "getfirst") {
	$result = mysqli_query($con,"SELECT * FROM users ORDER BY contribution DESC");
	$i = 3;
	while ($row = mysqli_fetch_array($result)) {
		if($i == 3){
			$first = "<div style = 'box-shadow: 0 3px 15px 0 rgba(0,0,0,0.2), 0 0 0 1px rgba(0,0,0,0.08);background-color:#fff;position:relative;z-index:-1;height:310px;width:300px;padding:40px;'><center><img class='circle' style ='width:120px;border-radius:100%;position:relative;z-index:-1;' src='/assets/img/usr/{$row['id']}.jpg' onError=\"this.onerror=null;this.src='/assets/img/usr/sample.png';\"><img style='width:35px;margin-left:-40px;margin-top:80px;' src = '/assets/icon/1st.svg'></img><br><br><h3>{$row['name']}</h3><span style='color:#62a8ea;background-color:#f3f3f3;padding:10px;padding-left:30px;padding-right:30px;border-radius:200px;'>{$row['contribution']} contributions</span></center></div>";
			break;
		}
		$i -= 1;
	}
	exit($first);
}
elseif ($check == "getsecond") {
	$result = mysqli_query($con,"SELECT * FROM users ORDER BY contribution DESC");
	$i = 3;
	while ($row = mysqli_fetch_array($result)) {
		if($i == 2){
			$second = "<div style = 'box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16);background-color:#fff;position:relative;z-index:-1;height:310px;width:300px;padding:40px;'><center><img class='circle' style ='width:120px;border-radius:100%;position:relative;z-index:-1;' src='/assets/img/usr/{$row['id']}.jpg' onError=\"this.onerror=null;this.src='/assets/img/usr/sample.png';\"><img style='width:35px;margin-left:-40px;margin-top:80px;' src = '/assets/icon/2nd.svg'></img><br><br><h3>{$row['name']}</h3><span style='color:#62a8ea;background-color:#f3f3f3;padding:10px;padding-left:30px;padding-right:30px;border-radius:200px;'>{$row['contribution']} contributions</span></center></div>";
			break;
		}
		$i -= 1;
	}
	exit($second);
}
elseif ($check == "getthird") {
	$result = mysqli_query($con,"SELECT * FROM users ORDER BY contribution DESC");
	$i = 3;
	while ($row = mysqli_fetch_array($result)) {
		if($i == 1){
			$third = "<div style = 'box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16);background-color:#fff;position:relative;z-index:-1;height:310px;width:300px;padding:40px;'><center><img class='circle' style ='width:120px;border-radius:100%;position:relative;z-index:-1;' src='/assets/img/usr/{$row['id']}.jpg' onError=\"this.onerror=null;this.src='/assets/img/usr/sample.png';\"><img style='width:35px;margin-left:-40px;margin-top:80px;' src = '/assets/icon/3rd.svg'></img><br><br><h3>{$row['name']}</h3><span style='color:#62a8ea;background-color:#f3f3f3;padding:10px;padding-left:30px;padding-right:30px;border-radius:200px;'>{$row['contribution']} contributions</span></center></div>";
			break;
		}
		$i -= 1;
	}
	exit($third);
}
elseif($check == "gettopcontributorsm"){
	$result = mysqli_query($con,"SELECT * FROM users ORDER BY contribution DESC");
	$list = "";
	$i = 3;
	while($row = mysqli_fetch_array($result)){
		if ($i <= 0){
			$list .= "<div style = 'box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16);background-color:#fff;padding:20px;padding-top:8px;margin-bottom:10px;'><img class='circle' style ='width:50px;border-radius:50%;float:left;margin-right:10px;' src='/assets/img/usr/{$row['id']}.jpg' onError=\"this.onerror=null;this.src='/assets/img/usr/sample.png';\"><p style = 'text-align:left;'>{$row['name']}&nbsp;&nbsp;<span style='color:#62a8ea;background-color:#f3f3f3;padding:10px;padding-left:30px;padding-right:30px;border-radius:200px;float:right;'>{$row['contribution']} </span></p></div>";
		}
		$i -= 1;
	}
	exit($list);
}
elseif ($check == "getfirstm") {
	$result = mysqli_query($con,"SELECT * FROM users ORDER BY contribution DESC");
	$i = 3;
	while ($row = mysqli_fetch_array($result)) {
		if($i == 3){
			$first = "<img class='circle' style ='width:120px;border-radius:100%;position:relative;z-index:-1;' src='/assets/img/usr/{$row['id']}.jpg' onError=\"this.onerror=null;this.src='/assets/img/usr/sample.png';\"><img style='width:35px;margin-left:-40px;margin-top:80px;' src = '/assets/icon/1st.svg'></img><br><br><h5>{$row['name']}</h5><span style='color:#62a8ea;background-color:#f3f3f3;padding:10px;padding-left:30px;padding-right:30px;border-radius:200px;'>{$row['contribution']} contributions</span>";
			break;
		}
		$i -= 1;
	}
	exit($first);
}
elseif ($check == "getsecondm") {
	$result = mysqli_query($con,"SELECT * FROM users ORDER BY contribution DESC");
	$i = 3;
	while ($row = mysqli_fetch_array($result)) {
		if($i == 2){
			$second = "<img class='circle' style ='width:80px;border-radius:100%;position:relative;z-index:-1;' src='/assets/img/usr/{$row['id']}.jpg' onError=\"this.onerror=null;this.src='/assets/img/usr/sample.png';\"><img style='width:35px;margin-left:-40px;margin-top:80px;' src = '/assets/icon/2nd.svg'></img><br><br><h5>{$row['name']}</h5><span style='color:#62a8ea;background-color:#f3f3f3;padding:10px;padding-left:30px;padding-right:30px;border-radius:200px;'>{$row['contribution']}</span>";
			break;
		}
		$i -= 1;
	}
	exit($second);
}
elseif ($check == "getthirdm") {
	$result = mysqli_query($con,"SELECT * FROM users ORDER BY contribution DESC");
	$i = 3;
	while ($row = mysqli_fetch_array($result)) {
		if($i == 1){
			$third = "<img class='circle' style ='width:80px;border-radius:100%;position:relative;z-index:-1;' src='/assets/img/usr/{$row['id']}.jpg' onError=\"this.onerror=null;this.src='/assets/img/usr/sample.png';\"><img style='width:35px;margin-left:-40px;margin-top:80px;' src = '/assets/icon/3rd.svg'></img><br><br><h5>{$row['name']}</h5><span style='color:#62a8ea;background-color:#f3f3f3;padding:10px;padding-left:30px;padding-right:30px;border-radius:200px;'>{$row['contribution']}</span>";
			break;
		}
		$i -= 1;
	}
	exit($third);
}
?>