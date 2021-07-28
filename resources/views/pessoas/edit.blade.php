<x-app-layout>
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Editar Pessoa: {{ $pessoa->pes_nome }}</div>

                    <div class="card-body">
                        <form action="{{ route('pessoas.update', [$pessoa->pes_id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="pes_nome">Nome</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="pes_nome"
                                    id="pes_nome"
                                    placeholder="Digite o nome..."
                                    value="{{ $pessoa->pes_nome }}"
                                >

                                @error('pes_nome')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pes_data_nascimento">Data de Nascimento</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    name="pes_data_nascimento"
                                    id="pes_data_nascimento"
                                    value="{{ $pessoa->pes_data_nascimento }}"
                                >

                                @error('pes_data_nascimento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pes_cpf">CPF</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="pes_cpf"
                                    id="pes_cpf"
                                    placeholder="000.000.000-00"
                                    maxlength="14"
                                    value="{{ $pessoa->pes_cpf }}"
                                >

                                @error('pes_cpf')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pes_telefone">Telefone</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="pes_telefone"
                                    id="pes_telefone"
                                    placeholder="00 00000-0000"
                                    maxlength="14"
                                    value="{{ $pessoa->pes_telefone }}"
                                >

                                @error('pes_telefone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="prof_id">Profissão</label>
                                <select class="form-control" name="prof_id" id="prof_id" required>
                                    <option selected disabled>Selecione</option>

                                    @foreach ($profissoes as $profissao)
                                        <option
                                            value="{{ $profissao->prof_id }}"
                                            @if ($profissao->prof_id == $pessoa->prof_id)
                                                selected
                                            @endif
                                        >
                                            {{ $profissao->prof_nome }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('prof_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pes_observacoes">Observações</label>
                                <textarea class="form-control" name="pes_observacoes" id="pes_observacoes" cols="30" rows="10" placeholder="Digite as observações...">{{ $pessoa->pes_observacoes }}</textarea>
                                @error('pes_observacoes')
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
