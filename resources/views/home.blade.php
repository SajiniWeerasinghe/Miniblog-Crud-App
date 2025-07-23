<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniBlog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gray-50 via-purple-50 to-indigo-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        @auth 
        <!-- Modern Header with Glass Morphism -->
        <div class="bg-white/70 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 p-8 mb-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-primary-600 to-purple-600 bg-clip-text text-transparent">
                        Welcome back, {{ auth()->user()->name }}! 👋
                    </h1>
                    <p class="text-gray-600 mt-2">Ready to share your thoughts with the world?</p>
                </div>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="group relative px-6 py-3 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Logout</span>
                        </span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Modern Create Post Section -->
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 p-8 mb-8 hover:shadow-2xl transition-all duration-500">
            <div class="flex items-center space-x-3 mb-6">
                <div class="p-3 bg-gradient-to-r from-primary-500 to-purple-500 rounded-xl">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Create New Post</h2>
                    <p class="text-gray-600">Share your amazing thoughts and ideas</p>
                </div>
            </div>
            <form action="/create-post" method="POST" class="space-y-6">
                @csrf
                <div class="group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Post Title</label>
                    <input type="text" name="title" placeholder="What's on your mind?" 
                           class="w-full px-6 py-4 bg-gray-50/50 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-300 text-lg group-hover:border-primary-300">
                </div>
                <div class="group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Content</label>
                    <textarea name="body" placeholder="Tell your story..." rows="6"
                              class="w-full px-6 py-4 bg-gray-50/50 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-300 text-lg resize-none group-hover:border-primary-300"></textarea>
                </div>
                <button type="submit" class="group relative w-full md:w-auto px-8 py-4 bg-gradient-to-r from-primary-500 via-purple-500 to-indigo-500 text-white rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                    <span class="flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        <span>Publish Post</span>
                    </span>
                </button>
            </form>
        </div>

        <!-- Modern Posts Feed -->
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 p-8 hover:shadow-2xl transition-all duration-500">
            <div class="flex items-center space-x-3 mb-8">
                <div class="p-3 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Latest Posts</h2>
                    <p class="text-gray-600">Discover amazing content from our community</p>
                </div>
            </div>
            <div class="space-y-6">
                @forelse($posts as $post)
                <article class="group bg-gradient-to-br from-white to-gray-50/50 rounded-2xl p-6 border border-gray-100 hover:shadow-xl hover:border-primary-200 transition-all duration-500 transform hover:-translate-y-1">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-primary-600 transition-colors duration-300 mb-2">
                                {{$post['title']}}
                            </h3>
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <div class="w-8 h-8 bg-gradient-to-r from-primary-400 to-purple-400 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                    {{substr($post->user->name, 0, 1)}}
                                </div>
                                <span class="font-medium">{{$post->user->name}}</span>
                                <span class="text-gray-300">•</span>
                                <span>{{ $post->created_at->diffForHumans() ?? 'Recently' }}</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-6 line-clamp-3">{{$post['body']}}</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="flex space-x-3">
                            <a href="/edit-post/{{$post->id}}" 
                               class="group/btn flex items-center space-x-2 px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-lg text-sm font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                                <svg class="w-4 h-4 group-hover/btn:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span>Edit</span>
                            </a>
                            <form action="/delete-post/{{$post->id}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="group/btn flex items-center space-x-2 px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-lg text-sm font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300"
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                    <svg class="w-4 h-4 group-hover/btn:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>
                        <div class="flex items-center space-x-4 text-sm text-gray-400">
                            <span class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <span>0</span>
                            </span>
                            <span class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <span>0</span>
                            </span>
                        </div>
                    </div>
                </article>
                @empty
                <div class="text-center py-12">
                    <div class="w-24 h-24 bg-gradient-to-r from-gray-200 to-gray-300 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No posts yet</h3>
                    <p class="text-gray-500">Be the first to share something amazing!</p>
                </div>
                @endforelse 
            </div>
        </div>

        @else
        <!-- Modern Landing Page -->
        <div class="max-w-7xl mx-auto">
            <!-- Hero Section -->
            <div class="text-center mb-16 relative">
                <!-- Background Elements -->
                <div class="absolute inset-0 -z-10">
                    <div class="absolute top-10 left-10 w-20 h-20 bg-primary-300/20 rounded-full blur-xl"></div>
                    <div class="absolute top-32 right-20 w-32 h-32 bg-purple-300/20 rounded-full blur-xl"></div>
                    <div class="absolute bottom-10 left-1/4 w-24 h-24 bg-indigo-300/20 rounded-full blur-xl"></div>
                </div>
                
                <div class="mb-8">
                    <h1 class="text-6xl md:text-7xl font-black mb-6">
                        <span class="bg-gradient-to-r from-primary-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">
                            MiniBlog
                        </span>
                    </h1>
                </div>
            </div>
            
            <!-- Auth Forms with Tabs -->
            <div class="max-w-md mx-auto">
                <div id="authContainer" class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl border border-white/30 p-6">
                    
                    <!-- Login Form (Default) -->
                    <div id="loginForm">
                        <div class="text-center mb-6">
                            <div class="relative inline-block mb-4">
                                <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-xl">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                </div>
                            </div>
                            <h2 class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent mb-2">
                                Welcome Back
                            </h2>
                            <p class="text-gray-600 text-sm">Sign in to your account to continue</p>
                        </div>
                        
                        <form action="/login" method="POST" class="space-y-4">
                            @csrf
                            <div class="group/input">
                                <label for="loginname" class="block text-sm font-bold text-gray-700 mb-1">Username</label>
                                <div class="relative">
                                    <input type="text" id="loginname" placeholder="Enter your username" name="loginname" required 
                                           class="w-full px-4 py-3 bg-gray-50/80 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-300 group-hover/input:border-emerald-300 group-hover/input:bg-white">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="w-4 h-4 text-gray-400 group-focus-within/input:text-emerald-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="group/input">
                                <label for="loginpassword" class="block text-sm font-bold text-gray-700 mb-1">Password</label>
                                <div class="relative">
                                    <input type="password" id="loginpassword" placeholder="Enter your password" name="loginpassword" required 
                                           class="w-full px-4 py-3 bg-gray-50/80 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-300 group-hover/input:border-emerald-300 group-hover/input:bg-white">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="w-4 h-4 text-gray-400 group-focus-within/input:text-emerald-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" 
                                    class="w-full py-3 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 text-white rounded-xl font-bold shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-500">
                                <span class="flex items-center justify-center space-x-2">
                                    <span>Sign In</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                            </button>
                        </form>

                        <!-- Switch to Register -->
                        <div class="mt-6 text-center">
                            <div class="bg-primary-50/50 rounded-xl p-3">
                                <h3 class="text-sm font-bold text-gray-800 mb-1">Getting Started</h3>
                                <p class="text-xs text-gray-600 mb-2">New here? Create your account</p>
                                <button onclick="showRegisterForm()" 
                                        class="text-primary-600 hover:text-primary-700 font-semibold text-sm hover:underline transition-colors duration-300">
                                    Create Account →
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Register Form (Hidden by default) -->
                    <div id="registerForm" class="hidden">
                        <div class="text-center mb-6">
                            <div class="relative inline-block mb-4">
                                <div class="w-16 h-16 bg-gradient-to-r from-primary-500 to-purple-500 rounded-2xl flex items-center justify-center shadow-xl">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                </div>
                            </div>
                            <h2 class="text-2xl font-bold bg-gradient-to-r from-primary-600 to-purple-600 bg-clip-text text-transparent mb-2">
                                Join MiniBlog
                            </h2>
                            <p class="text-gray-600 text-sm">Start your blogging journey today</p>
                        </div>
                        
                        <form action="/register" method="POST" class="space-y-4">
                            @csrf
                            <div class="group/input">
                                <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Full Name</label>
                                <div class="relative">
                                    <input type="text" id="name" placeholder="Enter your full name" name="name" required 
                                           class="w-full px-4 py-3 bg-gray-50/80 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-300 group-hover/input:border-primary-300 group-hover/input:bg-white">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="w-4 h-4 text-gray-400 group-focus-within/input:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="group/input">
                                <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Email Address</label>
                                <div class="relative">
                                    <input type="email" id="email" placeholder="Enter your email" name="email" required 
                                           class="w-full px-4 py-3 bg-gray-50/80 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-300 group-hover/input:border-primary-300 group-hover/input:bg-white">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="w-4 h-4 text-gray-400 group-focus-within/input:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="group/input">
                                <label for="password" class="block text-sm font-bold text-gray-700 mb-1">Password</label>
                                <div class="relative">
                                    <input type="password" id="password" placeholder="Create a secure password" name="password" required 
                                           class="w-full px-4 py-3 bg-gray-50/80 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-300 group-hover/input:border-primary-300 group-hover/input:bg-white">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="w-4 h-4 text-gray-400 group-focus-within/input:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" 
                                    class="w-full py-3 bg-gradient-to-r from-primary-500 via-purple-500 to-indigo-500 text-white rounded-xl font-bold shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-500">
                                <span class="flex items-center justify-center space-x-2">
                                    <span>Create My Account</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                            </button>
                        </form>

                        <!-- Switch back to Login -->
                        <div class="mt-6 text-center">
                            <button onclick="showLoginForm()" 
                                    class="text-emerald-600 hover:text-emerald-700 font-semibold text-sm hover:underline transition-colors duration-300">
                                ← Back to Sign In
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showRegisterForm() {
                document.getElementById('loginForm').classList.add('hidden');
                document.getElementById('registerForm').classList.remove('hidden');
            }

            function showLoginForm() {
                document.getElementById('registerForm').classList.add('hidden');
                document.getElementById('loginForm').classList.remove('hidden');
            }
        </script>
        @endauth
    </div>
</body>
</html>