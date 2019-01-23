<?php
ini_set('display_errors',1);
$cn = new mysqli("localhost", "root", "1234", "quiz");#variavel q responde pela conexao

if($_POST)
	var_dump($_POST);

	$grade=0;
	if($_POST["q1"]=="are_searching"){
		$grade=$grade+33.33;
	}

	if($_POST["q2"]=="the"){
		$grade=$grade+33.34;
	}

	if($_POST["q3"]=="saw"){
		$grade=$grade+33.33;
	}
    
	$name=$_POST['name'];
	$email=$_POST['email'];
	$date=date(DATE_RFC2822);
    	$phone=$_POST['phone'];
	$score=$grade;
	#extract($_POST); #explode o conteudo de um array e faz aparecer no codigo variaveis cujo nome sao as chaves de tal array
    	$sql="Insert into quiz (name, email, `date`, phone, score) values ('$name', '$email', '$date', '$phone', $score);";

	echo $sql;

	if ($result = $cn->query($sql)) {
   		echo 'The ID is: '.$result->insert_id;
		$id = $result->insert_id;
        } else {
		echo "error";
	}