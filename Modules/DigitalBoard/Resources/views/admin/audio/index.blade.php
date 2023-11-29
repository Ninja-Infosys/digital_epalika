@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.digitalBoard.audio.index') }}">डिजिटल बोर्ड</a>
                        </li>
                        <li class="breadcrumb-item active">अडियो </li>
                    </ol>
                </div>
                <h4 class="page-title">अडियो </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">अडियोहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')

                                <a href="{{ route('admin.digitalBoard.audio.create') }}"
                                    class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>शिर्षक </th>
                                    <th>भिडियो </th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($audios as $audio)
                                    <tr>
                                        <th scope="row" class="align-middle">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="align-middle">
                                            {{ $audio->title }}
                                        </td>
                                        <td class="align-middle">
                                            <video width="130" height="100" controls>
                                                <source src="{{ $audio->audio_url }}">
                                            </video>
                                        </td>
                                        <td class="d-flex gap-1">
                                            @can('digitalBoardVideo_edit')
                                                <a data-bs-type="edit"
                                                    href="{{ route('admin.digitalBoard.audio.edit', $audio) }}"
                                                    class="btn btn-xs btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}"
                                                    title="सम्पादन गर्नुहोस्">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('digitalBoardVideo_delete')
                                                <form action="{{ route('admin.digitalBoard.audio.destroy', $audio) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"
                                                        title="मेटाउनु होस्">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
