@extends("layouts.app")

@section("content")
<div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
        <div class="absolute top-20 left-20 w-72 h-72 bg-blue-500/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-indigo-500/20 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>

    <!-- Floating Particles -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-200/40 rounded-full animate-float"></div>
        <div class="absolute top-1/3 right-1/3 w-1 h-1 bg-blue-300/40 rounded-full animate-float-delayed"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1.5 h-1.5 bg-purple-300/30 rounded-full animate-float-slow"></div>
        <div class="absolute top-2/3 right-1/4 w-1 h-1 bg-indigo-300/40 rounded-full animate-float"></div>
    </div>

    <!-- Main Glass Container -->
    <div class="relative z-10 max-w-lg w-full">
        <!-- Glass Card -->
        <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl p-12 shadow-2xl hover:shadow-3xl transition-all duration-500 hover:scale-105 group">
            <!-- Error Number with Glow Effect -->
            <div class="relative mb-8">
                <h1 class="text-8xl md:text-9xl font-black bg-gradient-to-r from-blue-200 via-blue-300 to-purple-200 bg-clip-text text-transparent relative z-10 group-hover:from-blue-300 group-hover:to-purple-300 transition-all duration-500">
                    403
                </h1>
                <div class="absolute inset-0 text-8xl md:text-9xl font-black text-blue-200/20 blur-sm">403</div>
            </div>

            <!-- Title with Icon -->
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="p-3 rounded-full bg-red-500/20 border border-red-400/30">
                    <svg class="w-6 h-6 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0-6V9a3 3 0 11-6 0v3"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 21h8a2 2 0 002-2v-1a2 2 0 00-2-2H8a2 2 0 00-2 2v1a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-blue-200">Akses Ditolak</h2>
            </div>

            <!-- Description -->
            <p class="text-blue-200 text-lg mb-8 leading-relaxed">
                Maaf, Anda tidak memiliki izin untuk mengakses halaman ini. Silakan hubungi administrator jika diperlukan.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4">
                <!-- Back Button -->
                <button onclick="history.back()"
                    class="group/btn flex-1 inline-flex items-center justify-center gap-3 bg-gradient-to-r from-blue-500/20 to-purple-500/20 hover:from-blue-500/30 hover:to-purple-500/30 border border-white/20 hover:border-white/30 text-blue-100 font-semibold px-6 py-4 rounded-2xl backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    <svg class="w-5 h-5 transition-transform group-hover/btn:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </button>

                <!-- Home Button -->
                <button onclick="window.location.href='/'"
                    class="group/btn flex-1 inline-flex items-center justify-center gap-3 bg-gradient-to-r from-white/20 to-white/10 hover:from-white/30 hover:to-white/20 border border-white/30 hover:border-white/40 text-blue-100 font-semibold px-6 py-4 rounded-2xl backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    <svg class="w-5 h-5 transition-transform group-hover/btn:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Beranda
                </button>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 pt-6 border-t border-white/10">
                <p class="text-blue-300 text-sm text-center">
                    Error Code: <span class="font-mono font-semibold text-blue-100">HTTP 403</span>
                </p>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute -top-4 -right-4 w-8 h-8 border-2 border-blue-100/20 rounded-full"></div>
        <div class="absolute -bottom-4 -left-4 w-6 h-6 border-2 border-purple-300/30 rounded-full"></div>
    </div>
</div>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}
@keyframes float-delayed {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(-180deg); }
}
@keyframes float-slow {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(90deg); }
}
.animate-float {
    animation: float 6s ease-in-out infinite;
}
.animate-float-delayed {
    animation: float-delayed 8s ease-in-out infinite;
}
.animate-float-slow {
    animation: float-slow 10s ease-in-out infinite;
}
.hover\:shadow-3xl:hover {
    box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.5);
}
</style>
@endsection
