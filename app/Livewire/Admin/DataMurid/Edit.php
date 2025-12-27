<?php

namespace App\Livewire\Admin\DataMurid;

use App\Models\Siswa;
use App\Models\Kelas;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $muridId;
    public $nama;
    public $nis;
    public $kelas_id;

    public function mount($id)
    {
        $murid = Siswa::findOrFail($id);
        $this->muridId = $murid->id;
        $this->nama = $murid->nama;
        $this->nis = $murid->nis;
        $this->kelas_id = $murid->kelas_id;
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required|min:3',
            'nis' => ['required', 'numeric', Rule::unique('siswas', 'nis')->ignore($this->muridId)],
            'kelas_id' => 'required|exists:kelas,id',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nis.unique' => 'NIS sudah digunakan',
            'kelas_id.required' => 'Kelas wajib dipilih',
        ]);

        try {
            $murid = Siswa::findOrFail($this->muridId);
            $murid->update([
                'nama' => $this->nama,
                'nis' => $this->nis,
                'kelas_id' => $this->kelas_id,
            ]);

            session()->flash('success', 'Data murid berhasil diperbarui!');
            return redirect()->route('admin.murid.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal memperbarui data!');
        }
    }

    public function render()
    {
        return view('livewire.admin.data-murid.edit', [
            'kelases' => Kelas::all()
        ]);
    }
}
