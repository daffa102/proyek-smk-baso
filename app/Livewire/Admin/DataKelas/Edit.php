<?php

namespace App\Livewire\Admin\DataKelas;

use App\Models\Kelas;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $kelasId;
    public $nama_kelas;

    public function mount($id)
    {
        $kelas = Kelas::findOrFail($id);
        $this->kelasId = $kelas->id;
        $this->nama_kelas = $kelas->nama_kelas;
    }

    public function save()
    {
        $this->validate([
            'nama_kelas' => ['required', 'min:2', Rule::unique('kelas', 'nama_kelas')->ignore($this->kelasId)],
        ], [
            'nama_kelas.required' => 'Nama kelas wajib diisi',
            'nama_kelas.unique' => 'Nama kelas sudah digunakan',
        ]);

        try {
            $kelas = Kelas::findOrFail($this->kelasId);
            $kelas->update([
                'nama_kelas' => $this->nama_kelas,
            ]);

            session()->flash('success', 'Data kelas berhasil diperbarui!');
            return redirect()->route('admin.kelas.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal memperbarui data!');
        }
    }

    public function render()
    {
        return view('livewire.admin.data-kelas.edit');
    }
}
