<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Aid</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6 max-w-lg">
        <h1 class="text-2xl font-bold mb-2">Add New Aid</h1>
        <p class="mb-4">Fill in the details of the aid below:</p>
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('storeAids') }}" method="POST" class="bg-white rounded shadow p-6">
            @csrf
            <div class="mb-4">
                <label for="disaster_id" class="block font-semibold mb-1">Disaster</label>
                <select name="disaster_id" id="disaster_id" class="w-full px-4 py-2 border rounded" required>
                    <option value="">Select Disaster</option>
                    @foreach($disasters as $disaster)
                        <option value="{{ $disaster->id }}">{{ $disaster->location }} - {{ $disaster->disaster }}</option>
                    @endforeach
                </select>
                @error('disaster_id')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="item_name" class="block font-semibold mb-1">Item Name</label>
                <input type="text" name="item_name" id="item_name" class="w-full px-4 py-2 border rounded" required>
                @error('item_name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="quantity" class="block font-semibold mb-1">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="w-full px-4 py-2 border rounded" min="1" required>
                @error('quantity')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="sender_name" class="block font-semibold mb-1">Sender Name</label>
                <input type="text" name="sender_name" id="sender_name" class="w-full px-4 py-2 border rounded" required>
                @error('sender_name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="phone_number" class="block font-semibold mb-1">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="w-full px-4 py-2 border rounded" required>
                @error('phone_number')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="tracking_number" class="block font-semibold mb-1">Tracking Number</label>
                <input type="text" name="tracking_number" id="tracking_number" class="w-full px-4 py-2 border rounded" required>
                @error('tracking_number')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="mail_service_id" class="block font-semibold mb-1">Mail Service</label>
                <select name="mail_service_id" id="mail_service_id" class="w-full px-4 py-2 border rounded" required>
                    <option value="">Select Mail Service</option>
                    @foreach($mailServices as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
                @error('mail_service_id')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-between">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Add Aid</button>
                <a href="{{ route('admin.index') }}" class="px-4 py-2 bg-red-500 text-white rounded">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
