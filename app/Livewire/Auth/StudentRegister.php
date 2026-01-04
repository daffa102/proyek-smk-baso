<?php

namespace App\Livewire\Auth;

use Livewire\Component;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use Livewire\Attributes\Layout;

class StudentRegister extends Component
{
    #[Layout('components.layouts.auth')] // Assuming app layout is used for public pages
    public $nama;
    public $nis;
    public $kelas_id;
    public $tahun_ajaran;
    public $selected_mapels = [];

    protected $rules = [
        'nama' => 'required|string|max:255',
        'nis' => 'required|string|unique:siswas,nis',
        'kelas_id' => 'required|exists:kelas,id',
        'tahun_ajaran' => 'required',
        'selected_mapels' => 'required|array|min:1',
    ];

    protected $messages = [
        'nama.required' => 'Nama lengkap wajib diisi.',
        'nis.required' => 'NIS wajib diisi.',
        'nis.unique' => 'NIS sudah terdaftar.',
        'kelas_id.required' => 'Silakan pilih kelas.',
        'tahun_ajaran.required' => 'Silakan pilih tahun ajaran.',
        'selected_mapels.required' => 'Silakan pilih minimal satu mata pelajaran.',
    ];

    public function mount()
    {
        // Try to pre-fill year if only one exists
        $years = $this->getTahunAjaranList();
        if (count($years) === 1) {
            $this->tahun_ajaran = $years[0];
        }
    }

    public function getKelasesProperty()
    {
        return Kelas::all();
    }

    public function getTahunAjaranList()
    {
        return Mapel::distinct()->pluck('tahun_ajaran')->filter()->values()->toArray();
    }

    public function getMapelsProperty()
    {
        if (!$this->tahun_ajaran) {
            return [];
        }
        return Mapel::where('tahun_ajaran', $this->tahun_ajaran)->get();
    }

    public function updatedTahunAjaran()
    {
        $this->selected_mapels = [];
    }

    public function save()
    {
        $this->validate();

        try {
            $siswa = Siswa::create([
                'nama' => $this->nama,
                'nis' => $this->nis,
                'kelas_id' => $this->kelas_id,
                // If we want to store tahun_ajaran in Siswa, we'd need that column. 
                // But user rejected adding it, saying it's in Mapel.
                // So the link to Mapels defines the year.
            ]);

            $siswa->mapels()->attach($this->selected_mapels);

            session()->flash('success', 'Pendaftaran berhasil! Data Anda telah tersimpan.');
            return redirect()->route('welcome');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal mendaftar: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.student-register', [
            'kelases' => $this->kelases,
            'tahunAjaranList' => $this->getTahunAjaranList(),
            'mapels' => $this->mapels,
        ]);
    }
}
