<?php

namespace App\Livewire\Admin\DataMapel;

use App\Models\Mapel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = ['search' => ['except' => '']];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        $this->dispatch('swal:success', [
            'title' => 'Berhasil!',
            'text' => 'Data mata pelajaran berhasil dihapus.',
        ]);
    }

    public function render()
    {
        $mapels = Mapel::where('nama_mapel', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.data-mapel.index', [
            'mapels' => $mapels
        ]);
    }
}
