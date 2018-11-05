<div id="edit-item" class="modal">
    <form action="{{route($route, 'update')}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="modal-content">
            <h4>Editar {{$titulo}}</h4>
            <div class="row">
                <label for="name-edit">Nome:</label>
                <div class="input-field col s12">
                    <input id="id-edit" name="id" type="number" hidden>
                    <input id="name-edit" name="name" type="text" class="validate">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn yellow darken-4" type="submit" id="crud-update">Sim</button>
        </div>
    </form>
</div>
