<?php
namespace Modules\EMap\Http\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\EMap\Entities\New\MapPassGroup;


class NaksaForm extends Component
{
    public int|null $map_pass_group_id = null;
    public $mapPassGroups = [];
    public $title=null;
    public int|null $order = null;
    public $form_type = null;
    public $formType = null;
    public $need_from =null;
    public $route_name = null;
    public $fields = [];

    public function mount($data = null):void
    {
        if(!empty($data)){
            $this->form_type = $data->form_type;
            //$this->fields = $data['fields'];

            if (array_key_exists('fields', $data) && !empty($data['fields'])) {
                foreach ($data['fields'] as $field) {
                    $this->fields[] = [
                        'id' => $field['id'] ?? null,
                        'status' => $field['status'] ?? null,
                        'description' => $field['description'] ?? null,
                    ];
                }
            }
        }
       
       $this->mapPassGroups = MapPassGroup::latest()->get();
    }

    public function render()
    {
        //dd($this->fields);
        if(!empty($this->form_type)){
        $this->form_type = $this->form_type ;
        }
        if(!empty($this->form_type->value ?? '')){
        $this->form_type = $this->form_type->value ;
        }
        return view('emap::livewire.naksa-form');
    }
}
