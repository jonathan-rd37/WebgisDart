<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aids</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold">Edit Aids</h1>
        <p>Select and edit the aid details below:</p>
        <form action="{{ route('aid.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-4">
                <label for="aid_id" class="block">Aid ID:</label>
                <input type="text" id="aid_id" name="aid_id" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mt-4">
                <label for="details" class="block">Aid Details:</label>
                <textarea id="details" name="details" class="w-full px-4 py-2 border rounded" required></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
