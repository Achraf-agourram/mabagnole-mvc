<?php
require_once __DIR__ . '/../../autoload.php';

if(!isset($_SESSION['loggedAccount'])) exit;

if(isset($_POST['addArticle'])) {
  if($_POST['tags']) {
    $tags = explode(" ", str_replace("#", "", $_POST['tags']));
    foreach($tags as $tag) if(!Tag::existTag($tag)) Tag::addTag($tag);
  }
  else $tags = null;

  if(Article::addArticle($_POST['title'], $_FILES['image']['name'], $tags, $_POST['paragraph'], $_POST['theme'], $_SESSION['loggedAccount'])) echo "Article added successfully";
  else echo "Adding article failed, please try again";
}


if(isset($_GET['getArticlesOnTopic'])) $articles = Article::getArticlesOnTheme($_GET['getArticlesOnTopic']);
else if(isset($_GET['search'])) $articles = Article::searchArticle("%{$_GET['titleToSearch']}%");
else $articles = Article::getAllArticles();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 relative text-gray-800">
  <nav class="bg-[#197fe6] p-4 text-white flex justify-between items-center shadow-lg">
    <h1 class="text-2xl font-bold italic">MyBlog</h1>
    <div class="space-x-6">
      <a href="#">Home</a>
      <button id="newArticleBtn" class="bg-white text-[#197fe6] px-4 py-2 rounded-full font-semibold">+ Publish</button>
    </div>
  </nav>

  <header class="bg-white py-12 border-b border-gray-200">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold mb-6">What would you like to learn today?</h2>
      <form class="max-w-xl mx-auto flex gap-2" method="GET">
        <input name="titleToSearch" type="text" placeholder="Search by title..." class="flex-1 p-3 border-2 border-[#197fe6] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200">
        <button name="search" class="bg-[#197fe6] text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-bold">Search</button>
      </form>
    </div>
  </header>

  <section class="container mx-auto px-4 py-8">
    <form class="flex flex-wrap gap-3 justify-center mb-10" method="GET">
      <button class="px-4 py-2 bg-[#197fe6] text-white rounded-full">All Topics</button>
      <?php
        foreach(Theme::getThemes() as $topic) echo "<button name='getArticlesOnTopic' value='{$topic->themeId}' class='px-4 py-2 border border-[#197fe6] text-[#197fe6] rounded-full hover:bg-blue-50'>{$topic->themeTitle}</button>";
      ?>
      
    </form>
    
    <form class="grid md:grid-cols-3 gap-8" method="GET">
      <?php
        foreach($articles as $article) {
          echo "
            <div class='bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-xl transition'>
              <div class='h-48 bg-gray-200 flex items-center justify-center text-gray-400 font-bold uppercase tracking-widest'><img src='images/{$article->articleImage}'></div> 
              <div class='p-5'>
                <div class='flex justify-between items-start mb-2'>
                  <span class='text-xs font-bold text-[#197fe6] uppercase tracking-wide'>" .Theme::getThemeById($article->idTheme)->themeTitle. "</span>
                  <!--button class='text-gray-300 hover:text-red-500 transition text-xl'>❤️</button-->
                </div>
                <h3 class='text-xl font-bold mb-2'>{$article->articleTitle}</h3>
                <p class='text-gray-600 text-sm mb-4'>" .substr($article->articleParagraph, 0, 50). '...' . "</p>
                <div class='flex gap-2'>
          ";

          foreach($article->tags as $tag) echo "
                  <span class='text-[10px] bg-blue-50 text-[#197fe6] px-2 py-1 rounded font-bold border border-blue-100'>#{$tag->tagTitle}</span>
            ";
          echo "
                </div>
                <button name='showArticle' value='{$article->articleId}' class='mt-2 px-4 py-2 bg-[#197fe6] text-white rounded-full'>learn more</button>
              </div>
            </div>
          ";
        }
          ?>
                
      </form>

    <!--div class="flex flex-col md:flex-row justify-between items-center mt-12 gap-6 border-t pt-8">
      <div class="flex items-center gap-3">
        <span class="text-sm text-gray-600">Show:</span>
        <select class="border p-2 rounded text-sm outline-[#197fe6]">
          <option>5 per page</option>
          <option selected>10 per page</option>
          <option>15 per page</option>
        </select>
      </div>
      <div class="flex gap-2">
        <button class="px-4 py-2 border rounded hover:bg-gray-100 disabled:opacity-50">Previous</button>
        <button class="px-4 py-2 bg-[#197fe6] text-white rounded font-bold">1</button>
        <button class="px-4 py-2 border rounded hover:bg-gray-100">Next</button>
      </div>
    </div-->
  </section>

  <div id="article-modal" class="absolute hidden flex inset-0 bg-gray-600 bg-opacity-75 items-center justify-center z-50">
    <div class="max-w-2xl w-full bg-white p-10 rounded-2xl shadow-2xl border-t-8 border-[#197fe6] relative">
      <button class="absolute top-4 right-6 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>

      <div class="mb-4">
        <h2 class="text-3xl font-extrabold text-gray-900">Create New Article</h2>
        <p class="text-gray-500 mt-2">Share your thoughts and media with the community.</p>
      </div>
      
      <form class="space-y-4" enctype="multipart/form-data" method="post">
        <div>
          <label class="block font-bold text-gray-700 mb-2">Article Title</label>
          <input name="title" type="text" class="w-full p-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#197fe6] focus:border-transparent outline-none transition" placeholder="e.g., My Trip to Tokyo">
        </div>
          
        <div>
          <label class="block font-bold text-gray-700 mb-2">Tags</label>
          <input name="tags" type="text" class="w-full p-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#197fe6] focus:border-transparent outline-none transition" placeholder="Separate with commas (e.g., travel, summer, food)">
        </div>
        <div>
          <label class="block font-bold text-gray-700 mb-2">Topics</label>
          <select name="theme" class="w-full p-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#197fe6] focus:border-transparent outline-none transition">
          <?php
            foreach(Theme::getThemes() as $theme) {
              echo "<option value='{$theme->themeId}'>{$theme->themeTitle}</option>";
            }
          ?>  
          
          </select>
        </div>

        <div>
          <label class="block font-bold text-gray-700 mb-2">Body Content</label>
          <textarea name="paragraph" class="w-full p-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#197fe6] focus:border-transparent outline-none transition" rows="6" placeholder="Tell your story..."></textarea>
        </div>

        <div>
          <label class="block font-bold text-gray-700 mb-2">Media (Optional)</label>
          <div class="border-2 border-dashed border-gray-300 p-8 text-center rounded-xl hover:border-[#197fe6] hover:bg-blue-50 cursor-pointer transition flex flex-col items-center group">
            <span class="text-3xl mb-2 group-hover:scale-110 transition-transform">📁</span>
            <p class="text-gray-500">Click to upload <strong>Images</strong></p>
            <input type="file" name="image" accept="image/*" multiple>
          </div>
        </div>

        <button name="addArticle" class="w-full bg-[#197fe6] text-white py-4 rounded-xl font-bold text-lg shadow-lg hover:bg-blue-700 active:transform active:scale-95 transition-all">
            Publish Now
          </button>
      </form>
    </div>
  </div>

  <script>
    document.getElementById('newArticleBtn').addEventListener("click", () => document.getElementById('article-modal').classList.remove('hidden'));
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.getElementById('article-modal').classList.add('hidden')
            }
        })
  </script>
</body>

</html>