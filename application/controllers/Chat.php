<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->Common_model->checkLogin();
		
	}
	public function index(){
	
	
		$_SESSION['user_id']=$_SESSION['profile_data'][0]['custID'];
		if(!empty($_GET['action'])){
		if ($_GET['action'] == "chatheartbeat") {$this->chatHeartbeat(); } 
		if ($_GET['action'] == "sendchat") { $this->sendChat(); } 
		if ($_GET['action'] == "closechat") { $this->closeChat(); } 
		if ($_GET['action'] == "startchatsession") { $this->startChatSession(); } 
		if ($_GET['action'] == "chatname") { $this->chatName(); } 
		if (!isset($_SESSION['chatHistory'])) {
			$_SESSION['chatHistory'] = array();	
		}
		if (!isset($_SESSION['openChatBoxes'])) {
			$_SESSION['openChatBoxes'] = array();	
	}
	}
	else{
	redirect('user/'.$this->session->userdata['profile_data'][0]['custName'],'refresh');
	}
	}
	function chatHeartbeat() {
	
	$sql = "select personaldata.perdataFirstName,chat.from,chat.message,chat.to,chat.id,chat.sent,chat.recd from chat,personaldata where (chat.to = '".$_SESSION['user_id']."' AND recd = 0) and chat.from=personaldata.custID order by id ASC";
	
	$query = $this->db->query($sql)->result_array();
	$items = '';
	$chatBoxes = array();
	foreach($query as $chat) {

		if (!isset($_SESSION['openChatBoxes'][$chat['from']]) && isset($_SESSION['chatHistory'][$chat['from']])) {
			$items = $_SESSION['chatHistory'][$chat['from']];
		}

		$chat['message'] = $chat['message'];

		$items .= <<<EOD
					   {
			"s": "0",
			"u": "{$chat['perdataFirstName']}",
			"f": "{$chat['from']}",
			"m": "{$chat['message']}"
	   },
EOD;

	if (!isset($_SESSION['chatHistory'][$chat['from']])) {
		$_SESSION['chatHistory'][$chat['from']] = '';
	}

	$_SESSION['chatHistory'][$chat['from']] .= <<<EOD
						   {
			"s": "0",
			"u": "{$chat['perdataFirstName']}",
			"f": "{$chat['from']}",
			"m": "{$chat['message']}"
	   },
EOD;
		
		unset($_SESSION['tsChatBoxes'][$chat['from']]);
		$_SESSION['openChatBoxes'][$chat['from']] = $chat['sent'];
	}

	if (!empty($_SESSION['openChatBoxes'])) {
	foreach ($_SESSION['openChatBoxes'] as $chatbox => $time) {
		if (!isset($_SESSION['tsChatBoxes'][$chatbox])) {
			$now = time()-strtotime($time);
			$time = date('g:iA M dS', strtotime($time));

			$message = "Sent at $time";
			if ($now > 180) {
				$items .= <<<EOD
{
"s": "2",
"f": "$chatbox",
"m": "{$message}"
},
EOD;

	if (!isset($_SESSION['chatHistory'][$chatbox])) {
		$_SESSION['chatHistory'][$chatbox] = '';
	}

	$_SESSION['chatHistory'][$chatbox] .= <<<EOD
		{
"s": "2",
"f": "$chatbox",
"m": "{$message}"
},
EOD;
			$_SESSION['tsChatBoxes'][$chatbox] = 1;
		}
		}
	}
}

	$sql = "update chat set recd = 1 where chat.to = '".$_SESSION['user_id']."' and recd = 0";
	$query = $this->db->query($sql);

	if ($items != '') {
		$items = substr($items, 0, -1);
	}
header('Content-type: application/json');

?>
{
		"items": [
			<?php echo $items;?>
        ]
}

<?php
			exit(0);
}

function chatBoxSession($chatbox) {
	
	$items = '';
	
	if (isset($_SESSION['chatHistory'][$chatbox])) {
		$items = $_SESSION['chatHistory'][$chatbox];
	}

	return $items;
}

function startChatSession() {
	$items = '';
	if (!empty($_SESSION['openChatBoxes'])) {
		foreach ($_SESSION['openChatBoxes'] as $chatbox => $void) {
			$items .= $this->chatBoxSession($chatbox);
		}
	}


	if ($items != '') {
		$items = substr($items, 0, -1);
	}


/*
$suser=$_SESSION['user_id'];
$sc=mysql_query("select _user from dsb_user_profiles where _user='$su'");
while($row_sc=mysql_fetch_array($sc))
{
$_SESSION['current_chat__user']=$row_sc['_user'];
}*/
?>
{
		"_user": "<?php echo $_SESSION['user_id'];?>",
		"items": [
			<?php echo $items;
			?>
        ]
}

<?php
	exit(0);
	
}

function chatName() {
	$con=mysqli_connect("localhost","mavrfview","102238066","mavrfview");
	$un = '';
	
$su=$this->input->get('usw');
$sc2=mysqli_query($con,"select perdataFirstName from personaldata where custID='$su' limit 1");
while($row_sc2=mysqli_fetch_array($sc2))
{
$un=$row_sc2["perdataFirstName"];
}
?>
{
		"unm": ["<?php echo '<a href='.base_url().'basicprofile?uid='.$su.'>'.$un.'</a>';?>"]
		
}

<?php


	exit(0);
}



function sendChat() {
	$con=mysqli_connect("localhost","mavrfview","102238066","mavrfview");
	$from = $_SESSION['user_id'];
	$to = $this->input->post('to');
	$message =trim($this->input->post('message'));
	$sql = "select personaldata.perdataFirstName from personaldata where personaldata.custID='$from' limit 1";
	$uname = mysqli_query($con,$sql);
	$from_user='';
	while ($un = mysqli_fetch_array($uname)) {
	$from_user=$un['perdataFirstName'];
	}
	 
	$_SESSION['openChatBoxes'][$_POST['to']] = date('Y-m-d H:i:s', time());
	
	$messagesan = $message;

	if (!isset($_SESSION['chatHistory'][$_POST['to']])) {
		$_SESSION['chatHistory'][$_POST['to']] = '';
	}

	$_SESSION['chatHistory'][$_POST['to']] .= <<<EOD
					   {
			"s": "1",
			"u": "{$from_user}",
			"f": "{$to}",
			"m": "{$messagesan}"
	   },
EOD;


	unset($_SESSION['tsChatBoxes'][$_POST['to']]);

	$sql = "insert into chat (chat.from,chat.to,message,sent) values ('".$from."', '".$to."','".$message."',NOW())";
	$query = mysqli_query($con,$sql);
	echo "1";
	exit(0);
}

function closeChat() {

	unset($_SESSION['openChatBoxes'][$_POST['chatbox']]);
	
	echo "1";
	exit(0);
}


function sanitize($text) {
	$text = htmlspecialchars($text, ENT_QUOTES);
	$text = str_replace("\n\r","\n",$text);
	$text = str_replace("\r\n","\n",$text);
	$text = str_replace("\n","<br>",$text);
	return $text;
}
}