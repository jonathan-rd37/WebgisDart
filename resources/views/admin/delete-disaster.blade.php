<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Disaster</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold">Delete Disaster</h1>
        <p>Select a disaster to delete:</p>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Location</th>
                    <th class="px-4 py-2">Disaster</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disasters as $disaster)
                <tr>
                    <td class="border px-4 py-2">{{ $disaster->location }}</td>
                    <td class="border px-4 py-2">{{ $disaster->disaster }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('disaster.destroy', $disaster->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded">Back to Admin</a>
    </div>
</body>
</html>
