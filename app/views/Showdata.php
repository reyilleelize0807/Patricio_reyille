<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showdata</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Simple state toggles
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
        }
        function toggleCompact() {
            const tableWrapper = document.getElementById('table-wrapper');
            tableWrapper.classList.toggle('compact-mode');
        }
        function toggleEmail() {
            document.querySelectorAll('.col-email').forEach(function(el){
                el.classList.toggle('hidden');
            });
        }
    </script>
    <style>
        /* Compact density without Tailwind config */
        .compact-mode table thead th { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .compact-mode table tbody td { padding-top: 0.5rem; padding-bottom: 0.5rem; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-slate-900">
    <div class="container min-h-screen py-10">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-slate-100">Student List</h1>
                <a class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-slate-900" href="<?=site_url('/');?>">Add New Student</a>
            </div>

            <div class="mb-4 grid grid-cols-1 sm:grid-cols-3 gap-3">
                <button type="button" onclick="toggleDarkMode()" class="w-full inline-flex items-center justify-between rounded-md border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-200 shadow hover:bg-gray-50 dark:hover:bg-slate-700">
                    <span>Dark Mode</span>
                    <span class="ml-3 inline-flex h-5 w-10 items-center rounded-full bg-gray-200 dark:bg-slate-600">
                        <span class="h-4 w-4 translate-x-1 rounded-full bg-white shadow transition dark:translate-x-5"></span>
                    </span>
                </button>
                <button type="button" onclick="toggleCompact()" class="w-full inline-flex items-center justify-between rounded-md border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-200 shadow hover:bg-gray-50 dark:hover:bg-slate-700">
                    <span>Compact Density</span>
                    <span class="ml-3 inline-flex h-5 w-10 items-center rounded-full bg-gray-200">
                        <span class="h-4 w-4 translate-x-1 rounded-full bg-white shadow transition"></span>
                    </span>
                </button>
                <button type="button" onclick="toggleEmail()" class="w-full inline-flex items-center justify-between rounded-md border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-200 shadow hover:bg-gray-50 dark:hover:bg-slate-700">
                    <span>Show/Hide Email</span>
                    <span class="ml-3 inline-flex h-5 w-10 items-center rounded-full bg-gray-200">
                        <span class="h-4 w-4 translate-x-1 rounded-full bg-white shadow transition"></span>
                    </span>
                </button>
            </div>

            <div id="table-wrapper" class="overflow-x-auto bg-white dark:bg-slate-800 shadow rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-slate-700">
                    <thead class="bg-gray-50 dark:bg-slate-700">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-200 uppercase tracking-wider">ID</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-200 uppercase tracking-wider">Lastname</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-200 uppercase tracking-wider">Firstname</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-200 uppercase tracking-wider col-email">Email</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-200 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-slate-700">
                        <?php foreach(html_escape($students) as $student): ?>
                        <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/50">
                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-slate-100"><?=$student['id'];?></td>
                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-slate-100"><?=$student['last_name'];?></td>
                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-slate-100"><?=$student['first_name'];?></td>
                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-slate-100 col-email"><?=$student['email'];?></td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex gap-2">
                                    <a class="inline-flex items-center rounded-md bg-blue-600 px-3 py-1.5 text-xs font-medium text-white shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500" href="<?=site_url('user/update/'.$student['id']);?>">Update</a>
                                    <a class="inline-flex items-center rounded-md bg-rose-600 px-3 py-1.5 text-xs font-medium text-white shadow hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500" href="<?=site_url('user/soft-delete/'.$student['id']);?>">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>