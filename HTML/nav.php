<?php
include "../classes/user/user.php";
if (isset($_SESSION["userID"])) {
    $TDG = new UserTDG();
    $res = $TDG->get_by_id($_SESSION["userID"]);
    $imagepath = $res['image'];
    $navItems1 = '<div class="hover:text-gray-600 h-20" style="font-size:50px">gj/fgl</div>
    <ul class="flex items-center justify-between">
        <li>
            <a href = "home.php" class="hover:text-gray-600 pl-6">Home</a>
        </li>
        <li>
            <a href = "albums.php" class="hover:text-gray-600 pl-6">Albums</a>
        </li>
        <li>
            <a href = "users.php" class="hover:text-gray-600 pl-6">Users</a>
        </li>
        <li>
            <form class="form-inline my-2 my-lg-0" action="searchresults.php">
                    <input class="form-control mr-sm-2 ml-4 pl-2 rounded-l w-32" type="text" name="search">
                    <button class="btn btn-success hover:text-gray-700 hover:bg-gray-200 my-2 my-sm-0 bg-gray-700 text-gray-200 rounded-r px-1 -ml-1" type="submit">Search</button>
            </form>
        </li>
    </ul>
    ';
    $navItems2 = '
                
          <div class="relative m-auto w-6 h-6 rounded-full bg-gray-100 overflow-hidden" style="display: flex; justify-content: center; align-items: center">
            <img src="'. "../" . $imagepath .'" class="bg-cover object-contain" style="flex-shrink: 0; min-width: 100%; min-height: 100%">
          </div>
          <a href="modify.php" class="hover:text-gray-600 ml-2">' . $_SESSION["userName"] . '</a>
          <span class="mx-4 cursor-default" > | </span>
          <a href="../logic/logout.dom.php" class="hover:text-gray-600">Logout</a>
        ';
} else {
    $navItems1='<div class="hover:text-gray-600 h-20" style="font-size:50px">gj/fgl</div>
    <ul class="flex items-center justify-between">
        <li>
            <a href = "home.php" class="hover:text-gray-600 pl-6">Home</a>
        </li>
        <li>
            <a href = "users.php" class="hover:text-gray-600 pl-6">Users</a>
        </li>
        <li>
            <form class="form-inline my-2 my-lg-0" action="searchresults.php">
                    <input class="form-control mr-sm-2 ml-4 pl-2 rounded-l w-32" type="text" name="search">
                    <button class="btn btn-success hover:text-gray-700 hover:bg-gray-200 my-2 my-sm-0 bg-gray-700 text-gray-200 rounded-r px-1 -ml-1" type="submit">Search</button>
            </form>
        </li>
    </ul>';
    $navItems2 = '
   
          <a href="signin.php" class="hover:text-gray-600 mr-4">Sign in</a>
          <span class="mr-4 cursor-default" > | </span>
          <a href="signup.php" class="hover:text-gray-600">Sign up</a>
          ';
}
?>

<div class="w-full bg-gray-400">
        <div class="flex items-center justify-between text-gray-700 h-32 px-48">
        <?php echo $navItems1 ?>
            <div class="flex justify-between items-center w-1/10">
                <?php echo $navItems2 ?>
            </div>
        </div>
    </div>