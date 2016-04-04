@extends('frontend')
@section('content')
    @include('frontend.navigation')
    @include('flash::message')
    <div class="main-container">
        <div class="apie-imone">
            <div class="main-header">
                <p>{{ $organization->title }}<span class="line-break">{{ $organization->getCategory()->first()->name_plural }}</span></p>
            </div>

            <div class="imone-container">

                <div class="left-side">

                    <div class="top-left-side">
                        <div class="logo-cont">
                        <img src="{{ URL::to('/') }}/uploads/logos/{{ $organization->logo }}">
                        </div>
                        <div class="name-details">
                            <p>DIRBA</p>
                            <h3>{{ $organization->title }}</h3>
                            <h4>{{ $organization->getCategory()->first()->name_single }}</h4>
                            <img src="{{ URL::to('/') }}/uploads/{{ $organization->getCategory()->first()->image }}">
                        </div>
                        <div class="imone-checkboxes nano">
                            <div class="nano-content">
                            @foreach($organization->getFacilities()->get() as $facility)
                                <input checked="checked" id="facility_{{ $facility->id }}" type="checkbox" name="vehicle">
                                <label for="facility_{{ $facility->id }}"><span></span>{{ $facility->name }}</label>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="bottom-left-side">
                        <ul>
                            <li>Telefonas: {{ $organization->phone }}</li>
                        <!--    <li>Darbo laikas: {{ $organization->getOpeningTimes()->first()->getToday()->first()->from }} - {{ $organization->getOpeningTimes()->first()->getToday()->first()->to }}</li> -->
                            <li class="darbo-laikas-about">Darbo dienos:
                                <span style="background-color: {{ $organization->getOpeningTimes()->first()->getMonday()->first()->opened ? 'green' : 'red' }}"></span>
                                <span style="background-color: {{ $organization->getOpeningTimes()->first()->getTuesday()->first()->opened ? 'green' : 'red' }}"></span>
                                <span style="background-color: {{ $organization->getOpeningTimes()->first()->getWednesday()->first()->opened ? 'green' : 'red' }}"></span>
                                <span style="background-color: {{ $organization->getOpeningTimes()->first()->getThursday()->first()->opened ? 'green' : 'red' }}"></span>
                                <span style="background-color: {{ $organization->getOpeningTimes()->first()->getFriday()->first()->opened ? 'green' : 'red' }}"></span>
                                <span style="background-color: {{ $organization->getOpeningTimes()->first()->getSaturday()->first()->opened ? 'green' : 'red' }}"></span>
                                <span style="background-color: {{ $organization->getOpeningTimes()->first()->getSunday()->first()->opened ? 'green' : 'red' }}"></span>
                            </li>
                            <li>Vieta: {{ $organization->getCity()->first()->name }} - {{ $organization->place }} - {{ $organization->address }}</li>
                            <li>PVM kodas: {{ $organization->getOrganizationData()->first()->pvm_kodas }}</li>
                            <li>Įmonės kodas: {{ $organization->getOrganizationData()->first()->imones_kodas }}</li>
                        </ul>
                    </div>

                </div>

                <div class="right-side nano">
                    <div class="nano-content">
                        {{ $organization->description }}
                    </div>
                </div>

            </div>

            <a href="#"><p class="ziureti-zemelapyje">žiūrėti žemėlapyje</p></a>

        </div>
    </div>
@endsection