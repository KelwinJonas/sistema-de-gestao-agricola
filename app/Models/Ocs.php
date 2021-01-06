<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Ocs extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cnpj',
        'nome_entidade',
        'nome_ocs',
        'telefone',
        'fax',
        'email',
        'nome_para_contato',
        'orgao_fiscalizador',
    ];


    public static $regras_validacao_criar = [
        'cnpj' => 'required|max:20|unique:ocs,cnpj',
        'nome_entidade' => 'required|max:255',
        'nome_ocs' => 'required|max:255',
        'telefone' => 'required|numeric|min:10',
        'fax' => 'max:255',
        'email' => 'max:255',
        'orgao_fiscalizador' => 'required|max:255',
    ];

    public static $regras_validacao_editar = [
        'nome_entidade' => 'required|max:255',
        'nome_ocs' => 'required|max:255',
        'telefone' => 'required|numeric|min:10',
        'fax' => 'max:255',
        'email' => 'max:255',
        'orgao_fiscalizador' => 'required|max:255',
    ];

    public function endereco() {
        return $this->hasOne('\App\Models\Endereco', 'id', 'endereco_id');
    }

    public function produtor(){
        return $this->hasMany('App\Models\User', 'ocs_id');
    }

    public function agendamentoReuniao(){
        return $this->hasMany('App\Models\AgendamentoReuniao', 'ocs_id', 'id'); // foreign_key e local_key
    }

}
