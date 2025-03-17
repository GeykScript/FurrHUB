<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-[#F28C1F] text-black p-4 flex items-center justify-between z-50">
        <div class="text-xl font-bold ml-4">Admin Dashboard</div>
        <div class="relative w-full max-w-md">
            <input type="text" placeholder="Search..."
                class="w-full pl-10 pr-4 py-2 bg-white text-black rounded-md border border-gray-300 focus:outline-none focus:border-[#22C3E6]">
            <span class="absolute left-3 top-2.5 text-[#22C3E6]">🔍</span>
        </div>
        <div class="mr-4"><span class="text-sm">Hi, User 👤</span></div>
    </nav>

    <div class="flex h-screen pt-16">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#1E293B] text-white flex flex-col p-4">
            <div class="text-2xl font-bold mb-6">Dashboard</div>
            <nav>
                <a href="#" class="block py-2 px-4 rounded bg-[#F28C1F] text-black">Tasks</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Messages</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Analytics</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Payments</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="bg-[#22C3E6] text-white p-4 text-2xl font-bold">Analytics</div>

            <!-- First Row: Stats Boxes -->
            <div class="grid grid-cols-3 gap-4 mt-6">
                <div class="bg-green-200 p-4 rounded shadow">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-600 p-3 rounded-full">
                            <i class="fas fa-wallet text-white text-2xl"></i>
                        </div>
                        <div>
                            <div class="text-lg font-semibold">TOTAL REVENUE</div>
                            <div class="text-2xl font-bold">$3249 <span class="text-green-500">▲</span></div>
                        </div>
                    </div>
                    <canvas id="revenueChart" class="mt-4"></canvas>
                </div>

                <div class="bg-pink-200 p-4 rounded shadow">
                    <div class="flex items-center space-x-4">
                        <div class="bg-pink-600 p-3 rounded-full">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <div>
                            <div class="text-lg font-semibold">TOTAL USERS</div>
                            <div class="text-2xl font-bold">249 <span class="text-pink-500">🔄</span></div>
                        </div>
                    </div>
                    <canvas id="usersChart" class="mt-4"></canvas>
                </div>

                <div class="bg-yellow-200 p-4 rounded shadow">
                    <div class="flex items-center space-x-4">
                        <div class="bg-yellow-600 p-3 rounded-full">
                            <i class="fas fa-user-plus text-white text-2xl"></i>
                        </div>
                        <div>
                            <div class="text-lg font-semibold">NEW USERS</div>
                            <div class="text-2xl font-bold">2 <span class="text-yellow-500">▲</span></div>
                        </div>
                    </div>
                    <canvas id="newUsersChart" class="mt-4"></canvas>
                </div>
            </div>

            <!-- Second Row: More Stats Boxes -->
            <div class="grid grid-cols-3 gap-4 mt-6">
                <div class="bg-blue-200 p-4 rounded shadow">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-600 p-3 rounded-full">
                            <i class="fas fa-server text-white text-2xl"></i>
                        </div>
                        <div>
                            <div class="text-lg font-semibold">SERVER UPTIME</div>
                            <div class="text-2xl font-bold">152 days</div>
                        </div>
                    </div>
                    <canvas id="uptimeChart" class="mt-4"></canvas>
                </div>

                <div class="bg-purple-200 p-4 rounded shadow">
                    <div class="flex items-center space-x-4">
                        <div class="bg-purple-600 p-3 rounded-full">
                            <i class="fas fa-list-check text-white text-2xl"></i>
                        </div>
                        <div>
                            <div class="text-lg font-semibold">TO DO LIST</div>
                            <div class="text-2xl font-bold">7 tasks</div>
                        </div>
                    </div>
                    <canvas id="tasksChart" class="mt-4"></canvas>
                </div>

                <div class="bg-red-200 p-4 rounded shadow">
                    <div class="flex items-center space-x-4">
                        <div class="bg-red-600 p-3 rounded-full">
                            <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                        </div>
                        <div>
                            <div class="text-lg font-semibold">ISSUES</div>
                            <div class="text-2xl font-bold">3 <span class="text-red-500">▲</span></div>
                        </div>
                    </div>
                    <canvas id="issuesChart" class="mt-4"></canvas>
                </div>
            </div>

        </main>
    </div>

    <!-- JavaScript: Chart.js -->
    <script>
        function createChart(id, label, data, color) {
            var ctx = document.getElementById(id).getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                    datasets: [{
                        label: label,
                        data: data,
                        backgroundColor: color + '20', // Transparent
                        borderColor: color,
                        borderWidth: 2
                    }]
                }
            });
        }

        createChart('revenueChart', 'Revenue ($)', [1200, 1900, 3000, 5000, 2200, 3200], '#22C3E6');
        createChart('usersChart', 'Total Users', [50, 100, 180, 220, 249, 300], '#E91E63');
        createChart('newUsersChart', 'New Users', [1, 3, 5, 7, 2, 4], '#FBC02D');
        createChart('uptimeChart', 'Server Uptime (Days)', [140, 142, 145, 148, 150, 152], '#1976D2');
        createChart('tasksChart', 'To Do List', [3, 5, 8, 6, 7, 10], '#7B1FA2');
        createChart('issuesChart', 'Issues', [1, 0, 2, 1, 3, 2], '#D32F2F');
    </script>

</body>
</html>
