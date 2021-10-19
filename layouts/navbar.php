<nav class="navbar navbar-dark bg--AquaSpray navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><strong>Ángeles Conexión Espiritual</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin: 0 auto;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/"><strong>Inicio</strong></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong>Historia Clínica</strong></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/historia-clinica/crear">Agregar</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalBuscarHC">Consultar</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/contabilidad"><strong>Contabilidad</strong></a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="modalBuscarHC" tabindex="-1" aria-labelledby="modalBuscarHCLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBuscarHCLabel">Buscar Historia Clínica</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="formGroupExampleInput" class="form-label">DNI / Cédula ó Nombre completo</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </div>
</div>