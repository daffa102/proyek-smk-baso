<?php

namespace App\Livewire\Admin\DataMurid;

use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $perPage = 10;
    public $file;

    protected $queryString = ['search' => ['except' => '']];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $murid = Siswa::findOrFail($id);
        $murid->delete();

        $this->dispatch('swal:success', [
            'title' => 'Berhasil!',
            'text' => 'Data murid berhasil dihapus.',
        ]);
    }

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:10240',
        ]);

        try {
            Excel::import(new SiswaImport, $this->file->getRealPath());
            
            $this->file = null;
            $this->dispatch('swal:success', [
                'title' => 'Berhasil!',
                'text' => 'Data murid berhasil diimport.',
            ]);
            $this->dispatch('close-modal', 'import-modal');
        } catch (\Exception $e) {
            $this->dispatch('swal:error', [
                'title' => 'Gagal!',
                'text' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }

    public function downloadTemplate()
    {
        return Excel::download(new class implements \Maatwebsite\Excel\Concerns\FromCollection, \Maatwebsite\Excel\Concerns\WithHeadings {
            public function collection()
            {
                return collect([
                    ['Ahmad Dani', '12345678', 'X RPL 1'],
                    ['Siti Nurhaliza', '87654321', 'X RPL 1'],
                ]);
            }
            
            public function headings(): array
            {
                return ['nama', 'nis', 'kelas'];
            }
        }, 'template_import_siswa.xlsx');
    }

    public function render()
    {
        $murids = Siswa::with('kelas')
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('nis', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.data-murid.index', [
            'murids' => $murids
        ]);
    }
}
