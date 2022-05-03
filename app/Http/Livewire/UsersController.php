<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Sale;

class UsersController extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name, $phone, $email, $status, $profile, $image, $password, $selected_id, $fileLoaded;
    public $pageTitle, $componentName, $search;
    private $pagination = 3;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Usuarios';
        $this->status = 'Elegir';
    }

    public function render()
    {
        if(strlen($this->search) > 0)
            $data = User::where('name', 'like', '%' . $this->search . '%')
            ->select('*')->orderBy('name', 'asc')->paginate($this->pagination);
        else
            $data = User::select('*')->orderBy('name', 'asc')->paginate($this->pagination);

        return view('livewire.users.component',[
            'data' => $data,
            'roles' => Role::orderBy('name', 'asc')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function resetUI()
    {
        $this->name ='';
        $this->email ='';
        $this->password ='';
        $this->phone ='';
        $this->image ='';
        $this->search ='';
        $this->status ='';
        $this->selected_id ='';

        $this->resetValidation();
        $this->resetPage();
    }

    public function edit(User $user)
    {
        $this->selected_id = $user->id;
        $this->namespace = $user->name;
        $this->phone = $user->phone;
        $this->profile = $this->profile;
        $this->status = $user->status;
        $this->email = $user->email;
        $this->password = '';

        $this->emit('show-modal', 'open');
    }

    protected $listeners = [
        'deleteRow' => 'destroy',
        'resetUI' => 'resetUI'
    ];

    public function Store()
    {
        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'status' => 'required|not_in:Elegir',
            'profile' => 'required|not_in:Elegir',
            'password' => 'required|min:3'
        ];

        $messages =[
            'name.required' => 'El nombre en este campo es requerido',
            'name.min' => 'El nombre debe contener al menos 3 cararteres',
            'email.required' => 'Ingresa un correo',
            'email.email' => 'Ingresa un correo valido porfavor',
            'email.unique' => 'El email debe ser en este caso unico y este emial ya existe revisa porfavor',
            'status.required' => 'Selecciona el status del usuario porfavor',
            'status.not_in' => 'Selecciona el status del usuario porfavor que sea diferente a elegir',
            'profile.required' => 'Selecciona el perfil de activo o bloqueado porfavor',
            'profile.not_in' => 'Selecciona un perfil porfavor',
            'password.required' => 'Porfavor ingresa una clave correcta',
            'password.min' => 'Porfavor la clave debe contener al menos 3 cararteres'
        ];
        $this->validate($rules, $messages);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            'profile' => $this->profile,
            'password' => bcrypt($this->password)
        ]);

        $user->syncRoles($this->profile);

        if($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/storage/users', $customFileName);
            $user->image = $customFileName;
            $user->save();
        }

        $this->resetUI();
        $this->emit('user-add', 'Usuario Registado');
    }

    public function Update()
    {
        $rules =[
            'email' => "required|email|unique:users,email,{$this->selected_id}",
            'name' => 'required|min:3',
            'status' => 'required|not_in:Elegir',
            'profile' => 'required|not_in:Elegir',
            'password' => 'required|min:3'
        ];

        $messages =[
            'name.required' => 'El nombre en este campo es requerido',
            'name.min' => 'El nombre debe contener al menos 3 cararteres',
            'email.required' => 'Ingresa un correo',
            'email.email' => 'Ingresa un correo valido porfavor',
            'email.unique' => 'El email debe ser en este caso unico y este emial ya existe revisa porfavor',
            'status.required' => 'Selecciona el status del usuario porfavor',
            'status.not_in' => 'Selecciona el status del usuario porfavor que sea diferente a elegir',
            'profile.required' => 'Selecciona el perfil de activo o bloqueado porfavor',
            'profile.not_in' => 'Selecciona un perfil porfavor',
            'password.required' => 'Porfavor ingresa una clave correcta',
            'password.min' => 'Porfavor la clave debe contener al menos 3 cararteres'
        ];
        $this->validate($rules, $messages);

        $user = User::find($this->selected_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            'profile' => $this->profile,
            'password' => bcrypt($this->password)
        ]);

        $user->syncRoles($this->profile);

        if($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/users', $customFileName);
            $imageTemp = $user->image;

            $user->image = $customFileName;
            $user->save();

            if($imageTemp !==null)
            {
                if(file_exists('storage/users/' . $imageTemp))
                {
                    unlink('storage/users/' . $imageTemp);
                }
            }
        }

        $this->resetUI();
        $this->emit('user-update', 'Usuario Actualizado');
    }

    public function destroy(User $user)
    {
        if($user)
        {
            $sales = Sale::where('user_id', $user->id)->count();
            if($sales > 0) 
            {
                $this->emit('user-withsales', 'No es posible eliminar el suuario por que tiene ventas registradas');
            } else {
                $user->delete();
                $this->resetUI();
                $this->emit('user-delete', 'Usuario eliminado con exito');
            }
        }
    }
}
