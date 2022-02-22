<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;


class Result extends Component
{
    use WithFileUploads;
    public $results,$title, $file_name, $result_id;
    public $isModalOpen = 0;
    public function render()
    {
        $this->results=\App\Models\Result::all();
        return view('livewire.result');
    }
    public function addfile()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    private function resetCreateForm(){
        $this->title = '';
        $this->file_name = '';
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    public function export()
    {
        return response()->streamDownload(function () {
            \App\Models\Result::all();
        }, 'export.csv');
    }
    public function store()
    {
        $data = $this->validate([
            'title' => 'required',
            'file_name' => 'required',
        ]);

        $filename = $this->file_name->store('resultsheets','public');
       // dd($filename);

        $data['file_name'] = $filename;

        \App\Models\Result::create([
            'title'=>$this->title,
            'file_name'=>$filename,
        ]);

        session()->flash('message', 'File has been successfully Uploaded.');

        return redirect()->to('/result');
    }
    public function delete($id)
    {
        \App\Models\Result::find($id)->delete();
        session()->flash('message', 'Studen deleted.');
    }
}
