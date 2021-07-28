<?php

namespace App\Http\Controllers;

use App\Models\Profissao;
use Illuminate\Http\Request;

class ProfissaoController extends Controller
{
    private $profissao;

    public function __construct(Profissao $profissao)
    {
        $this->profissao = $profissao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissoes = $this->profissao->orderBy('prof_nome')->paginate(10);

        return view('profissoes.index', compact('profissoes'));
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
            'prof_nome' => 'required|max:255'
        ],
        [
            'required' => 'O campo é obrigatório.'
        ]);

        $profissao = $this->profissao->create($request->all());

        return redirect()->back()->with('sucesso', "A profissao '$profissao->prof_nome' foi criado com sucesso");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $profissao
     * @return \Illuminate\Http\Response
     */
    public function edit(int $profissao)
    {
        $profissao = $this->profissao->where('prof_id', $profissao)->first();

        return view('profissoes.edit', compact('profissao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $profissao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $profissao)
    {
        $this->profissao->where('prof_id', $profissao)->update(['prof_nome'=>$request->prof_nome]);
        $profissao = $this->profissao->where('prof_id', $profissao)->first();

        return redirect()->route('profissoes.index')->with('sucesso', "A profissao '$profissao->prof_nome' foi atualizada com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $profissao
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $profissao)
    {
        $profissaoObj = $this->profissao->where('prof_id', $profissao)->first();

        if ($profissaoObj->pessoas->count() == 0) {
            $this->profissao->where('prof_id', $profissao)->delete();

            return redirect()->back()->with('sucesso', "A profissao '$profissaoObj->prof_nome' foi excluída com sucesso");
        }

        return redirect()->back()->with('erro', "A profissao '$profissaoObj->prof_nome' tem pessoas associadas com ela");
    }
}
