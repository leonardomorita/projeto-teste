<x-app-layout>
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Editar Profissão: {{ $profissao->prof_nome }}</div>

                    <div class="card-body">
                        <form action="{{ route('profissoes.update', [$profissao->prof_id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="prof_nome">Nome</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="prof_nome"
                                    id="prof_nome"
                                    placeholder="Digite o nome..."
                                    value="{{ $profissao->prof_nome }}"
                                >

                                @error('prof_nome')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
