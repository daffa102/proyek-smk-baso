<?php

namespace App\Livewire\Admin\DataMapel;

use App\Models\Mapel;
use Livewire\Component;

class Create extends Component
{
    public $nama_mapel = '';
    public $tahun_ajaran = '';

    protected $rules = [
        'nama_mapel' => 'required|min:2',
        'tahun_ajaran' => 'required',
    ];

    protected $messages = [
        'nama_mapel.required' => 'Nama mapel wajib diisi',
        'tahun_ajaran.required' => 'Tahun ajaran wajib diisi',
    ];

    public function save()
    {
        $this->validate();

        try {
            Mapel::create([
                'nama_mapel' => $this->nama_mapel,
                'tahun_ajaran' => $this->tahun_ajaran,
            ]);

            session()->flash('success', 'Data mapel berhasil ditambahkan!');
            return redirect()->route('admin.mapel.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menambahkan data!');
        }
    }

    public function render()
    {
        return view('livewire.admin.data-mapel.create');
    }
}
