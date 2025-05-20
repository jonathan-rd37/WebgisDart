<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disaster;
use App\Http\Requests\StoreDisasterRequest;

class DisasterController extends Controller
{
    /**
     * Menampilkan semua data bencana dalam tampilan HTML.
     */
    public function index()
    {
        $disasters = Disaster::all();
        return view('disasters.index', compact('disasters'));
    }

    /**
     * Menampilkan semua data bencana dalam format JSON (untuk peta).
     */
    public function getDisasters()
    {
        return response()->json(Disaster::all()); // Pastikan tidak ada filter yang salah
    }

    /**
     * Menyimpan data bencana baru ke database.
     */
    public function store(StoreDisasterRequest $request)
    {
        Disaster::create($request->validated());

        return redirect()->back()->with('success', 'Disaster data has been added successfully!');
    }

    /**
     * Menampilkan detail satu data bencana.
     */
    public function show($id)
    {
        $disaster = Disaster::findOrFail($id);
        return view('disasters.show', compact('disaster'));
    }

    /**
     * Mengupdate data bencana yang ada.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'disaster' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $disaster = Disaster::findOrFail($id);

        // Jika lokasi diperbarui, cari koordinat baru
        if ($request->location !== $disaster->location) {
            $coordinates = $this->getCoordinates($request->location);
            $disaster->latitude = $coordinates['lat'];
            $disaster->longitude = $coordinates['lon'];
        }

        $disaster->update([
            'location' => $request->location,
            'disaster' => $request->disaster,
            'description' => $request->description,
        ]);

        return redirect()->route('disasters.index')->with('success', 'Data bencana berhasil diperbarui!');
    }

    /**
     * Menghapus data bencana dari database.
     */
    public function destroy($id)
    {
        $disaster = Disaster::findOrFail($id); // Find the disaster by ID
        $disaster->delete(); // Delete the disaster

        return redirect()->route('deleteDisaster')->with('success', 'Disaster deleted successfully!');
    }

    /**
     * Fungsi untuk mendapatkan koordinat (latitude & longitude) berdasarkan nama lokasi.
     */
    private function getCoordinates($location)
    {
        $url = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($location);
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (!empty($data)) {
            return [
                'lat' => $data[0]['lat'],
                'lon' => $data[0]['lon']
            ];
        }

        return ['lat' => null, 'lon' => null]; // Jika tidak ditemukan
    }

    /**
     * Show all aids for a specific disaster/location.
     */
    public function showAids($id)
    {
        $disaster = Disaster::findOrFail($id);
        $aids = \App\Models\Aid::where('disaster_id', $id)->get();
        return view('disasters.aids', compact('disaster', 'aids'));
    }
}
