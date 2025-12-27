<?php

namespace App\Livewire\Admin\DataMapel;

use App\Models\Mapel;
use Livewire\Component;

class Create extends Component
{
    public $nama_mapel = '';

    protected $rules = [
        'nama_mapel' => 'required|min:2|unique:mapels,nama_mapel',
    ];

    protected $messages = [
        'nama_mapel.required' => 'Nama mapel wajib diisi',
        'nama_mapel.unique' => 'Nama mapel sudah ada',
    ];

    public function save()
    {
        $this->validate();

        try {
            Mapel::create([
                'nama_mapel' => $this->nama_mapel,
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
