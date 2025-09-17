<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-slate-100 mb-6">Update Record</h1>
            <form action="<?=site_url('user/update/'.$student['id']);?>" method="post" class="space-y-4">
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-slate-200 mb-1">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="<?=html_escape($student['last_name']);?>" class="block w-full rounded-md border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2">
                </div>
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-slate-200 mb-1">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="<?=html_escape($student['first_name']);?>" class="block w-full rounded-md border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-slate-200 mb-1">Email</label>
                    <input type="email" id="email" name="email" value="<?=html_escape($student['email']);?>" class="block w-full rounded-md border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2">
                </div>
                <div class="pt-2">
                    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>