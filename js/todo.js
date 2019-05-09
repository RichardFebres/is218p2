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

//Create the database
data = createMockDataBase();

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