<div id="delete-item" class="modal">
    <form action="{{route($route, 'delete')}}" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-content">
            <h4>Deletar</h4>
            <p>Você tem certeza que deseja deletar a {{$titulo}} abaixo?</p>
            <div class="row">
                <label for="name-delete">Nome:</label>
                <div class="input-field col s12">
                    <input id="id-delete" name="id" type="number" hidden>
                    <input id="name-delete" name="name" type="text" class="validate">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn red delete" type="submit" id="crud-delete">Sim</button>
        </div>
    </form>
</div>
