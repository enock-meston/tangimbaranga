<?php session_start();
include('connector.php');
date_default_timezone_set("Africa/Kigali");

if (isset($_POST['userlogin'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($connect,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
	$validation = mysqli_num_rows($query);

	if ($validation > 0) {

		$query = mysqli_query($connect,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
		$row = mysqli_fetch_array($query);

		$_SESSION['smc_user'] = $row['id'];
		echo"<script>window.location='panel/';</script>";
	} else {
		$query = mysqli_query($connect,"SELECT * FROM citizen WHERE phone='$username' AND password='$password'");
		$validation = mysqli_num_rows($query);

		if ($validation > 0) {

			$query = mysqli_query($connect,"SELECT * FROM citizen WHERE phone='$username' AND password='$password'");
			$row = mysqli_fetch_array($query);

			$_SESSION['smc_user'] = $row['id'];
			echo"<script>window.location='user/';</script>";
		} else {
			echo"<script>window.location='index.php?invalidcredentials';</script>";
		}
	}
}

if (isset($_POST['addNewUser'])) {
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$password = $_POST['password'];

	mysqli_query($connect,"INSERT INTO citizen(name, phone, gender, age, address, password) VALUES ('$name', '$phone', '$gender', '$age', '$address', '$password')");
	echo"<script>window.location='panel/users?data=success';</script>";
}

if (isset($_POST['editUser'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$password = $_POST['password'];

	
	$query = mysqli_query($connect,"UPDATE citizen SET name = '$name', gender = '$gender', phone = '$phone', age = '$age', address = '$address' WHERE id = '$id'");
	echo"<script>window.location='panel/users?data=edited';</script>";
}

if (isset($_GET['deleteUser'])) {
	$deleteUser = $_GET['deleteUser'];
	
	$query = mysqli_query($connect,"UPDATE citizen SET deleted = 1 WHERE id = '$deleteUser'");
	echo"<script>window.location='panel/users?data=deleted';</script>";
}

if (isset($_GET['approveRequest'])) {
	$approveRequest = $_GET['approveRequest'];
	
	$query = mysqli_query($connect,"UPDATE requests SET status = 1 WHERE id = '$approveRequest'");
	echo"<script>window.location='panel/requests?data=deleted';</script>";
}

if (isset($_GET['rejectRequest'])) {
	$rejectRequest = $_GET['rejectRequest'];
	
	$query = mysqli_query($connect,"UPDATE requests SET status = 2 WHERE id = '$rejectRequest'");
	echo"<script>window.location='panel/requests?data=deleted';</script>";
}


if (isset($_POST['addNewStudent'])) {
	$cardid = $_POST['cardid'];
	$fullname = $_POST['fullname'];
	$class = $_POST['class'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$password = md5($password);

	$queryv = mysqli_query($connect,"SELECT * FROM students WHERE cardid='$cardid'");
	$validation = mysqli_num_rows($queryv);
	if ($validation == 0) {
		mysqli_query($connect,"INSERT INTO students(cardid, fullname, class, phone, email, password) VALUES ('$cardid', '$fullname', '$class', '$phone', '$email', '$password')");
		echo"<script>window.location='panel/students?data=success';</script>";
	}else{
		echo"<script>window.location='panel/addnewstudent?cardidused';</script>";
	}
}

if (isset($_POST['editStudent'])) {
	$id = $_POST['id'];
	$cardid = $_POST['cardid'];
	$fullname = $_POST['fullname'];
	$class = $_POST['class'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	
	$query = mysqli_query($connect,"UPDATE students SET cardid = '$cardid', fullname = '$fullname', class = '$class', email = '$email', phone = '$phone' WHERE id = '$id'");
	echo"<script>window.location='panel/students?data=edited';</script>";
}

if (isset($_GET['deleteStudent'])) {
	$deleteStudent = $_GET['deleteStudent'];
	
	$query = mysqli_query($connect,"UPDATE students SET deleted = 1 WHERE id = '$deleteStudent'");
	echo"<script>window.location='panel/students?data=deleted';</script>";
}

if (isset($_GET['blockCard'])) {
	$blockCard = $_GET['blockCard'];
	
	$query = mysqli_query($connect,"UPDATE students SET blocked = 1 WHERE id = '$blockCard'");
	echo"<script>window.location='student/profile?data=deleted';</script>";
}

if (isset($_GET['unblockCard'])) {
	$unblockCard = $_GET['unblockCard'];
	
	$query = mysqli_query($connect,"UPDATE students SET blocked = 0 WHERE id = '$unblockCard'");
	echo"<script>window.location='student/profile?data=deleted';</script>";
}

if (isset($_POST['addMyNewRequest'])) {
	$item = $_POST['item'];
	$room = $_POST['room'];
	$description = $_POST['description'];
	$cid = $_SESSION['smc_user'];
	$rdatetime = time();

	mysqli_query($connect,"INSERT INTO requests(item, description, cid, room, rdatetime) VALUES ('$item', '$description', '$cid', '$room', '$rdatetime')");
	echo"<script>window.location='user/request?data=success';</script>";
}

if (isset($_POST['addNewRecord'])) {
	$cardid = $_POST['cardid'];
	$amount = 500;
	
	$queryv = mysqli_query($connect,"SELECT * FROM students WHERE cardid='$cardid'");
	$validation = mysqli_num_rows($queryv);
	if ($validation == 0) {
		echo"<script>window.location='panel/addnewrecord?invalidcard';</script>";
	}else{
		$querys = mysqli_query($connect,"SELECT * FROM students WHERE cardid='$cardid'");
		$datas = mysqli_fetch_array($querys);
		$sid = $datas['id'];
		$ob = $datas['balance'];
		$nb = $datas['balance'] - $amount;
		$trdatetime = time();

		if($ob < 500){
			echo"<script>window.location='panel/addnewrecord?insufficientbalance&balance=".$ob."';</script>";
		}elseif($datas['blocked'] == 1){
			echo"<script>window.location='panel/addnewrecord?blockedcard';</script>";
			$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.mista.io/sms',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array('to' => "+25".$datas['phone'],'from' => 'SMS 250','unicode' => '0','sms' => "Hello ".$datas['fullname']."! Some one tried to use your blocked card!",'action' => 'send-sms'),
		  CURLOPT_HTTPHEADER => array(
		    'x-api-key: a02c7aaa-48a7-974d-901d-d6476d221271-152d9ab3'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		}else{
			mysqli_query($connect,"INSERT INTO records(sid, ob, amount, nb, trdatetime) VALUES ('$sid', '$ob', '$amount', '$nb', '$trdatetime')");
			mysqli_query($connect,"UPDATE students SET balance = '$nb' WHERE id = '$sid'");
			echo"<script>window.location='panel/records?data=success';</script>";
		}
	}
}

if (isset($_POST['addMyNewRecharge'])) {
	$sid = $_SESSION['smc_user'];
	$amount = $_POST['amount'];

	$query = mysqli_query($connect, "SELECT * FROM students WHERE id = '$sid'");
  $student_data = mysqli_fetch_array($query);

	$cname = $student_data['fullname'];
  $cphone = $student_data['phone'];

//MoMo Pay

		$url = "https://pay.esicia.rw/";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "Authorization: Basic ZXhhbWlyYTo3VG50OGc=",
		   "Content-Type: application/json",
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		$paycode = rand(1000, 9999);
		$refid = time().$paycode;


		$data = <<<DATA
{
  "msisdn":"$cphone","details":"Subscription","refid":"$refid","amount":$amount,"currency":"RWF","email":"melchiroger@gmail.com","cname":"$cname","cnumber":"$cphone","pmethod":"momo","retailerid":"30","returl":"https://selvoger.com/smartmealcard/callback.php","redirecturl":"https://selvoger.com","bankid":"63510"
}
DATA;

		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);

	$_SESSION['activePaymentRef'] = $refid;
	$query = mysqli_query($connect,"INSERT INTO payments(sid, amount, refId) VALUES('$sid', '$amount', '$refid')");

	echo"<script>window.location='student/paymentValidation?data=paid';</script>";
}

if (isset($_GET['addNewCardIdData'])) {
  $cardid = $_GET['addNewCardIdData'];

  mysqli_query($connect, "INSERT INTO recents (cardId) VALUES('$cardid')");
  echo "Success!";
}
?>