<div class="list-group">

    @if(Auth::check())
        @if(Auth::user()->admin == 0)
    <a class="list-group-item {{ Request::is('settings/company') ? 'active' : '' }} " href="{{ route('settings.company.index') }}"> {{'Entreprise'}}</a>
    <a class="list-group-item {{ Request::is('settings/invoice') ? 'active' : '' }}" href="{{ route('settings.invoice.index') }}"> {{'Factures'}}</a>
    <a class="list-group-item {{ Request::is('settings/email') ? 'active' : '' }}" href="{{ route('settings.email.index') }}"> {{'Email'}}</a>
    <a class="list-group-item {{ Request::is('settings/estimate') ? 'active' : '' }}" href="{{ route('settings.estimate.index') }}"> {{'Devis'}}</a>
    <a class="list-group-item {{ Request::is('settings/tax') ? 'active' : '' }}" href="{{ route('settings.tax.index') }}"> {{'Taxe'}}</a>
    <a class="list-group-item {{ Request::is('settings/templates/*') ? 'active' : '' }}" href="{{ route('settings.templates.show', 'invoice') }}"> {{'Themes'}}</a>
    <a class="list-group-item {{ Request::is('settings/number') ? 'active' : '' }}" href="{{ route('settings.number.index') }}"> {{ 'Numérotation'}}</a>
    <a class="list-group-item {{ Request::is('settings/payment') ? 'active' : '' }}" href="{{ route('settings.payment.index') }}"> {{'Méthodes de paiement'}}</a>
    @endif
    @endif
        @if(Auth::check())
            @if(Auth::user()->admin == 1)
    <a class="list-group-item {{ Request::is('settings/currency') ? 'active' : '' }}" href="{{ route('settings.currency.index') }}"> {{trans('application.currency')}}</a>
    <a class="list-group-item {{ Request::is('settings/translations') || Request::is('translations') || Request::is('settings/translations/*') || Request::is('translations/*') ? 'active' : '' }}" href="{{ route('settings.translations.index') }}"> {{'Gestion des Langues'}}</a>
            @endif
        @endif

</div>