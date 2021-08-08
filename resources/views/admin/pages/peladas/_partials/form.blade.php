@include('admin.includes.alerts')

@csrf
<div class="row">
    <div class="col-6 form-group">
        <label>Nome do Evento:</label>
        <input type="text" name="nome" class="form-control" placeholder="Digite o Nome..." value="{{ $pelada->nome ?? old('nome') }}" required>
    </div>

</div>

<div class="row">
    <div class="col-3 form-group">
        <label>Data:</label>
        <input type="date" name="data" class="form-control" value="{{ $pelada->data ?? old('data') }}" required>
    </div>

    <div class="col-3 form-group">
        <label>Horário:</label>
        <input type="time" name="horario" class="form-control" value="{{ $pelada->horario ?? old('horario') }}" required>
    </div>
</div>

<div class="row">
    <div class="col-6 form-group">
        <label>Local:</label>
        <input type="text" name="local" class="form-control" placeholder="Local..." value="{{ $pelada->local ?? old('local') }}" required>
    </div>
</div>