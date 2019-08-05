@extends('layouts.app', ['activePage' => 'typography', 'titlePage' => __('Enregister Un Document')])

@section('content')
<div class="content">

        <div class="row">
            <div class="col-lg-6">
        <form>
            <div class="form-group mb-3">
                <label for="simpleinput">Nom document</label>
                <input type="text" id="simpleinput" class="form-control" placeholder="Nom " >
            </div>

            <div class="form-group mb-3">
                <label for="example-palaceholder">Reference Document</label>
                <input type="text" id="example-palaceholder" class="form-control" placeholder="Reference ">
            </div>

            <div class="form-group mb-3">
                <label for="example-palaceholder">Nom du dossier</label>
                <input type="text" id="example-palaceholder" class="form-control" placeholder="dossier">
            </div>

            <div class="form-group mb-3">
                <label for="example-textarea">Description</label>
                <textarea class="form-control" id="example-textarea" rows="5"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="example-select">Type document</label>
                <select class="form-control" id="example-select">
                    <option>Courrier entrant</option>
                    <option>Courrier sortant</option>
                    <option>Contrat fournisseur</option>
                    <option>Contrat Client</option>
                    <option>Contrat CDD</option>
                </select>
            </div>

        </form>
</div> <!-- end col -->

<div class="col-lg-6">
    <form>

        <div class="form-group mb-3">
                <h4 class="header-title">Pièces jointes</h4>
                <select class="custom-select mt-3">
                    <option selected>Nombre de pièce</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
        </div>
        <div class="form-group mb-3">
            <h4 class="header-title">Document</h4>
            <label for="example-fileinput">Importer document</label>
            <input type="file" id="example-fileinput" class="form-control-file" >
        </div>

        <div class="form-group mb-3">
            <label for="example-date">Date d'archivage</label>
            <input class="form-control" id="example-date" type="date" name="date">
        </div>

        <div class="form-group mb-3">
            <label for="example-color">Color</label>
            <input class="form-control" id="example-color" type="color" name="color" value="#727cf5">
        </div>

        <div class="form-group mb-0">
            <label for="example-range">Range</label>
            <input class="custom-range" id="example-range" type="range" name="range" min="0" max="100">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div> <!-- end col -->
</div>


</div>
@endsection