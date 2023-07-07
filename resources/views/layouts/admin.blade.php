<div class="min-h-screen bg-gray-100">
    @include('layouts.admin-navigation')

    <div class="flex space-x-4">
        <sidebar />
        <!-- Page Content -->
        <main class="flex-1" style="height: calc(100vh - 64px);overflow-y: auto;">
            <div class="max-w-4xl mt-3 mx-auto">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>
