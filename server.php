//pallavi
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
	if (isset($_GET["person"]))
  {
    // AJAX form submission
    $person = json_decode($_GET["person"]);

    $result = json_encode(array(
      "receivedFirstName" => $person->firstName,
      "receivedLastName" => $person->lastName));
  }
  else
  {
    $result = "INVALID REQUEST DATA";
  }

  echo $result;
}
else
{
	echo $result="Method is not POST";
}

?>