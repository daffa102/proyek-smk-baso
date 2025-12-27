<?php

namespace App\Livewire\Admin\DataMurid;

use App\Models\Siswa;
use App\Models\Kelas;
use Livewire\Component;

class Create extends Component
{
    public $nama = '';
    public $nis = '';
    public $kelas_id = '';

    protected $rules = [
        'nama' => 'required|min:3',
        'nis' => 'required|numeric|unique:siswas,nis',
        'kelas_id' => 'required|exists:kelas,id',
    ];

    protected $messages = [
        'nama.required' => 'Nama wajib diisi',
        'nis.required' => 'NIS wajib diisi',
        'nis.unique' => 'NIS sudah terdaftar',
        'kelas_id.required' => 'Kelas wajib dipilih',
    ];

    public function save()
    {
        $this->validate();

        try {
            Siswa::create([
                'nama' => $this->nama,
                'nis' => $this->nis,
                'kelas_id' => $this->kelas_id,
            ]);

            session()->flash('success', 'Data murid berhasil ditambahkan!');
            return redirect()->route('admin.murid.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menambahkan data!');
        }
    }

    public function render()
    {
        return view('livewire.admin.data-murid.create', [
            'kelases' => Kelas::all()
        ]);
    }
}
