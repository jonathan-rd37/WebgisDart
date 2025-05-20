{{-- filepath: d:\PROJECTWEBGIS\WEBGIS\resources\views\disasters\aids.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aids for {{ $disaster->location }} - {{ $disaster->disaster }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-2">Aids for {{ $disaster->location }} - {{ $disaster->disaster }}</h1>
        <p class="mb-4 text-gray-600">{{ $disaster->description }}</p>
        @if($aids->isEmpty())
            <p class="text-gray-500">No aids found for this location.</p>
        @else
            <table class="min-w-full border">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">Item Name</th>
                        <th class="px-4 py-2 border">Quantity</th>
                        <th class="px-4 py-2 border">Sender Name</th>
                        <th class="px-4 py-2 border">Phone Number</th>
                        <th class="px-4 py-2 border">Tracking Number</th>
                        <th class="px-4 py-2 border">Mail Service</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aids as $aid)
                        <tr>
                            <td class="px-4 py-2 border">{{ $aid->item_name }}</td>
                            <td class="px-4 py-2 border">{{ $aid->quantity }}</td>
                            <td class="px-4 py-2 border">{{ $aid->sender_name }}</td>
                            <td class="px-4 py-2 border">{{ $aid->phone_number }}</td>
                            <td class="px-4 py-2 border">{{ $aid->tracking_number }}</td>
                            <td class="px-4 py-2 border">
                                {{ $aid->mailService->name ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ url()->previous() }}" class="inline-block mt-4 px-4 py-2 bg-gray-500 text-white rounded">Back</a>
    </div>
</body>
</html>
