<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/Formitable_style.css">
<html>
<head>
<script src="include/jquery.min.js"></script>
<script>
 $(function() {
	$('textarea').each(function() {
		$(this).height(0);
		$(this).height($(this).prop('scrollHeight'));
	});
});
</script>
<title><?php echo iconv('Windows-1253', 'UTF-8', '������ ������������'); ?></title>
</head>
<body>
<div id="content">
<?php

// Displays program record as a form (via Formitable), for editing and exporting to HTML

require_once('conf.php');
session_start();
$admin = $_SESSION['admin'];

//include class, create new Formitable, set primary key field name 
include("include/Formitable.class.php");

$myconn = mysql_connect($prDbhost,$prDbusername,$prDbpassword);

mysql_query("SET NAMES 'utf8'", $myconn);
mysql_query("SET CHARACTER SET 'utf8'", $myconn); 

// initialize Formitable
$newForm = new Formitable($myconn,$prDbname,$prTable); 

$newForm->setPrimaryKey("id"); 

// if form has been submitted, call Formitable submit method
if( isset($_POST['submit']) ) 
{
	// if not admin, skip (don't update) the following fields
	if (!$admin)
	{
		//$skipped = array('emails1','schnip','dimo','sch1','sch2');
    $skipped = array('emails1','schnip','dimo','sch1','sch2','emails2','titel','categ','sur1','sur2','sur3');
		$newForm->skipFields($skipped);
	}
	$newForm->submitForm(); 
}

//otherwise continue with form customization 
else { 
	//retrieve a record for update if GET var is set 
	if ( isset($_GET['id']) ) 
			$newForm->getRecord($_GET['id']);
		else{
			die ("Error...(no get var)");
	}
	// check if school or admin, else die
	if (!$admin)
	{
		$email = $newForm->getFieldValue('emails1');
		if (!strcmp($email,$_SESSION['email1']) || !strcmp($email,$_SESSION['email2']))
			{}
		// not a school. Exit...
		else
		{
			$errormsg = iconv('Windows-1253', 'UTF-8', '<h2>�����. ��� ����� �������� �� ����� ���� �� ���������...</h2>');
			die ($errormsg);
		}
	}
	
	$title = $newForm->getFieldValue('titel');
	$updated = $newForm->getFieldValue('timestamp');
	echo iconv('Windows-1253','UTF-8',"<h1><i>���������:</i> "). $title . "</h1>";
	  
	// hide fields from users
	$hidden = array('id','timestamp','vev');
	$newForm->hideFields($hidden); 
	
	// force types
	//$newForm->forceType('visits','select');
	//$newForm->forceType('duration','select');
    
    //set custom field labels 
	 $rows = array (
	 'emails1', 'schnip', 'dimo', 'sch1', 'princ1', 'praxi', 'sch2','princ2','emails2',
	 'titel' ,'subti' ,'categ' ,'theme' ,'goal' ,'meth' ,'pedia' ,
	 'dura' ,'m1' ,'m2' ,'m3' ,'m4' ,'m5' ,'visit' ,'for1' , 'for2',
   'synant' , 'arxeio','act' ,'prsnt',
	 'nam1' ,'email1' ,'mob1' ,'eid1' ,'his1' ,'qua1' ,
	 'nam2' ,'email2' ,'mob2' ,'eid2' ,'his2' ,'qua2' ,
	 'nam3' ,'email3' ,'mob3' ,'eid3' ,'his3' ,'qua3' ,
	 'Nr' ,'cha' ,'grade' ,'notes','chk','vev'
	 );
	 
	 $labels = array ('email ��������','����� �������','�����','������� ������','������������� ���������/������- ������������/���','����� ��������', '������������� ������� ������', '�/����/����� ��������������', 'email ��������������',
	 '������ ������������','���������-���������','��������� ������������','�����������','������������ ������','����������� ����������-�����������','����� �������� �� �� ����������� ������� ��� ����������� ��������� ������������',
	 '�������� ������������ (�����)','1�� �����','2�� �����','3�� �����','4�� �����','5�� �����','������� ����������','1�� ������ ���������' ,	'2�� ������ ���������',
   '�����, ��� ��� ����� ���������� ������', '������ ������� �������� �������������� ��� �������','�������','������� ����������� ��� ������������ ��� ������ ��������� ����������� 2016',
	 '������������� 1�� ���/���','email 1�� ���/���','������ �������� 1�� ���/���','���������� 1�� ���/���','��������� ������������ 1�� ���/��� ��� ��������','���������� 1�� ���/���',
	 '������������� 2�� ���/���','email 2�� ���/���','������ �������� 2�� ���/���','���������� 2�� ���/���','��������� ������������ 2�� ���/��� ��� ��������','���������� 2�� ���/���',
	 '������������� 3�� ���/���','email 3�� ���/���','������ �������� 3�� ���/���','���������� 3�� ���/���','��������� ������������ 3�� ���/��� ��� ��������','���������� 3�� ���/���',
	 '������� �������','�������������� ������','������','����� ������������-������������',
	 '����������� ��� �/� �/����/���� � ������������/�� ��� �������� ������� ������ �� ����� ������ ������������ �������� ��������������, ����� ����������� ����� ���������� ��� ��������� ��� �� �������� ��� ����������� ��� ����� ������ ������������ ����� �����.', '�/�  �/����/���� � ������������/�� ��������� ��� �� ������������ ������ ������������ �������� �������������� ������������ �������� ��� �� ������������ ��� ������������ ����� ��������� ��� ������� ������.'
   );
	// convert greek labels to utf8
	array_walk(
		$labels,
		function (&$entry) {
			$entry = iconv('Windows-1253', 'UTF-8', $entry);
		}
	);
	 
	 $newForm->labelFields( $rows, $labels ); 

	//encryption (not working)
	//$key = "$Ftg/%)poa";
	//$newForm->setEncryptionKey($key);
	
	//output form 
	$newForm->printForm(array(),array(iconv('Windows-1253', 'UTF-8', '�������'),'','Reset Form',false,true)); 
	
	// display print button
	$printText = iconv('Windows-1253', 'UTF-8', '��������');
	echo "<input type=\"button\" onclick=\"window.open('exp.php?id=".$newForm->getFieldValue('id')."');\" value=\"".$printText."\" />";

	$shm = '<h4>����������:<br>1. ��� ��� ���������� ������������ ������� ������� \'�������\'.<br>2. �� �����: ������� ������, ������ ������������, �����-�������-������ ���/��� �� �������������.<br>��� �� �������� ���� ������������� �� �� ����� �������� ��������������, ���. 2810529318, email: tay@dipe.ira.sch.gr</h4><br>';
	//$shm = '<h4>����������:<br>��� ��� ���������� ������������ ������� ������� \'�������\'.</h4><br>';
	echo iconv('Windows-1253', 'UTF-8', $shm);
	// display record timestamp
	if ($updated>0)
		echo "<small>".iconv('Windows-1253', 'UTF-8', '��������� ��������: ').date('d/m/Y, H:i:s',strtotime($updated))."</small>";
}
?>
<small></small>
</div>
</body>
</html>