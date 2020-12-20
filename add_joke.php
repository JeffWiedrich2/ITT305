

<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!$_SESSION['username'])
{
	echo "Only logged in user can access this page. Click <a href = 'login_form.php'> here </a> to login <br>";
	exit;
}


include "db_conn.php";

$new_joke_question = $_GET["newjoke"];
$new_joke_answer = $_GET["jokeanswer"];

$new_joke_question = addslashes($new_joke_question);
$new_joke_answer = addslashes($new_joke_answer);
$userid = $_SESSION['userid'];

echo $new_joke_answer . "and" . $new_joke_question;


// echo"<h2>Show all jokes with the word $keywordfromform</h2>";
$sql = "INSERT INTO jokes_table (JokeID, Joke_question, Joke_answer, users_id1) VALUES (NULL, '$new_joke_question', '$new_joke_answer', '$userid')"; 
$result = $mysqli->query($sql);

include "search_all_jokes.php";


?>

<a href = 'index.php'>  Return to main </a>
