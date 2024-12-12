<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    // Menampilkan daftar proyek
    public function index()
    {
        $projects = Project::all(); // Ambil semua proyek
        return view('admin.project.index', compact('projects')); // Pastikan path-nya benar
    }

    // Menampilkan form untuk membuat proyek baru
    public function create()
    {
        return view('admin.project.create'); // Pastikan path-nya benar
    }

    // Menyimpan proyek baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tools' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi file image
        ]);

        // Menyimpan gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Menyimpan gambar ke direktori yang sesuai
            $imagePath = $request->file('image')->store('project_images', 'public');
        }

        // Menyimpan proyek ke database
        Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'tools' => $validated['tools'],
            'image_path' => $imagePath, // Menyimpan path gambar
        ]);

        // Mengarahkan kembali ke halaman daftar proyek dengan pesan sukses
        return redirect()->route('admin.project.index')->with('success', 'Proyek berhasil dibuat!');
    }

    // Menampilkan form untuk mengedit proyek
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project.edit', compact('project')); // Pastikan path-nya benar
    }

    // Mengupdate proyek yang ada
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tools' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi file image
        ]);

        // Menyimpan gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($project->image_path) {
                unlink(storage_path('app/public/' . $project->image_path)); // Menghapus gambar lama
            }

            // Menyimpan gambar baru
            $imagePath = $request->file('image')->store('project_images', 'public');
            $project->image_path = $imagePath;
        }

        // Update data proyek
        $project->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'tools' => $validated['tools'],
        ]);

        return redirect()->route('admin.project.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    // Menghapus proyek
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Hapus gambar terkait jika ada
        if ($project->image_path) {
            unlink(storage_path('app/public/' . $project->image_path));
        }

        // Hapus proyek
        $project->delete();

        return redirect()->route('admin.project.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
