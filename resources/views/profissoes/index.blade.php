<x-app-layout>
    <div class="container mt-2">
        @if (session()->has('sucesso'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('sucesso') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('erro'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('erro') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-header">Lista de Profissões</div>

                    <div class="card-body">
                        {{ $profissoes->links() }}

                        <div class="table-responsive mt-2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($profissoes as $chave => $profissao)
                                        <tr>
                                            <td>{{ $profissoes->firstItem() + $loop->index }}</td>
                                            <td>{{ $profissao->prof_nome }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('profissoes.edit', [$profissao->prof_id]) }}"
                                                    id="form-edita-{{ $chave }}"
                                                ></form>
                                                <form
                                                    action="{{ route('profissoes.destroy', [$profissao->prof_id]) }}"
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
                                                        class="btn btn-danger btn-sm"
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
                    <div class="card-header">Adicionar Profissão</div>

                    <div class="card-body">
                        <form action="{{ route('profissoes.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="prof_nome">Nome</label>
                                <input type="text" class="form-control" name="prof_nome" id="prof_nome" placeholder="Digite o nome...">

                                @error('prof_nome')
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
