@include('admin.includes.alerts')

@csrf
<div class="row">
    <div class="col form-group">
        <label>Nome Completo:</label>
        <input type="text" name="nome" class="form-control" placeholder="Digite seu Nome..." value="{{ $jogador->nome ?? old('nome') }}" required>
    </div>

    <div class="col form-group">
        <label>Apelido:</label>
        <input type="text" name="apelido" class="form-control" placeholder="Digite seu Apelido..." value="{{ $jogador->apelido ?? old('apelido') }}" required>
    </div>
</div>

<div class="row">
    <div class="col form-group">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" placeholder="name@exemplo.com" value="{{ $jogador->email ?? old('email') }}" required>
    </div>

    <div class="col form-group">
        <label>Senha:</label>
        <input type="password" name="senha" class="form-control" placeholder="Digite sua Senha..." value="{{ $jogador->senha ?? old('senha') }}" required>
    </div>
</div>