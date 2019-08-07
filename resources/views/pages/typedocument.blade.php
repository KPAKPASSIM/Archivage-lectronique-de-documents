@extends('layouts.app', ['activePage' => 'typography', 'titlePage' => __('TYPE DOCUMENT')])

@section('content')
    <div class="content">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">AJOUTER TYPE DOCUMENT</h4>
                    <p class="category"></p>
                </div>
                <div class="content">
                    <form class="form-horizontal"><div class="form-group">
                            <label class="col-md-3 control-label">
                                Type document
                            </label>
                            <div class="col-md-9"><input placeholder="" type="text" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3"><button type="button" class="btn-fill btn btn-info">AJOUTER</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection