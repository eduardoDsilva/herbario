<div id="create-item" class="modal">
    <form action="{{route($route)}}" method="POST">
        <div class="modal-content">
            <h4>{{$titulo}}</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input id="name-modal" name="name" type="text" class="validate">
                    <label for="name-modal">Nome</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn red delete" type="submit" id="crud-store">Sim</button>
        </div>
    </form>
</div>
