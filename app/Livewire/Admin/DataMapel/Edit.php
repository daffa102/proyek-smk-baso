<?php

namespace App\Livewire\Admin\DataMapel;

use App\Models\Mapel;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $mapelId;
    public $nama_mapel;

    public function mount($id)
    {
        $mapel = Mapel::findOrFail($id);
        $this->mapelId = $mapel->id;
        $this->nama_mapel = $mapel->nama_mapel;
    }

    public function save()
    {
        $this->validate([
            'nama_mapel' => ['required', 'min:2', Rule::unique('mapels', 'nama_mapel')->ignore($this->mapelId)],
        ], [
            'nama_mapel.required' => 'Nama mapel wajib diisi',
            'nama_mapel.unique' => 'Nama mapel sudah digunakan',
        ]);

        try {
            $mapel = Mapel::findOrFail($this->mapelId);
            $mapel->update([
                'nama_mapel' => $this->nama_mapel,
            ]);

            session()->flash('success', 'Data mata pelajaran berhasil diperbarui!');
            return redirect()->route('admin.mapel.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal memperbarui data!');
        }
    }

    public function render()
    {
        return view('livewire.admin.data-mapel.edit');
    }
}
