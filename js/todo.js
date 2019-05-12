
function createMockDataBase()
{
    var todos = [
        {id: 0, ownerEmail: "testemail@hotmail.com", ownderID: 3, createDate: "2017-01-01 00:00:00", dueDate: "2017-05-03 00:00:00",  message: "Item One", isdone: 0},
        {id: 1, ownerEmail: "testemail@hotmail.com", ownderID: 3, createDate: "2017-05-03 00:00:00", dueDate: "2017-05-27 00:00:00",  message: "Item Two", isdone: 1},
        {id: 2, ownerEmail: "testemail@hotmail.com", ownderID: 3, createDate: "2017-05-03 00:00:00", dueDate: "2017-05-27 00:00:00",  message: "Item Three", isdone: 1},
        {id: 3, ownerEmail: "testemail@hotmail.com", ownderID: 3, createDate: "2017-05-03 00:00:00", dueDate: "2017-05-27 00:00:00",  message: "Item Four", isdone: 0},
        {id: 4, ownerEmail: "testemail@hotmail.com", ownderID: 3, createDate: "2017-05-03 00:00:00", dueDate: "2017-05-27 00:00:00",  message: "Item Five", isdone: 1},
    ]
    return todos;
}

/*
function generateTasks() {
    <php

    // LOGIN
        if (isset($_POST['username'], $_POST['password'])) {

            // Okay, so user has input some text for both fields

            $username = $_POST['username'];
            $password = $_POST['password'];

            // Lets validate their input
            if (valid_credentials($username, $password, $con)) {

                // Credentials validated successfully
                // Start the session

                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";

                header('location: protected.php');

            } else {
                // User doesnt exist
                array_push($errors, "Wrong username/password combination");
            }
        }

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'is218p2');

    // Connect to DB

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME)

    // Check if connection failed
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: ". mysqli_connect_error();
    }

    $sql = "SELECT  todos.createdate, todos.duedate, todos.message, todos.isdone" +
                        "FROM todos WHERE oweneremail="$username" +
                        "INNER JOIN accounts ON accounts.email = todos.owneremail";

    $data = mysqli_query($con, $sql);

?>
*/


}


//Create the database
// data = createMockDataBase();

// Creates a task card
function addTask(task)
{
    // Done or nah?
    var section = (task.isdone ===  1) ? "done" : "inProgress";
    var img = (task.isdone ===  1) ? "check.png" : "flask.png";

    var itemCard = "<div class='card-task' id='" + task.id + "'>" +
        "<div class='card-top'>" +
        "<img class='card-img' src='./images/" + img + "'/>" +
        "<h3 class='' card-header'>" + task.message + "</h3>" +
        "</div>" +
        "<div class='card-middle'>" +
        "<h5 class='card-attribute'>" + task.ownerEmail + "</h5>" +
        "</div>" +
        "</div>";

    $("#" + section).append(itemCard);

    // Buttons
    if (task.isdone === 0)
    {
        // Done
        $(".card-task#" + task.id).append("<button class='button-taskMove' id='toDone' onclick='markDone($(this).parent())'>Done</button>");
        $(".card-task#" + task.id).append("<button class='button-taskMove' id='toDone'>Edit</button>");
        $(".card-task#" + task.id).append("<button class='button-taskMove' id='toDone' onclick='removeTask($(this).parent())'>Rem</button>");
        $(".card-task#" + task.id).append("<button class='button-taskMove' id='toDone'>Add</button>");
    }
    else
    {
        // Not done
        $(".card-task#" + task.id).append("<button class='button-taskMove' id='toDone' onclick='markUnDone($(this).parent())'>Not Done</button>");
        $(".card-task#" + task.id).append("<button class='button-taskMove' id='toDone'>Edit</button>");
        $(".card-task#" + task.id).append("<button class='button-taskMove' id='toDone' onclick='removeTask($(this).parent())'>Rem</button>");
        $(".card-task#" + task.id).append("<button class='button-taskMove' id='toDone'>Add</button>");
    }

}

// Removes a task from the list
function removeTask(taskCard)
{
    var task = getTask(taskCard.attr('id'));
    console.log("Removing task " + task.message);

    // Remove card
    taskCard.remove();
}

function markDone(taskCard)
{
    // Task object
    var task = getTask(taskCard.attr('id'));

    // Change to done
    task.isdone = 1;

    // Remove from current section
    removeTask(taskCard);

    // Re-add
    addTask(task);
}
function markUnDone(taskCard)
{
    // Task object
    var task = getTask(taskCard.attr('id'));

    // Change to done
    task.isdone = 0;

    // Remove from current section
    removeTask(taskCard);

    // Re-add
    addTask(task);
}

function populateBoard()
{
    data.map(function(item)
    {
        // Add this item to the task board
        addTask(item);
    });
    //createTask(data[0]);
}

// Populate the board when the page is ready
$( document ).ready(function() {
    populateBoard();
});

// Returns a task from the tasks by ID
function getTask(taskID)
{
    for (i = 0; i<data.length; i++)
    {
        if (data[i].id == taskID)
        {
            return data[i];
        }
    }
    return -1;
}
