<div id="relatoriomodal" class="modal">
    <form action="{{route('relatorios-exsicata')}}" method="post">
        <div class="modal-content">
            <h4>Selecione os campos que devem conter no relatório</h4>
            @csrf
            <div class="section">
                <div class="row">
                    <input id="id-relatorio" name="id" type="number" hidden>
                    <input id="name-relatorio" name="name" type="text" class="validate" disabled="">
                    <label>
                        <input type="checkbox" name="campos[]" checked value="dados_da_exsicata"/>
                        <span><h6>Dados da Exsicata</h6></span>
                    </label>
                    <div class="divider"></div>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="determinacao"/>
                            <span>Determinação</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="genero"/>
                            <span>Gênero</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="epiteto"/>
                            <span>Epíteto</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="familia"/>
                            <span>Família</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="nome"/>
                            <span>Nome vulgar</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="numero"/>
                            <span>Número</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="autor"/>
                            <span>Autor</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="escaninho"/>
                            <span>Escaninho</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class="section">
                <div class="row">
                    <label>
                        <input type="checkbox" name="campos[]" checked value="dados_da_coleta"/>
                        <span><h6>Dados da coleta</h6></span>
                    </label>
                    <div class="divider"></div>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="coletor"/>
                            <span>Coletor</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="data"/>
                            <span>Data</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="determinador"/>
                            <span>Determinador</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="quantidade"/>
                            <span>Quantidade</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="bdd"/>
                            <span>BDD</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class="section">
                <div class="row">
                    <label>
                        <input type="checkbox" name="campos[]" checked value="localizacao"/>
                        <span><h6>Localização</h6></span>
                    </label>
                    <div class="divider"></div>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="municipio"/>
                            <span>Município</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="uf"/>
                            <span>UF</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="pais"/>
                            <span>País</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="local"/>
                            <span>Local</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="latitude"/>
                            <span>Latitude</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="longitude"/>
                            <span>Longitude</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="habitat"/>
                            <span>Habitat</span>
                        </label>
                    </p>
                    <p class="input-field col s6 m6 l6">
                        <label>
                            <input type="checkbox" name="campos[]" checked value="observacao"/>
                            <span>Observação</span>
                        </label>
                    </p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" type="submit">Gerar relatório</button>
        </div>
    </form>
</div>

