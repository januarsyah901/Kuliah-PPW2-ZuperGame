@if(session('success') || session('error') || session('status') || $errors->any())
    <div id="flash-message" class="max-w-4xl mx-auto mb-6 px-4">
        @if(session('success'))
            <div class="flex items-start bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 shadow-sm">
                <div class="flex-1">
                    <div class="font-semibold">Sukses</div>
                    <div class="mt-1 text-sm">{{ session('success') }}</div>
                </div>
                <button type="button" class="flash-close ml-4 text-green-600 hover:text-green-800" aria-label="close">&times;</button>
            </div>
        @endif

        @if(session('error'))
            <div class="flex items-start bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 shadow-sm">
                <div class="flex-1">
                    <div class="font-semibold">Error</div>
                    <div class="mt-1 text-sm">{{ session('error') }}</div>
                </div>
                <button type="button" class="flash-close ml-4 text-red-600 hover:text-red-800" aria-label="close">&times;</button>
            </div>
        @endif

        @if(session('status'))
            <div class="flex items-start bg-blue-50 border border-blue-200 text-blue-800 rounded-lg p-4 shadow-sm">
                <div class="flex-1">
                    <div class="font-semibold">Info</div>
                    <div class="mt-1 text-sm">{{ session('status') }}</div>
                </div>
                <button type="button" class="flash-close ml-4 text-blue-600 hover:text-blue-800" aria-label="close">&times;</button>
            </div>
        @endif

        @if($errors->any())
            <div class="flex items-start bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 shadow-sm mt-3">
                <div class="flex-1">
                    <div class="font-semibold">Terjadi kesalahan validasi</div>
                    <ul class="mt-1 text-sm list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="flash-close ml-4 text-red-600 hover:text-red-800" aria-label="close">&times;</button>
            </div>
        @endif
    </div>

    <script>
        (function () {
            // Auto-dismiss and manual close for flash message
            document.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('flash-close')) {
                    const parent = document.getElementById('flash-message');
                    if (parent) parent.remove();
                }
            });

            // Auto-remove after 6 seconds
            document.addEventListener('DOMContentLoaded', function () {
                const flash = document.getElementById('flash-message');
                if (flash) {
                    setTimeout(() => {
                        try { flash.remove(); } catch (e) { /* ignore */ }
                    }, 6000);
                }
            });
        })();
    </script>
@endif

