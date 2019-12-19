<?php
$TDG = new UserTDG();
$res = $TDG->get_by_id($_SESSION["userID"]);

$id = $res['userId'];
$email = $res['email'];
$username = $res['username'];
$imagepath = $res['image'];
$info ='';

if(!empty($_GET["info"])){
    $info = '
    <div class="bg-gray-400 w-64 text-center mx-auto mb-6 -mt-12 rounded">' .$_GET["info"]. '</div>
    ';
}

echo $info;
?>

<div class="container max-w-md mx-auto xl:max-w-3xl h-full flex bg-white rounded-lg shadow overflow-hidden">
  <div class="xl:block xl:w-1/2 h-100 bg-gray-400 flex items-center justify-center">
    <div class="relative m-auto mt-32 w-64 h-64 rounded-full bg-gray-100 overflow-hidden" style="display: flex; justify-content: center; align-items: center">
      <img src="<?php echo "../" . $imagepath ?>" class="bg-cover object-contain" style="flex-shrink: 0; min-width: 100%; min-height: 100%">
    </div>
    <div class="relative m-auto mt-20 w-64">
      <form method="post" action="../logic/uploadprofilepicture.dom.php" enctype="multipart/form-data">
        <input class="bg-gray-700 text-white text-sm rounded-t h-full w-full m-auto pl- p-1" type="file" name="image" accept="image/*" required />
        <button class="bg-gray-800 hover:bg-gray-200 hover:text-gray-800 text-white text-sm rounded-b h-full w-full m-auto p-1" type="submit">
          Upload
        </button>
      </form>
    </div>
  </div>
  <div class="w-full xl:w-1/2 p-8">
    <form method="post" action="../logic/modifyinfo.dom.php">
      <h1 class=" text-2xl font-bold">Modify your info</h1>
      <div class="mb-4 mt-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2">
          Email
        </label>
        <input class="text-sm appearance-none rounded w-full py-2 px-3 text-gray-700 bg-gray-200 leading-tight h-10" name="email" type="text" placeholder="<?php echo $email ?>" />
      </div>
      <div class="mb-4 mt-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2">
          Username
        </label>
        <input class="text-sm appearance-none rounded w-full py-2 px-3 text-gray-700 bg-gray-200 leading-tight h-10" name="username" type="text" placeholder="<?php echo $username ?>" />
      </div>
      <div class="flex w-full mt-8">
        <button class="w-full bg-gray-800 hover:bg-gray-400 hover:text-gray-800 text-white text-sm py-2 px-4 rounded h-10" type="submit">
          Modify
        </button>
      </div>
    </form>
    <form method="post" action="../logic/modifypw.dom.php">
      <div class="mb-6 mt-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2">
          New Password
        </label>
        <input class="text-sm bg-gray-200 appearance-none rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:shadow-outline h-10" name="newPassword" type="password" placeholder="Your password" />
      </div>
      <div class="mb-6 mt-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2">
          New Password Validation
        </label>
        <input class="text-sm bg-gray-200 appearance-none rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:shadow-outline h-10" name="newPasswordValidation" type="password" placeholder="Your password" />
      </div>
      <div class="mb-6 mt-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2">
          Current Password
        </label>
        <input class="text-sm bg-gray-200 appearance-none rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:shadow-outline h-10" name="currentPassword" type="password" placeholder="Your password" />
      </div>
      <div class="flex w-full mt-8">
        <button class="w-full bg-gray-800 hover:bg-gray-400 hover:text-gray-800 text-white text-sm py-2 px-4 rounded h-10" type="submit">
          Modify
        </button>
      </div>
    </form>
  </div>
</div>

