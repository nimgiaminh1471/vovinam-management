@extends('layouts.app')

@section('title', 'Chào mừng đến với Vovinam')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1820&q=80" alt="Luyện tập Vovinam">
            <div class="absolute inset-0 bg-gray-900 mix-blend-multiply"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Vovinam</h1>
            <p class="mt-6 text-xl text-gray-300 max-w-3xl">Nghệ thuật Võ thuật Việt Nam - Một hệ thống toàn diện về tự vệ, thể lực và phát triển cá nhân.</p>
            <div class="mt-10">
                <a href="#contact" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-vovinam-primary hover:bg-yellow-500">
                    Bắt đầu Luyện tập
                </a>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="bg-white py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-vovinam-primary font-semibold tracking-wide uppercase">Về Vovinam</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Hệ Thống Võ Thuật Toàn Diện
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Vovinam là môn võ thuật Việt Nam kết hợp kỹ thuật truyền thống với phương pháp luyện tập hiện đại. Nó nhấn mạnh cả sự phát triển thể chất và tinh thần.
                </p>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-vovinam-primary font-semibold tracking-wide uppercase">Đặc điểm</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Tại sao chọn Vovinam?
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-vovinam-primary text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Luyện tập Năng động</p>
                        <p class="mt-2 ml-16 text-base text-gray-500">
                            Bài tập cường độ cao giúp xây dựng sức mạnh, sự linh hoạt và sức bền.
                        </p>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-vovinam-primary text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Tự Vệ</p>
                        <p class="mt-2 ml-16 text-base text-gray-500">
                            Kỹ thuật tự vệ thực tế cho các tình huống thực tế.
                        </p>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-vovinam-primary text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Cộng đồng</p>
                        <p class="mt-2 ml-16 text-base text-gray-500">
                            Tham gia cộng đồng hỗ trợ với các môn sinh ở mọi trình độ.
                        </p>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-vovinam-primary text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Tiến bộ</p>
                        <p class="mt-2 ml-16 text-base text-gray-500">
                            Hệ thống đai rõ ràng và chương trình đào tạo có cấu trúc để phát triển liên tục.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Training Programs Section -->
    <div class="bg-white py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-vovinam-primary font-semibold tracking-wide uppercase">Chương trình</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Chương Trình Đào Tạo
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Beginner Program -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900">Chương trình Sơ cấp</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Học các kỹ thuật cơ bản của Vovinam, bao gồm tấn, đòn đánh và kỹ thuật tự vệ cơ bản.
                            </p>
                        </div>
                    </div>

                    <!-- Intermediate Program -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900">Chương trình Trung cấp</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Kỹ thuật nâng cao, đấu tập và chuẩn bị thi đấu.
                            </p>
                        </div>
                    </div>

                    <!-- Advanced Program -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900">Chương trình Cao cấp</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Thành thạo kỹ thuật phức tạp, huấn luyện vũ khí và phát triển huấn luyện viên.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="bg-gray-50 py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-vovinam-primary font-semibold tracking-wide uppercase">Liên hệ</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Bắt đầu Ngay Hôm Nay
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Liên hệ với chúng tôi để tìm hiểu thêm về các chương trình và đăng ký lớp học đầu tiên.
                </p>
            </div>

            <div class="mt-10 max-w-xl mx-auto">
                <form class="grid grid-cols-1 gap-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Họ và tên</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name" class="shadow-sm focus:ring-vovinam-primary focus:border-vovinam-primary block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" class="shadow-sm focus:ring-vovinam-primary focus:border-vovinam-primary block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Tin nhắn</label>
                        <div class="mt-1">
                            <textarea id="message" name="message" rows="4" class="shadow-sm focus:ring-vovinam-primary focus:border-vovinam-primary block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-gray-900 bg-vovinam-primary hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-vovinam-primary">
                            Gửi tin nhắn
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection 