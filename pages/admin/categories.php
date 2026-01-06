<?php
require_once __DIR__ . '/../../autoload.php';

$currentUser = checkAccess();
if(!$currentUser) {
    header('Location: ../login.php');
    exit;
}

if(isset($_POST['logout'])){
    $currentUser->logout();
    header('Location: ../login.php'); 
    exit;
}
if(isset($_POST['addCategory'])){
    Category::addCategory($_POST['categoryName'], $_POST['categoryImage']);
    echo "Category added successfully";
}
?>

<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Category Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#197fe6",
                        "background-light": "#f6f7f8",
                        "background-dark": "#111921",
                        "slate-850": "#1a2430", // Dark mode specific panel bg
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        /* Custom scrollbar for better admin feel */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #475569;
        }

        .dark ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display transition-colors duration-200 relative">
    <div class="flex h-screen w-full overflow-hidden">
        <!-- Sidebar -->
        <aside
            class="w-64 bg-white dark:bg-slate-850 border-r border-slate-200 dark:border-slate-800 flex flex-col transition-colors duration-200 hidden md:flex">
            <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex items-center gap-3">
                <div class="size-8 rounded-full bg-primary flex items-center justify-center text-white">
                    <span class="material-symbols-outlined text-[20px]">directions_car</span>
                </div>
                <div>
                    <h1 class="text-base font-bold leading-tight">MaBagnole</h1>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Admin Portal</p>
                </div>
            </div>
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors group"
                    href="#">
                    <span
                        class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <div class="pt-4 pb-2 px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider">Fleet</div>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-primary/10 text-primary dark:text-primary transition-colors"
                    href="#">
                    <span class="material-symbols-outlined text-primary font-variation-fill">category</span>
                    <span class="text-sm font-medium">Categories</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors group"
                    href="#">
                    <span
                        class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">directions_car</span>
                    <span class="text-sm font-medium">All Vehicles</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors group"
                    href="#">
                    <span
                        class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">build</span>
                    <span class="text-sm font-medium">Maintenance</span>
                </a>
                
            </nav>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-full relative overflow-hidden">
            <!-- Mobile Header -->
            <header
                class="md:hidden flex items-center justify-between p-4 bg-white dark:bg-slate-850 border-b border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">directions_car</span>
                    <span class="font-bold">MaBagnole</span>
                </div>
                <button class="p-2 text-slate-600 dark:text-slate-300">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </header>
            <!-- Top Toolbar -->
            <div
                class="flex flex-col border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 shadow-sm z-10">
                <div class="px-6 py-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Vehicle Categories
                        </h1>
                    </div>
                    <div class="flex items-center gap-3 self-start md:self-auto">
                        <form method="post">
                            <button name="logout"
                                class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                <span>Log out</span>
                            </button>
                        </form>
                        <button id="newCatgeory"
                            class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors shadow-sm shadow-blue-500/30">
                            <span class="material-symbols-outlined text-[20px]">add</span>
                            <span>New Category</span>
                        </button>
                    </div>
                </div>
                <!-- Stats Overview -->
                <div class="px-6 pb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div
                        class="p-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800/50 shadow-sm">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Categories</p>
                            <span class="material-symbols-outlined text-slate-400">category</span>
                        </div>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white mt-1">12</p>
                    </div>
                    <div
                        class="p-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800/50 shadow-sm">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Vehicles</p>
                            <span class="material-symbols-outlined text-slate-400">directions_car</span>
                        </div>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white mt-1">148</p>
                    </div>
                    <div
                        class="p-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800/50 shadow-sm">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Active Rentals</p>
                            <span class="material-symbols-outlined text-slate-400">key</span>
                        </div>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white mt-1">86</p>
                    </div>
                    <div class="p-4 rounded-xl border-l-4 border-amber-400 bg-amber-50 dark:bg-amber-900/10 shadow-sm">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-amber-800 dark:text-amber-200">Empty Categories</p>
                            <span class="material-symbols-outlined text-amber-500">warning</span>
                        </div>
                        <p class="text-2xl font-bold text-amber-900 dark:text-amber-100 mt-1">2</p>
                    </div>
                </div>
            </div>
            <!-- Main Content Scroll Area -->
            <div class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark p-6">
                <div class="max-w-[1200px] mx-auto flex flex-col gap-6">
                    <div
                        class="bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-800">
                                <thead class="bg-slate-50 dark:bg-slate-900">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider"
                                            scope="col">Category</th>
                                        <th class="px-6 py-4 text-center text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider"
                                            scope="col">Inventory</th>
                                        <th class="px-6 py-4 text-right text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider"
                                            scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white dark:bg-slate-850 divide-y divide-slate-200 dark:divide-slate-800">
                                    <?php
                                        $categories = Category::getCategories();
                                        foreach($categories as $category) {
                                            echo"
                                            <tr class='hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group'>
                                                <td class='px-6 py-4 whitespace-nowrap'>
                                                    <div class='flex items-center'>
                                                        <div
                                                            class='h-10 w-10 flex-shrink-0 bg-slate-100 dark:bg-slate-800 rounded-lg flex items-center justify-center text-slate-500 dark:text-slate-400'>
                                                            <img src='{$category->categoryImage}' alt='{$category->categoryName}'>
                                                        </div>
                                                        <div class='ml-4'>
                                                            <div class='text-sm font-bold text-slate-900 dark:text-white'>
                                                                {$category->categoryName}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class='px-6 py-4 whitespace-nowrap text-center'>
                                                    <span class='inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300'>
                                                        
                                                    </span>
                                                </td>
                                                <td class='px-6 py-4 whitespace-nowrap text-right text-sm font-medium'>
                                                    <div
                                                        class='flex items-center justify-end gap-2'>
                                                        <button name='{$category->categoryId}' class='text-slate-400 hover:text-primary transition-colors p-1'
                                                            title='Edit'>
                                                            <span class='material-symbols-outlined text-[20px]'>edit</span>
                                                        </button>
                                                        <button name='{$category->categoryId}' class='text-slate-400 hover:text-red-600 transition-colors p-1'
                                                            title='Delete'>
                                                            <span class='material-symbols-outlined text-[20px]'>delete</span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
   
    <div id="category-modal" class="fixed flex inset-0 bg-gray-600 bg-opacity-75 hidden items-center justify-center z-50">
        <div class="w-full max-w-sm bg-white p-8 rounded-xl shadow-md">
            <form method="POST" class="space-y-6">
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input 
                type="text" 
                name="categoryName" 
                placeholder="Category name"
                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                        focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                >
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input placeholder="Enter Url for image" name="categoryImage"
                    type="text"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                        focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                >
            </div>

            <button 
                type="submit" name="addCategory"
                class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200">
                Submit
            </button>
            
            </form>
        </div>
    </div>

    <script>
        document.getElementById('newCatgeory').addEventListener("click", () => document.getElementById('category-modal').classList.remove('hidden'));
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.getElementById('category-modal').classList.add('hidden')
            }
        })
    </script>
</body>

</html>