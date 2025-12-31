<?php

namespace App\Livewire\Admin\DataMapel;

use App\Models\Mapel;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $mapelId;
    public $nama_mapel;
    public $tahun_ajaran;

    public function mount($id)
    {
        $mapel = Mapel::findOrFail($id);
        $this->mapelId = $mapel->id;
        $this->nama_mapel = $mapel->nama_mapel;
        $this->tahun_ajaran = $mapel->tahun_ajaran;
    }

    public function save()
    {
        $this->validate([
            'nama_mapel' => ['required', 'min:2'],
            'tahun_ajaran' => ['required'],
        ], [
            'nama_mapel.required' => 'Nama mapel wajib diisi',
            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi',
        ]);

        try {
            $mapel = Mapel::findOrFail($this->mapelId);
            $mapel->update([
                'nama_mapel' => $this->nama_mapel,
                'tahun_ajaran' => $this->tahun_ajaran,
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
