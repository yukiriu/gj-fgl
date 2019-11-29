<?php
if (isset($_SESSION["userID"])) {
    $navItems = '
          <a href="modifyProfile.php" class="hover:text-gray-600 mr-4">' . $_SESSION["userName"] . '</a>
          <span class="mr-4 cursor-default" > | </span>
          <a href="signup.php" class="hover:text-gray-600">Logout</a>
        ';
} else {
    $navItems = '
          <a href="signin.php" class="hover:text-gray-600 mr-4">Sign in</a>
          <span class="mr-4 cursor-default" > | </span>
          <a href="signup.php" class="hover:text-gray-600">Sign up</a>
          ';
}
?>

<div class="w-screen bg-gray-400">
        <div class="flex items-center justify-between text-gray-700 h-32 px-48">
            <div class="hover:text-gray-600 h-20" style="font-size:50px">gj/fgl</div>
            <ul class="flex items-center justify-between">
                <li>
                    <a class="hover:text-gray-600 pl-6">Home</a>
                </li>
                <li>
                    <a class="hover:text-gray-600 pl-6">Photos</a>
                </li>
                <li>
                    <a class="hover:text-gray-600 pl-6">Albums</a>
                </li>
            </ul>
            <div class="flex justify-between items-center w-1/10">
                <?php echo $navItems ?>
            </div>
        </div>
    </div>