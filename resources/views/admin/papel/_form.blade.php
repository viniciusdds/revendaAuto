<div class="input-field">
    <input type="text" name="nome" class="validade" value="{{isset($registro->nome) ? $registro->nome : ''}}">
    <label for="nome">Nome do papel</label>
</div>

<div class="input-field">
    <input type="text" name="descricao" class="validade" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
    <label for="descricao">Descrição</label>
</div>