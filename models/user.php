<?php
// Checks if the given user exists in table

require_once "../models/config.php";

function user_exists($email) {
    //$email = mysqli_real_escape_string($email);
    // Insert mysqli query here and test number of rows
    //$total = mysqli_query($con, "SELECT COUNT {'id'} FROM 'accounts' WHERE 'email' == '{$email}'");
    //return (mysqli_result($total, 0) == '1') ? true : false;
}

// Checks if the user credentials are valid
function valid_credentials($email, $password, $con) {
    $email = mysqli_real_escape_string($con, $email);
    //$password = sha1($password);
    $password = $password;

    // FInd this username / password combination

    $query = "SELECT * FROM `accounts` WHERE email='$email' AND password='$password'";
    $results = mysqli_query($con, $query);

    // Returns TRUE if username/password are valid, FALSE otherwise
    return (mysqli_num_rows($results) == 1);
}

// Grab a user's TODO tasks
function getTasks($userID) {
    //$query = "SELECT todos.createdate, todos.duedate, todos.message, todos.isdone FROM todos WHERE oweneremail='$userID' INNER JOIN accounts ON accounts.email = todos.owneremail";
    $query = "SELECT createddate, duedate, message, isdone FROM todos WHERE ownerid='$userID'";

    $result = mysqli_query(getConnection(), $query);

    if (mysqli_num_rows($result) > 0)
    {
        //echo "Rows found for this user: ".(mysqli_num_rows($result));
    }
    else
    {
        //echo "No rows found.";
    }

    // Returns TRUE if username/password are valid, FALSE otherwise
    return $result;
}

function getTask($taskID, $column)
{
    $query = "SELECT title, message, duedate FROM todos WHERE id='$taskID'";
    $result = mysqli_query(getConnection(), $query);
    while ($row = mysqli_fetch_array($result))
    {
        echo $row[$column];
    }
}

function editTaskMessage($taskID, $title, $message, $date, $time)
{
    $newDate = $date." ".$time;
    $query = "UPDATE todos SET title='$title', message='$message', duedate='$newDate' WHERE id='$taskID'";
    mysqli_query(getConnection(), $query);
}

function addTask($username, $ownerID, $taskID, $title, $message, $date, $time)
{
    // current date
    $currentDate = date("Y-m-d").' '.date("h:i:sa");
    $dueDate = $date." ".$time;

    $query = "INSERT INTO todos (id, owneremail, ownerid, createddate, duedate, title, message, isdone) VALUES (default, '$username', $ownerID, '$currentDate', '$dueDate', $title, '$message', 0)";
    mysqli_query(getConnection(), $query);
}