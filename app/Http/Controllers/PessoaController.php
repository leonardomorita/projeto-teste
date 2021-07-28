<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Profissao;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    private $pessoa;

    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = $this->pessoa->orderBy('pes_nome')->paginate(10);
        $profissoes = Profissao::all();

        return view('pessoas.index', compact(['pessoas', 'profissoes']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pes_nome' => 'required|max:255',
            'pes_data_nascimento' => 'required',
            'pes_cpf' => 'required|max:14',
            'pes_telefone' => 'max:14',
            'prof_id' => 'required'
        ],
        [
            'required' => 'O campo é obrigatório.'
        ]);

        $pessoa = $this->pessoa->create($request->all());

        return redirect()->back()->with('sucesso', "A pessoa '$pessoa->pes_nome' foi criado com sucesso");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(int $pessoa)
    {
        $profissoes = Profissao::all();
        $pessoa = $this->pessoa->where('pes_id', $pessoa)->first();

        return view('pessoas.edit', compact(['profissoes', 'pessoa']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $pessoa)
    {
        $request->validate([
            'pes_nome' => 'required|max:255',
            'pes_data_nascimento' => 'required',
            'pes_cpf' => 'required|max:14',
            'pes_telefone' => 'max:14',
            'prof_id' => 'required'
        ],
        [
            'required' => 'O campo é obrigatório.'
        ]);

        $this->pessoa->where('pes_id', $pessoa)->update($request->except(['_token', '_method']));
        $pessoa = $this->pessoa->where('pes_id', $pessoa)->first();

        return redirect()->route('pessoas.index')->with('sucesso', "A pessoa '$pessoa->pes_nome' foi atualizado com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $pessoa)
    {
        $pessoaObj = $this->pessoa->where('pes_id', $pessoa)->first();
        $this->pessoa->where('pes_id', $pessoa)->delete();

        return redirect()->back()->with('sucesso', "A pessoa '$pessoaObj->pes_nome' foi excluída com sucesso");
    }
}
