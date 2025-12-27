<?php

namespace App\Livewire\Admin\DataKelas;

use App\Models\Kelas;
use Livewire\Component;

class Create extends Component
{
    public $nama_kelas = '';

    protected $rules = [
        'nama_kelas' => 'required|min:2|unique:kelas,nama_kelas',
    ];

    protected $messages = [
        'nama_kelas.required' => 'Nama kelas wajib diisi',
        'nama_kelas.unique' => 'Nama kelas sudah ada',
    ];

    public function save()
    {
        $this->validate();

        try {
            Kelas::create([
                'nama_kelas' => $this->nama_kelas,
            ]);

            session()->flash('success', 'Data kelas berhasil ditambahkan!');
            return redirect()->route('admin.kelas.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menambahkan data!');
        }
    }

    public function render()
    {
        return view('livewire.admin.data-kelas.create');
    }
}
