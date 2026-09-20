<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // Fungsi untuk menampilkan data testimoni ke halaman utama
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('welcome', compact('testimonials'));
    }

   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create([
            'name' => $request->name,
            'role' => $request->role,
            'message' => $request->message,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Testimoni berhasil dikirim!');
    }

    public function destroy($id)
    {
        // Cari data testimoni berdasarkan ID
        $testimonial = Testimonial::findOrFail($id);
        
        // Hapus data dari database
        $testimonial->delete();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Testimoni berhasil dihapus!');
    }
}