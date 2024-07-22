<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\usuario;

class Usuarios extends Component
{
    public $usuarios, $nombre, $correo, $password, $tipo_usuario, $id;
    //estado 2 = activo - estado 1 = inactivo
    public $estado=2;
    public $modal=0;

    public function render()
    {
        $this -> usuarios = Usuario::where('estado', 2)->get();
        return view('livewire.usuarios');
    }

    public function crear(){
        $this->limpiarcampos();
        $this->abrirmodal();
    }

    public function abrirmodal(){
        $this->modal=true;
    }

    public function cerrarmodal(){
        $this->modal = false;
    }

    public function limpiarcampos(){
        $this->nombre = '';
        $this->correo = '';
        $this->password = '';
        $this->tipo_usuario = '';
    }

    public function editar($id)
    {
        $usuario = Usuario::findOrFail($id);
        $this->id = $id;
        $this->nombre = $usuario->nombre;
        $this->correo = $usuario->correo;
        $this->password = $usuario->password;
        $this->tipo_usuario = $usuario->tipo_usuario;

        $this->abrirModal();
    }

    public function borrar($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            $usuario->estado = 1;
            $usuario->save();
        }
    }

    public function guardar()
    {
        Usuario::updateOrCreate(['id'=>$this->id],
            [
                'nombre' => $this->nombre,
                'correo' => $this->correo,
                'password' => $this->password,
                'tipo_usuario' => $this->tipo_usuario,
                'estado' => $this->estado,
            ]);

         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
