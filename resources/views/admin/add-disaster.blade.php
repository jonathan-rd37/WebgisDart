<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Disaster</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold">Add Disaster</h1>
        <p>Fill in the details of the disaster below:</p>
    
        <!-- Success Message -->
        @if(session('success'))
            <div class="mt-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('disaster.store') }}" method="POST">
            @csrf
            <div class="mt-4">
                <label for="name" class="block">Disaster Name:</label>
                <input type="text" id="disaster" name="disaster" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mt-4">
                <label for="description" class="block">Description:</label>
                <textarea id="description" name="description" class="w-full px-4 py-2 border rounded" required></textarea>
            </div>
            <div class="mt-4">
                <label for="location" class="block">Disaster Location:</label>
                <input type="text" id="location" name="location" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mt-4">
                <label for="longitude" class="block">Longitude:</label>
                <input type="text" id="longitude" name="longitude" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mt-4">
                <label for="latitude" class="block">Latitude:</label>
                <input type="text" id="latitude" name="latitude" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mt-4 flex justify-between">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
                <a href="{{ route('admin.index') }}" class="px-4 py-2 bg-red-500 text-white rounded">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
