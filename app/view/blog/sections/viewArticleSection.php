
<main class='container mx-auto px-4 py-10 max-w-4xl'>
    <?php
        // $article = Article::getArticleById($_GET['showArticle']);
        // echo "
        //     <article class='bg-white p-8 rounded-2xl shadow-sm border border-gray-100'>
        //         <header class='mb-8'>
        //             <div class='flex items-center gap-2 mb-4'>
        //             <a href='../blog/explore.php' class='text-[#197fe6] font-bold'>← Back to Feed</a>
        //             </div>
        //             <h1 class='text-4xl font-extrabold text-gray-900 mb-4 leading-tight'>{$article->articleTitle}</h1>
        //             <div class='flex items-center gap-4 text-gray-500 text-sm'>
        //             <span class='font-medium text-gray-700'>". User::findById($article->idClient)->fullName. "</span> • <button class='text-[#197fe6] hover:underline font-bold'>Add to Favorites ❤️</button>
        //             </div>
        //         </header>

        //         <div class='prose max-w-none text-lg text-gray-700 leading-relaxed mb-8'>
        //             <p>{$article->articleParagraph}</p>
                    
        //             <div class='my-8 flex flex-col items-center justify-center border-2 border-[#197fe6] rounded-xl'>
        //                 <img class='w-full' src='images/{$article->articleImage}'>
        //             </div>
        //         </div>
        //     ";
                
    ?>
    <section class='relative border-t pt-10 mt-12'>
        <h3 class='text-2xl font-bold mb-8'>Comments (<?= Comment::getCommentsTotalOfArticle($article->articleId) ?>)</h3>
        
        <div class='space-y-6 mb-10'>
            <?php
                // $comments = Comment::getComments($article->articleId);
                // foreach($comments as $comment) {
                //     echo "
                //         <div class='bg-gray-50 p-5 rounded-xl border border-gray-100'>
                //             <div class='flex justify-between mb-3'>
                //                 <span class='font-bold text-gray-900'>". User::findById($comment->idClient)->fullName ."</span>
                //     ";
                //     if($comment->idClient === $connectedUser->id) echo "
                //         <div class='flex gap-4 text-xs font-bold uppercase tracking-tighter'>
                //             <button name='editComment' class='text-[#197fe6] hover:underline' onclick='openCommentEditModal({$comment->commentId},". json_encode($comment->commentText) .")'>Edit</button>
                //             <form method='post' class='pt-1'>
                //                 <button name='deleteComment' value='{$comment->commentId}' class='text-red-500 hover:underline'>Delete</button>
                //             </form>
                //         </div>
                //     ";
                //     echo "
                //             </div>
                //         <p class='text-gray-600'>{$comment->commentText}</p>
                //     </div>
                // </div>
                //     ";
                // }
            ?>
            
                
                

        <form class='space-y-4 bg-white p-6 rounded-xl border-2 border-gray-50' method='post'>
            <h4 class='font-bold'>Leave a reply</h4>
            <textarea name='comment' required placeholder='Write your comment here...' class='w-full p-4 border rounded-lg focus:ring-2 focus:ring-[#197fe6] focus:border-[#197fe6] outline-none min-h-[120px]' rows='3'></textarea>
            <button name='addComment' value='<?= $article->articleId ?>' class='bg-[#197fe6] text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition-colors'>Post Comment</button>
        </form>

        <div id='edit-comment-modal' class='absolute hidden flex inset-0 bg-gray-600 bg-opacity-50 items-center justify-center z-50'>
            <form class='bg-white p-6 rounded-xl border-2 border-gray-50' method='post'>
                <h4 class='font-bold'>Edit Comment</h4>
                <textarea id='paragraphEdit' name='editedComment' required class='w-full p-4 border rounded-lg focus:ring-2 focus:ring-[#197fe6] focus:border-[#197fe6] outline-none min-h-[120px]' rows='3'></textarea>
                <button id='editCommentBtn' name='editComment' class='bg-[#197fe6] text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition-colors'>Edit the Comment</button>
            </form>
        </div>
    </section>
</article>
</main>

<script>
    function openCommentEditModal(id, text){
      document.getElementById('edit-comment-modal').classList.remove('hidden');
      document.getElementById('paragraphEdit').textContent = text;
      document.getElementById('editCommentBtn').value = id;
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            document.getElementById('edit-comment-modal').classList.add('hidden')
        }
    })
</script>