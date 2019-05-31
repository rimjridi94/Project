@extends('app')

@section('content')
    <div class="col-md-12 content-header" >
        <h1><i class="fa fa-cogs"></i> {{trans('application.translations')}}</h1>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                @include('settings.partials._menu')
            </div>
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title pull-right">
                            <div class="box-tools ">
                                <a href="{{ route('settings.translations.create') }}" class="btn btn-primary btn-sm pull-right" data-toggle="ajax-modal"> <i class="fa fa-plus"></i> {{trans('application.create_locale')}}</a>
                            </div>
                        </h3>
                    </div>
                    <div class="box-body">

                        <table class="table datatable table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{trans('application.flag')}}</th>
                                    <th>{{trans('application.locale_name')}}</th>
                                    <th>{{trans('application.short_name')}}</th>
                                    <th>{{trans('application.status')}}</th>
                                    <th>{{trans('application.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($locales as $locale)
                                <tr>
                                    <td></td>
                                    <td>
                                        @if($locale->flag != '')
                                            {!! HTML::image(asset('assets/img/flags/'.$locale->flag), 'flag', array('class' => 'thumbnail', 'style'=>'margin-bottom:0')) !!}
                                        @else
                                            {!! HTML::image(asset('assets/img/flags/placeholder_Flag.jpg'), 'flag', array('class' => 'thumbnail', 'style'=>'margin-bottom:0')) !!}
                                        @endif
                                    </td>
                                    <td>{{ $locale->locale_name }}</td>
                                    <td>{{ $locale->short_name }}</td>
                                    <td>{{ $locale->status == '1' ? trans('application.enabled') : trans('application.disabled')}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{url('translations/index/application/'.$locale->short_name)}}"><span class="fa fa-eye"></span> {{ trans('application.view_translations') }}</a>
                                        @if($locale->short_name != 'en')
                                            {!! edit_btn('settings.translations.edit', $locale->uuid) !!}
                                            {!! delete_btn('settings.translations.destroy', $locale->uuid) !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection