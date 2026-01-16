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
        //foreach(Theme::getThemes() as $topic) echo "<button name='getArticlesOnTopic' value='{$topic->themeId}' class='px-4 py-2 border border-[#197fe6] text-[#197fe6] rounded-full hover:bg-blue-50'>{$topic->themeTitle}</button>";
      ?>
      
    </form>
    
    <form class="grid md:grid-cols-3 gap-8" method="GET">
      <?php
        // if(isset($_GET['getArticlesOnTopic'])) $articles = Article::getArticlesOnTheme($_GET['getArticlesOnTopic']);
        // else if(isset($_GET['search'])) $articles = Article::searchArticle("%{$_GET['titleToSearch']}%");
        // else if(isset($_GET['showArticlesByTag'])) $articles = Article::getArticlesOnTag($_GET['showArticlesByTag']);
        // else $articles = Article::getAllArticles();

        // foreach($articles as $article) {
        //   echo "
        //     <div class='bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-xl transition'>
        //       <div class='h-48 bg-gray-200 flex items-center justify-center text-gray-400 font-bold uppercase tracking-widest'><img src='images/{$article->articleImage}'></div> 
        //       <div class='p-5'>
        //         <div class='flex justify-between items-start mb-2'>
        //           <span class='text-xs font-bold text-[#197fe6] uppercase tracking-wide'>" .Theme::getThemeById($article->idTheme)->themeTitle. "</span>
        //           <!--button class='text-gray-300 hover:text-red-500 transition text-xl'>❤️</button-->
        //         </div>
        //         <h3 class='text-xl font-bold mb-2'>{$article->articleTitle}</h3>
        //         <p class='text-gray-600 text-sm mb-4'>" .substr($article->articleParagraph, 0, 50). '...' . "</p>
        //         <div class='flex gap-2'>
        //   ";

        //   foreach($article->tags as $tag) echo "
        //           <button name='showArticlesByTag' value='$tag->tagId' class='text-[10px] bg-blue-50 text-[#197fe6] px-2 py-1 rounded font-bold border border-blue-100'>#{$tag->tagTitle}</button>
        //     ";
        //   echo "
        //         </div>
        //         <div class='mt-2 flex justify-between'>
        //           <button name='showArticle' value='{$article->articleId}' class='px-4 py-2 bg-[#197fe6] text-white rounded-full'>learn more</button>
        //         ";

        //   if($article->idClient === $connectedUser->id) echo "
        //     <div class='flex'>
        //       <button name='edit' value='{$article->articleId}' class='text-[#197fe6] pl-4'>Edit</button>
        //       <button name='deleteArticle' value='{$article->articleId}' class='text-red-500 pl-3'>delete</button>
        //     </div>
        //   ";

        //   echo "
        //         </div>
        //       </div>
        //     </div>
        //   ";
        // }
          ?>
                
    </form>
  </section>