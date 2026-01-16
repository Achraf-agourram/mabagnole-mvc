<?php 

if(isset($_POST['editArticle'])) {
    if($_POST['tags']) {
        $tags = explode(" ", str_replace("#", "", $_POST['tags']));
        foreach($tags as $tag) if(!Tag::existTag($tag)) Tag::addTag($tag);
    }
    else $tags = null;

    if($articleToEdit->editArticle($_POST['title'], $tags, $_FILES['image']['name'], $_POST['paragraph'])) {
        header("location: explore.php");
        exit;
    }else echo "something went wrong";
    
}
?>

<div id="article-modal" class="flex items-center justify-center">
    <div class="max-w-2xl w-full bg-white p-10 rounded-2xl shadow-2xl relative">
      <a href="explore.php" class="absolute top-4 right-6 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</a>

      <div class="mb-4">
        <h2 class="text-3xl font-extrabold text-gray-900">Edit the Article</h2>
      </div>
      
      <form class="space-y-4" enctype="multipart/form-data" method="post">
        <div>
          <label class="block font-bold text-gray-700 mb-2">title</label>
          <input name="title" value="<?= $articleToEdit->articleTitle ?>" type="text" class="w-full p-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#197fe6] focus:border-transparent outline-none transition">
        </div>
          
        <div>
          <label class="block font-bold text-gray-700 mb-2">Tags</label>
          <input name="tags" value="<?php foreach($articleToEdit->tags as $tag) echo '#'.$tag->tagTitle.' '; ?>" type="text" class="w-full p-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#197fe6] focus:border-transparent outline-none transition" placeholder="Separate with commas (e.g., travel, summer, food)">
        </div>
        <div>
          <label class="block font-bold text-gray-700 mb-2">Topics</label>
          <select name="theme" value="<?= $articleToEdit->articleTheme ?>" class="w-full p-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#197fe6] focus:border-transparent outline-none transition">
          <?php
            foreach(Theme::getThemes() as $theme) {
              echo "<option value='{$theme->themeId}'>{$theme->themeTitle}</option>";
            }
          ?>  
          
          </select>
        </div>

        <div>
          <label class="block font-bold text-gray-700 mb-2">Body Content</label>
          <textarea name="paragraph" class="w-full p-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#197fe6] focus:border-transparent outline-none transition" rows="6"><?= $articleToEdit->articleParagraph ?></textarea>
        </div>

        <div>
          <label class="block font-bold text-gray-700 mb-2">Media (Optional)</label>
          <div class="border-2 border-dashed border-gray-300 p-8 text-center rounded-xl hover:border-[#197fe6] hover:bg-blue-50 cursor-pointer transition flex flex-col items-center group">
            <span class="text-3xl mb-2 group-hover:scale-110 transition-transform">📁</span>
            <p class="text-gray-500">Click to upload <strong>Images</strong></p>
            <input type="file" name="image" accept="image/*" multiple>
          </div>
        </div>

        <button name="editArticle" class="w-full bg-[#197fe6] text-white py-4 rounded-xl font-bold text-lg shadow-lg hover:bg-blue-700 active:transform active:scale-95 transition-all">
            Publish Now
          </button>
      </form>
    </div>
</div>