<?php

namespace App\Livewire\Admin;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UsuarioLivewire extends Component
{
    public $usuarios = [];
    public $empresaId = null;
    public $userId = null;
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public $search = '';

    public function mount($empresaId)
    {
        $this->empresaId = $empresaId;
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['empresa_id'] = $this->empresaId;
        // dd($validatedData);
        User::create($validatedData);
        session()->flash('message', 'Usuario creado exitosamente');
        $this->resetInput();
        $this->dispatch('cerrar-modal');

    }

    public function edit(int $id)
    {
        $usuario = User::find($id);
        if ($usuario) {

            $this->userId = $usuario->id;
            $this->name = $usuario->name;
            $this->email = $usuario->email;
        } else {
            return redirect()->to('/empresas');
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email,'.$this->userId,
        ]);

        User::where('id', $this->userId)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);
        session()->flash('message', 'Usuario actualizado exitosamente');
        $this->resetInput();
        $this->dispatch('cerrar-modal');
    }

    public function delete(int $id)
    {
        $this->userId = $id;
    }

    public function destroy()
    {
        User::find($this->userId)->delete();
        session()->flash('message', 'Usuario eliminado exitosamente');
        $this->dispatch('cerrar-modal');
    }

    public function cerrarModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->userId = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        $this->usuarios = User::where('empresa_id', $this->empresaId)->get(); // where('nombre', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(3);
        return view('livewire.admin.empresas.usuarios.index', ['usuarios' => $this->usuarios]);
    }
}
