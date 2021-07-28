<x-app-layout>
    <div class="container mt-2">
        @if (session()->has('sucesso'))
            <div class="alert alert-success">{{ session()->get('sucesso') }}</div>
        @endif

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Lista de Pessoas</div>
                    <div class="card-body">
                        {{ $pessoas->links() }}

                        <div class="table-responsive mt-2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Data de Nascimento</th>
                                        <th>CPF</th>
                                        <th>Profissão</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pessoas as $chave => $pessoa)
                                        <tr>
                                            <td>{{ $pessoas->firstItem() + $loop->index }}</td>
                                            <td>{{ $pessoa->pes_nome }}</td>
                                            <td>{{ Carbon\Carbon::parse($pessoa->pes_data_nascimento)->format('d-m-y') }}</td>
                                            <td>{{ $pessoa->pes_cpf }}</td>
                                            <td>{{ $pessoa->profissao->prof_nome }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('pessoas.edit', [$pessoa->pes_id]) }}"
                                                    id="form-edita-{{ $chave }}"
                                                ></form>
                                                <form
                                                    action="{{ route('pessoas.destroy', [$pessoa->pes_id]) }}"
                                                    id="form-excluir-{{ $chave }}"
                                                    method="POST"
                                                >@csrf @method('DELETE')</form>

                                                <div class="d-flex">
                                                    <button
                                                        class="btn btn-info btn-sm mr-2"
                                                        onclick="event.preventDefault(); document.getElementById('form-edita-{{ $chave }}').submit();"
                                                    >
                                                        Editar
                                                    </button>

                                                    <button
                                                        type="button"
                                                        class="btn btn-danger btn-sm btn-block"
                                                        data-toggle="modal"
                                                        data-target="#excluir-{{ $chave }}"
                                                    >
                                                        Excluir
                                                    </button>
                                                </div>



                                                <!-- Modal -->
                                                <div
                                                    class="modal fade"
                                                    id="excluir-{{ $chave }}"
                                                    tabindex="-1"
                                                    role="dialog"
                                                    aria-labelledby="label-excluir-{{ $chave }}"
                                                    aria-hidden="true"
                                                >
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="label-excluir-{{ $chave }}">Excluir</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                Confirmar?
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                                <button
                                                                    type="button"
                                                                    class="btn btn-secondary"
                                                                    onclick="event.preventDefault(); document.getElementById('form-excluir-{{ $chave }}').submit();"
                                                                >
                                                                    Excluir
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Adicionar Pessoa</div>

                    <div class="card-body">
                        <form action="{{ route('pessoas.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="pes_nome">Nome</label>
                                <input type="text" class="form-control" name="pes_nome" id="pes_nome" placeholder="Digite o nome...">

                                @error('pes_nome')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pes_data_nascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" name="pes_data_nascimento" id="pes_data_nascimento">
                                @error('pes_data_nascimento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pes_cpf">CPF</label>
                                <input type="text" class="form-control" name="pes_cpf" id="pes_cpf" placeholder="000.000.000-00" maxlength="14">
                                @error('pes_cpf')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pes_telefone">Telefone</label>
                                <input type="text" class="form-control" name="pes_telefone" id="pes_telefone" placeholder="00 00000-0000" maxlength="14">
                                @error('pes_telefone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="prof_id">Profissão</label>
                                <select class="form-control" name="prof_id" id="prof_id" required>
                                    <option selected disabled>Selecione</option>

                                    @foreach ($profissoes as $profissao)
                                        <option value="{{ $profissao->prof_id }}">{{ $profissao->prof_nome }}</option>
                                    @endforeach
                                </select>
                                @error('prof_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pes_observacoes">Observações</label>
                                <textarea class="form-control" name="pes_observacoes" id="pes_observacoes" cols="30" rows="10" placeholder="Digite as observações..."></textarea>
                                @error('pes_observacoes')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
