<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\paciente;

class Pacientes extends Component
{
    public $pacientes, $nombre, $apellido, $f_nacimiento, $direccion, $telefono, $correo, $h_medico, $id;
    public $estado=2;
    public $modal=0;

    public function render()
    {
        $this -> pacientes = Paciente::where('estado', 2)->get();
        return view('livewire.pacientes');
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
        $this->apellido = '';
        $this->f_nacimiento = '';
        $this->direccion = '';
        $this->telefono = '';
        $this->correo = '';
        $this->h_medico = '';
    }

    public function editar($id)
    {
        $paciente = Paciente::findOrFail($id);
        $this->id = $id;
        $this->nombre = $paciente->nombre;
        $this->apellido = $paciente->apellido;
        $this->f_nacimiento = $paciente->f_nacimiento;
        $this->direccion = $paciente->direccion;
        $this->telefono = $paciente->telefono;
        $this->correo = $paciente->correo;
        $this->h_medico = $paciente->h_medico;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        $paciente = Paciente::find($id);
        if ($paciente) {
            $paciente->estado = 1;
            $paciente->save();
        }

    }

    public function guardar()
    {
        Paciente::updateOrCreate(['id'=>$this->id],
            [
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'f_nacimiento' => $this->f_nacimiento,
                'direccion' => $this->direccion,
                'telefono' => $this->telefono,
                'correo' => $this->correo,
                'h_medico' => $this->h_medico,
                'estado' => $this->estado,
            ]);

         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
