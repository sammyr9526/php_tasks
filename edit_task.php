<?php
include('db.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];

  $query = "UPDATE task set title = '$title', description ='$description' WHERE id = $id";

  mysqli_query($conn, $query);


  $_SESSION['message'] = "Task updated succesfully";
  $_SESSION['message_type'] = "yellow";

  header("Location: index.php");
}


?>

<?php include("includes/header.php") ?>

<div class=" w-64 lg:w-full flex  flex-col ">

  <form action="edit_task.php?id=<?php echo $_GET['id'] ?>" method="POST" class="my-6 mx-auto max-w-sm   border-solid border-2 rounded-lg border-violet-300 p-5 h-64 w-full ,    ">
    <div class="mb-5">
      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Task title</label>
      <input type="text" id="title" name="title" value="<?php echo $title ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="insert a title" required />
    </div>
    <div class="mb-5">
      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description </label>
      <input type="text" id="description" name="description" value="<?php echo $description ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="add a description" required />
    </div>
    <div class="flex place-content-center">

      <button name="update" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Update</button>
    </div>
  </form>
</div>



<?php include("includes/footer.php") ?>