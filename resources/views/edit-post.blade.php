<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post - Simple CRUD App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-800">Edit Post</h1>
                    <a href="/" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition duration-300">
                        ← Back to Home
                    </a>
                </div>
            </div>

            <!-- Edit Form -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-primary-500">
                <form action="/edit-post/{{$post->id}}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Post Title</label>
                        <input type="text" id="title" name="title" value="{{$post->title}}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300">
                    </div>
                    
                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Post Content</label>
                        <textarea id="body" name="body" rows="6"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300">{{$post->body}}</textarea>
                    </div>
                    
                    <div class="flex space-x-4">
                        <button type="submit" 
                                class="flex-1 bg-primary-500 hover:bg-primary-600 text-white py-3 rounded-lg transition duration-300 font-semibold">
                            Update Post
                        </button>
                        <a href="/" 
                           class="flex-1 bg-gray-500 hover:bg-gray-600 text-white py-3 rounded-lg transition duration-300 font-semibold text-center">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>