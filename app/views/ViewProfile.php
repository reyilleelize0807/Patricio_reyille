<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewProfile</title>
    <script>
        tailwind = { config: { darkMode: 'class' } };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            try { if (localStorage.getItem('prefersDark') === '1') document.documentElement.classList.add('dark'); } catch (e) {}
        });
    </script>
</head>
<body class="bg-gray-50 dark:bg-slate-900">
    <div class="container min-h-screen py-10 flex items-center">
        <div class="w-full max-w-2xl mx-auto bg-white dark:bg-slate-800 shadow-lg rounded-xl p-8">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-slate-100 mb-6">Profile</h1>
            <div class="space-y-2 text-gray-700 dark:text-slate-200">
                <p><strong>Username:</strong> <?=$username;?></p>
                <p><strong>Name:</strong> <?=$name;?></p>
            </div>
        </div>
    </div>
</body>
</html>