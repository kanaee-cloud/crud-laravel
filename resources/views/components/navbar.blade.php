<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between p-3">
            <div class=" flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class=" text-white font-bold">
                   <img src="https://i.pinimg.com/564x/55/8c/94/558c94f0ad9b2bb16595051ed2331039.jpg" width="100"  alt="">
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ url('kelas') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('kelas') ? 'bg-red-900 text-white' : '' }}">
                            Kelas
                        </a>
                        <a href="{{ url('siswa') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('siswa') ? 'bg-red-900 text-white' : '' }}">
                            Siswa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
