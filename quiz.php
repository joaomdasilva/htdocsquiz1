<?php
ini_set('display_errors',1);
$cn = new mysqli("localhost", "web", "1234", "quiz");#variavel q responde pela conexao

if($_POST){
	#var_dump($_POST);

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
    	$sql="Insert into quiz1 (name, email, `date`, phone, score) values ('$name', '$email', '$date', '$phone', $score);";

	#echo $sql;

	if ($result = $cn->query($sql)) {
        #echo "<pre>";
        #print_r($cn);
   		echo 'The ID is: '.$cn->insert_id;#instead of using $result, use $cn. 
		$id = $cn->insert_id;
        } else {
		echo "error";
	}


}



?>

<html>

<head>

	<title>Quiz</title>

</head>

<body>

	<form method=POST>
        
        <label>
        Name
        
        </label>
        <input name="name" type="text"><br>
        <label>
        Your email
        </label>
        <input name="email" type="text"><br>
        <label>
        Phone Number
        </label>
        <input name="phone" type="text"><br>
		<h1>What is the correct form of the verb in the sentence  below?</h1>
		Scientists __________ for information about how animals communicate.
		<label><input type="radio" name="q1" value="searches"> searches</label>

		<label><input type="radio" name="q1" value="searching"> searching</label>

		<label><input type="radio" name="q1" value="are_searching">are searching</label>




		<h1> It's ...... most expensive hotel in town</h1>

		<label><input type="radio" name="q2" value="a">a</label>

		<label><input type="radio" name="q2" value="the"> the</label>

		<label><input type="radio" name="q2" value="----"> -----</label>
		<br>

		

		<h1>My brother _____ a bear an hour ago.</h1>

		<label><input type="radio" name="q3" value="sees"> sees</label>

		<label><input type="radio" name="q3" value="seen"> seen</label>

		<label><input type="radio" name="q3" value="saw"> saw</label>
		<br>

		
        	<hr>
		<button>Send</button>

	</form>

    
	<div id="results">

		<h1>You Scored:</h1>

		<h1 id="score">
		<?php 
		if($_POST){

			echo "your quiz id is :". $id;
			echo date(DATE_RFC2822)."<br>";
            echo $grade."<br>";
            echo $_POST["name"]."<br>";
            echo $_POST["email"]."<br>";
            echo $_POST["phone"];
		}
            
            
		?>
		</h1>

	</div>

</body>

</html>