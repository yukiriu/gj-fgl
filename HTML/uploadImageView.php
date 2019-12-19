<div class="container mx-auto w-auto xl:max-w-xl h-full bg-white rounded-lg shadow overflow-hidden">
    <form class="w-11/12 pr-auto mr-auto" method="post" action="../logic/uploadImage.dom.php?" enctype="multipart/form-data">
    <div class="text-gray-700 text-sm font-semibold ml-4 mt-4">Image</div>
    <input type="hidden" id="albumID" name="albumID" value="<?php echo $_GET["albumID"] ?>">
    <input class="bg-gray-700 text-white text-sm rounded h-full w-full my-2 m-auto pl-2 ml-4 p-1" type="file" name="image" accept="image/*" required /><div class="text-gray-700 text-sm font-semibold ml-4"> Description</div>
        <textarea class="text-sm rounded w-full p-4 m-4 text-gray-800 bg-gray-200 h-64" style="word-break: break-word" name="desc" type="text" placeholder=">:)"></textarea>
        <button class="w-32 bg-gray-800 hover:bg-gray-400 hover:text-gray-800 text-white text-sm py-2 px-4 ml-4 mb-4 rounded h-10" type="submit">
          Upload image +
        </button>
    </form>
</div>