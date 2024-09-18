<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<?php include("includes/footer.php") ?>


<div class="flex lg:flex-row flex-col  items-center lg:items-stretch	">


  <div class=" w-64 lg:w-full flex  flex-col ">

    <?php if (isset($_SESSION['message_type'])) { ?>
      <div
        class=" md:w-8/12 w-auto mx-auto flex p-4 mt-2  mb-1 text-<?= $_SESSION['message_type'] ?>-800 rounded-lg bg-<?= $_SESSION['message_type'] ?>-50 items-center"
        role="alert">
        <?= $_SESSION['message'] ?>
        <button
          type="button"
          class="alert_del ml-auto -mx-1.5 -my-1.5 bg-<?= $_SESSION['message_type'] ?>-50 text-<?= $_SESSION['message_type'] ?>-500 rounded-lg focus:ring-2 focus:ring-<?= $_SESSION['message_type'] ?>-400 p-1.5 hover:bg-<?= $_SESSION['message_type'] ?>-200 inline-flex h-8 w-8"
          data-dismiss-target="#alert-3"
          aria-label="Close">
          <span class="sr-only">Close</span>
          <svg
            aria-hidden="true"
            class="w-5 h-5"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>

      </div>
      <script type="text/javascript">
        var alert_del = document.querySelectorAll(".alert_del")
        alert_del.forEach((x) => {
          x.addEventListener("click", () =>
            x.parentElement.classList.add("hidden"))
        })
      </script>
    <?php session_unset();
    } ?>

    <form action="save_task.php" method="POST" class="my-6 mx-auto max-w-sm   border-solid border-2 rounded-lg border-violet-300 p-5 h-64 w-full ,    ">
      <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Task title</label>
        <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="insert a title" required />
      </div>
      <div class="mb-5">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description </label>
        <input type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="add a description" required />
      </div>
      <div class="flex place-content-center">

        <button type="submit" name="save_task" value="Save task" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
      </div>
    </form>
  </div>




  <div class="w-full rounded-lg  my-4 overflow-x-auto">
    <table class="  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 m-auto sm:rounded-lg">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 shadow-md sm:rounded-lg">
        <tr>
          <th scope="col" class="px-6 py-3">
            Title
          </th>
          <th scope="col" class="px-6 py-3">
            Description
          </th>
          <th scope="col" class="px-6 py-3">
            Created at
          </th>
          <th scope="col" class="px-6 py-3">
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM task";
        $result_tasks = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result_tasks)) { ?>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <?= $row['title'] ?>
            </th>
            <td class="px-6 py-4">
              <?= $row['description'] ?>
            </td>
            <td class="px-6 py-4">
              <?= $row['created_at'] ?>
            </td>
            <td class="px-6 py-4 text-right">
              <a type="button" href="edit_task.php?id=<?php echo $row['id'] ?>" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</a>

              <a type="button" href="delete_task.php?id=<?php echo $row['id'] ?>" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</a>
            </td>

          </tr>

        <?php } ?>


      </tbody>
    </table>
  </div>

</div>