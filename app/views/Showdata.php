<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showdata</title>
    <script>
        // Enable class-based dark mode for Tailwind (must be before CDN script)
        tailwind = { config: { darkMode: 'class' } };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Utilities
        function setChecked(id, isChecked) {
            var input = document.getElementById(id);
            if (input) input.checked = !!isChecked;
        }

        function applyDarkMode(enabled) {
            var root = document.documentElement;
            if (enabled) { root.classList.add('dark'); } else { root.classList.remove('dark'); }
            try { localStorage.setItem('prefersDark', enabled ? '1' : '0'); } catch (e) {}
        }

        function applyCompact(enabled) {
            var wrapper = document.getElementById('table-wrapper');
            if (!wrapper) return;
            if (enabled) { wrapper.classList.add('compact-mode'); } else { wrapper.classList.remove('compact-mode'); }
            try { localStorage.setItem('prefersCompact', enabled ? '1' : '0'); } catch (e) {}
        }

        function applyEmailVisible(visible) {
            document.querySelectorAll('.col-email').forEach(function(el){
                if (visible) { el.classList.remove('hidden'); } else { el.classList.add('hidden'); }
            });
            try { localStorage.setItem('showEmail', visible ? '1' : '0'); } catch (e) {}
        }

        document.addEventListener('DOMContentLoaded', function(){
            // Initialize from localStorage
            var prefersDark = (localStorage.getItem('prefersDark') === '1');
            var prefersCompact = (localStorage.getItem('prefersCompact') === '1');
            var showEmail = localStorage.getItem('showEmail');
            var emailVisible = showEmail === null ? true : showEmail === '1';

            applyDarkMode(prefersDark);
            applyCompact(prefersCompact);
            applyEmailVisible(emailVisible);

            setChecked('toggle-dark', prefersDark);
            setChecked('toggle-compact', prefersCompact);
            setChecked('toggle-email', emailVisible);

            // Wire events
            var darkInput = document.getElementById('toggle-dark');
            var compactInput = document.getElementById('toggle-compact');
            var emailInput = document.getElementById('toggle-email');

            if (darkInput) darkInput.addEventListener('change', function(){ applyDarkMode(darkInput.checked); });
            if (compactInput) compactInput.addEventListener('change', function(){ applyCompact(compactInput.checked); });
            if (emailInput) emailInput.addEventListener('change', function(){ applyEmailVisible(emailInput.checked); });
        });
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
                <label class="w-full inline-flex items-center justify-between rounded-md border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-200 shadow select-none">
                    <span>Dark Mode</span>
                    <input id="toggle-dark" type="checkbox" class="sr-only peer" />
                    <span class="ml-3 inline-flex h-5 w-10 items-center rounded-full bg-gray-200 peer-checked:bg-indigo-600 transition-colors">
                        <span class="h-4 w-4 translate-x-1 peer-checked:translate-x-5 rounded-full bg-white shadow transition-transform"></span>
                    </span>
                </label>
                <label class="w-full inline-flex items-center justify-between rounded-md border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-200 shadow select-none">
                    <span>Compact Density</span>
                    <input id="toggle-compact" type="checkbox" class="sr-only peer" />
                    <span class="ml-3 inline-flex h-5 w-10 items-center rounded-full bg-gray-200 peer-checked:bg-indigo-600 transition-colors">
                        <span class="h-4 w-4 translate-x-1 peer-checked:translate-x-5 rounded-full bg-white shadow transition-transform"></span>
                    </span>
                </label>
                <label class="w-full inline-flex items-center justify-between rounded-md border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-200 shadow select-none">
                    <span>Show/Hide Email</span>
                    <input id="toggle-email" type="checkbox" class="sr-only peer" />
                    <span class="ml-3 inline-flex h-5 w-10 items-center rounded-full bg-gray-200 peer-checked:bg-indigo-600 transition-colors">
                        <span class="h-4 w-4 translate-x-1 peer-checked:translate-x-5 rounded-full bg-white shadow transition-transform"></span>
                    </span>
                </label>
            </div>

            <form action="<?=site_url('user/show');?>" method="get" class="mb-4">
                <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
                    <input type="text" name="q" value="<?=html_escape($q ?? '');?>" placeholder="Search by ID, Lastname, Firstname, or Email" class="sm:col-span-7 col-span-1 rounded-md border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-gray-700 dark:text-slate-200 px-3 py-2 shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <div class="sm:col-span-3 col-span-1">
                        <label for="per_page" class="block text-sm font-medium text-gray-700 dark:text-slate-200 mb-1">Rows per page</label>
                        <select id="per_page" name="per_page" class="w-full rounded-md border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-gray-700 dark:text-slate-200 px-3 py-2 shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <?php $pp = (int)($per_page ?? 5); foreach([5,10,15,20] as $opt): ?>
                                <option value="<?=$opt;?>" <?= $pp === $opt ? 'selected' : '' ?>><?=$opt;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="sm:col-span-2 col-span-1 flex sm:justify-end">
                        <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Search</button>
                    </div>
                </div>
            </form>

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
                        <?php if(empty($students)): ?>
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-sm text-gray-500 dark:text-slate-300">No results found.</td>
                        </tr>
                        <?php endif; ?>
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

            <?php if(isset($pagination) && ($pagination['last_page'] ?? 1) > 1): ?>
            <?php
                $current = (int)($pagination['current_page'] ?? 1);
                $last = (int)$pagination['last_page'];
                $qVal = isset($q) ? $q : '';
                $pp = (int)($per_page ?? 5);
                $base = site_url('user/show');
            ?>
            <nav class="mt-4 flex items-center justify-between" aria-label="Pagination">
                <div>
                    <p class="text-sm text-gray-600 dark:text-slate-300">Showing page <strong><?=$current;?></strong> of <strong><?=$last;?></strong> (<?=$pagination['total'];?> total)</p>
                </div>
                <ul class="inline-flex -space-x-px rounded-md shadow-sm">
                    <?php $prev = max(1, $current - 1); ?>
                    <li>
                        <a href="<?=$base.'?q='.urlencode($qVal).'&per_page='.$pp.'&page='.$prev; ?>" class="px-3 py-2 text-sm border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-gray-700 dark:text-slate-200 rounded-l-md hover:bg-gray-50">Prev</a>
                    </li>
                    <?php for($i = 1; $i <= $last; $i++): ?>
                    <li>
                        <a href="<?=$base.'?q='.urlencode($qVal).'&per_page='.$pp.'&page='.$i; ?>" class="px-3 py-2 text-sm border border-gray-300 dark:border-slate-700 <?=( $i === $current ? 'bg-indigo-600 text-white' : 'bg-white dark:bg-slate-800 text-gray-700 dark:text-slate-200 hover:bg-gray-50')?>"><?=$i;?></a>
                    </li>
                    <?php endfor; ?>
                    <?php $next = min($last, $current + 1); ?>
                    <li>
                        <a href="<?=$base.'?q='.urlencode($qVal).'&per_page='.$pp.'&page='.$next; ?>" class="px-3 py-2 text-sm border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-gray-700 dark:text-slate-200 rounded-r-md hover:bg-gray-50">Next</a>
                    </li>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>