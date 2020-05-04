@extends('layouts.app')

@section('title', __('actions.add') . ' ' . __('main.search'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <!-- Top buttons - OPEN -->
        @include('buttons.go_back')
        <!-- Top buttons - CLOSE -->

        <!-- Form - OPEN -->
        <form method="post" action="{{ route('searches.store') }}">

            <!-- Stype service title - OPEN -->
            <h3 style="margin-bottom: -20px">
                {{ __('forms.type_service') }}
            </h3>
            <!-- Stype service title - CLOSE -->

            <!-- Type activity, code and region - OPEN -->
            <div class="form-row">
                @csrf

                <!-- Search type activity - OPEN -->
                <div class="form-group funkyradio col-md-2">

                    <!-- Search option - OPEN -->
                    <div class="funkyradio-primary">
                        <input type="radio" name="is_a_practice" id="is_search" value="0" checked/>
                        <label for="is_search"> {{ __('main.search') }} </label>
                    </div>
                    <!-- Search option - CLOSE -->

                </div>
                <!-- Search type activity - CLOSE -->

                <!-- Practice type activity - OPEN -->
                <div class="form-group funkyradio col-md-2">

                    <!-- Practice option - OPEN -->
                    <div class="funkyradio-primary">
                        <input type="radio" name="is_a_practice" id="is_practice" value="1" />
                        <label for="is_practice"> {{ __('main.practice') }} </label>
                    </div>
                    <!-- Practice option - CLOSE -->

                </div>
                <!-- Practice type activity - CLOSE -->

                <!-- Empty space - OPEN -->
                <div class="form-group col-md-1"> </div>
                <!-- Empty space - CLOSE -->

                <!-- Begin datetime - OPEN -->
                <div class="form-group col-md-3">
                    <label for="date_start"> {{ __('forms.begin_date') }} </label>
                    <input type="text" class="form-control" name="date_start" value="{{ old('date_start') }}"/>
                </div>
                <!-- Begin datetime - CLOSE -->

                <!-- Search ID - OPEN  -->
                <div class="form-group col-md-2">

                    <label for="id_search"> {{ __('forms.id_search') }} </label>

                    <input type="text" class="form-control {{ $errors->has('id_search') ? ' is-invalid' : '' }}"
                    name="id_search" value="{{ old('id_search') }}"/>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('id_search') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('id_search') }}</strong>
                    </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>

                <!-- Search ID - CLOSE  -->

                <!-- Search region - OPEN  -->
                <div class="form-group col-md-2">

                    <label for="region"> {{ __('forms.region') }} </label>

                    <select id="region" class="form-control" name="region">
                        <option value="">
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="01 - Centre" @if (old('region') == "01 - Centre") {{ 'selected' }} @endif>
                            01 - Centre
                        </option>
                        <option value="02 - Girona" @if (old('region') == "02 - Girona") {{ 'selected' }} @endif>
                            02 - Girona
                        </option>
                        <option value="03 - Lleida" @if (old('region') == "03 - Lleida") {{ 'selected' }} @endif>
                            03 - Lleida
                        </option>
                        <option value="04 - Metropolitana Nord" @if (old('region') == "04 - Metropolitana Nord") {{ 'selected' }} @endif>
                            04 - Metropolitana Nord
                        </option>
                        <option value="05 - Metropolitana Sud" @if (old('region') == "05 - Metropolitana Sud") {{ 'selected' }} @endif>
                            05 - Metropolitana Sud
                        </option>
                        <option value="06 - Tarragona" @if (old('region') == "06 - Tarragona") {{ 'selected' }} @endif>
                            06 - Tarragona
                        </option>
                        <option value="07 - Terres Ebre" @if (old('region') == "07 - Terres Ebre") {{ 'selected' }} @endif>
                            07 - Terres Ebre
                        </option>
                    </select>

                </div>
                <!-- Search region - CLOSE  -->

            </div>
            <!-- Type activity, code and region - OPEN -->

            <!-- Alertant title - OPEN -->
            <h3 class="margin-top-sm accordion-title collapsed" data-toggle="collapse" href="#collapseAlertant" role="button" aria-expanded="false" aria-controls="collapseAlertant">
                {{ __('forms.alertant') }}
            </h3>
            <!-- Stype service title - CLOSE -->

            <!-- Alertant - OPEN -->
            <div class="form-row collapse" id="collapseAlertant">

                <!-- Is the lost person - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="is_lost_person"> {{ __('forms.is_the_lost_person') }} </label>

                    <select id="is_lost_person" class="form-control" name="is_lost_person">
                        <option value="">
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" @if (old('is_lost_person') == "0") {{ 'selected' }} @endif>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" @if (old('is_lost_person') == "1") {{ 'selected' }} @endif> {{ __('actions.yes') }} </option>
                    </select>

                </div>
                <!-- Is the lost person - CLOSE  -->

                <!-- Is the contact person - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="is_contact_person"> {{ __('forms.is_the_contact_person') }} </label>
                    <select id="is_contact_person" class="form-control" name="is_contact_person">
                        <option value=""> {{ __('forms.chose_option') }} </option>
                        <option value="0" @if (old('is_contact_person') == "0") {{ 'selected' }} @endif> No </option>
                        <option value="1" @if (old('is_contact_person') == "1") {{ 'selected' }} @endif> Si </option>
                    </select>
                </div>
                <!-- Is the contact person - CLOSE  -->

                <!-- Alertant name - OPEN  -->
                <div class="form-group col-md-6">
                    <label for="name_person_alerts"> {{ __('register.name') }} </label>
                    <input type="text" class="form-control" name="name_person_alerts" value="{{ old('name_person_alerts') }}"/>
                </div>
                <!-- Alertant name - CLOSE  -->

                <!-- Alertant age - OPEN  -->
                <div class="form-group col-md-2">
                    <label for="age_person_alerts"> {{ __('forms.age') }} </label>
                    <input type="number" class="form-control" name="age_person_alerts" value="{{ old('age_person_alerts') }}"/>
                </div>
                <!-- Alertant age - CLOSE  -->

                <!-- Alertant phone - OPEN  -->
                <div class="form-group col-md-4">
                    <label for="phone_number_person_alerts"> {{ __('forms.phone') }} </label>
                    <input type="text" class="form-control" name="phone_number_person_alerts" value="{{ old('phone_number_person_alerts') }}"/>
                </div>
                <!-- Alertant phone - CLOSE  -->

                <!-- Alertant address - OPEN  -->
                <div class="form-group col-md-6">
                    <label for="address_person_alerts"> {{ __('forms.address') }} </label>
                    <input type="text" class="form-control" name="address_person_alerts" value="{{ old('address_person_alerts') }}"/>
                </div>
                <!-- Alertant address - CLOSE  -->

            </div>
            <!-- Alertant - CLOSE -->
            <hr/>

            <!-- Incident title - OPEN -->
            <h3 class="margin-top accordion-title collapsed" data-toggle="collapse" href="#collapseIncident" role="button" aria-expanded="false" aria-controls="collapseIncident">
                {{ __('forms.incident') }}
            </h3>
            <!-- Incident title - CLOSE -->

            <!-- Incident - OPEN -->
            <div class="form-row collapse" id="collapseIncident">

                <!-- Incident village UPA - OPEN  -->
                <div class="form-group col-md-6">

                    <label for="municipality_last_place_seen">
                        {{ __('forms.village_last_place_seen') }}
                        <span class="octicon octicon-info" data-toggle="tooltip"
                        data-placement="top" title="{{ __('forms.upa') }}"></span>
                    </label>

                    <input type="text" class="form-control" name="municipality_last_place_seen" value="{{ old('municipality_last_place_seen') }}"/>

                </div>
                <!-- Incident village UPA - CLOSE  -->

                <!-- Incident village UPA - OPEN  -->
                <div class="form-group col-md-6">
                    <label for="date_last_place_seen">
                        {{ __('forms.date_last_place_seen') }}
                        <span class="octicon octicon-info" data-toggle="tooltip"
                        data-placement="top" title="{{ __('forms.upa') }}">
                        </span>
                    </label>
                    <input type="text" class="form-control" name="date_last_place_seen" value="" />
                </div>
                <!-- Incident village UPA - CLOSE  -->

                <!-- Incident zone - OPEN  -->
                <div class="form-group col-md-6">
                    <label for="zone_incident"> {{ __('forms.incident_zone') }} </label>
                    <textarea type="text" class="form-control" name="zone_incident" rows="2">{{ old('zone_incident') }}</textarea>
                </div>
                <!-- Incident zone - CLOSE  -->

                <!-- Incident route - OPEN  -->
                <div class="form-group col-md-6">
                    <label for="potential_route"> {{ __('forms.possible_route') }} </label>
                    <textarea type="text" class="form-control" name="potential_route" rows="2">{{ old('potential_route') }}</textarea>
                </div>
                <!-- Incident route - CLOSE  -->

                <!-- Incident description - OPEN  -->
                <div class="form-group col-md-12">
                    <label for="description_incident"> {{ __('forms.description') }} </label>
                    <textarea type="text" class="form-control" name="description_incident" rows="2">{{ old('description_incident') }}</textarea>
                </div>
                <!-- Incident description - CLOSE  -->

            </div>
            <!-- Incident - CLOSE -->
            <hr/>

            <!-- Lost people count title - OPEN -->
            <h3 class="margin-top accordion-title collapsed" data-toggle="collapse" href="#collapseLostPeopleCount" role="button" aria-expanded="false" aria-controls="collapseLostPeopleCount">
                {{ __('forms.lost_people') }}
            </h3>
            <!-- Lost people count title - CLOSE -->

            <!-- Lost people count - OPEN -->
            <div class="collapse" id="collapseLostPeopleCount">

                <div class="form-row">
                    <!-- Count input - OPEN  -->
                    <div class="form-group col-md-4">
                        <label for="number_lost_people"> {{ __('forms.n_lost_people') }} </label>
                        <input type="number" class="form-control" name="number_lost_people" value="{{ old('number_lost_people') }}"/>
                    </div>
                    <!-- Count input - CLOSE  -->
                    <div class="form-group col-md-2 add-wrapper">
                        <a href="javascript:void(0);" class="add-button btn btn-outline-dark margin-top">
                            <span class="octicon octicon-plus"></span>
                            {{ __('actions.add_lost_person') }}
                        </a>
                    </div>
                </div>


                <!-- Add person - OPEN  -->
                <div class="wrapper">

                    <h4> {{ __('main.lost_person') }} <div class="id-lost-person"> 1 </div> </h4>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="lost_person_name"> {{ __('register.name') }} </label>
                            <input type="text" class="form-control" name="lost_person_name[]" value=""/>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="lost_person_name_respond"> {{ __('forms.name_respond') }} </label>
                            <input type="text" class="form-control" name="lost_person_name_respond[]" value=""/>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="lost_person_age"> {{ __('forms.age') }} </label>
                            <input type="number" class="form-control" name="lost_person_age[]" value=""/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="lost_person_phone_number"> {{ __('forms.phone') }} </label>
                            <input type="text" class="form-control" name="lost_person_phone_number[]" value=""/>
                        </div>
                        <div class="form-group col-md-1">
                            <a href="javascript:void(0);" class="add-button btn btn-outline-dark btn-lg margin-top">
                                <span class="octicon octicon-plus"></span>
                            </a>
                        </div>

                    </div>

                </div>
                <!-- Add person - CLOSE  -->

            </div>
            <!-- Lost people count - CLOSE -->

            <hr/>

            <!-- Lost people state title - OPEN -->
            <h3 class="margin-top accordion-title collapsed" data-toggle="collapse" href="#collapseLostPeopleState" role="button" aria-expanded="false" aria-controls="collapseLostPeopleState">
                {{ __('forms.status_people') }}
            </h3>
            <!-- Lost people state title - CLOSE -->

            <!-- Lost people state - OPEN -->
            <div class="form-row collapse" id="collapseLostPeopleState">

                <!-- State input - OPEN  -->
                <div class="form-group col-md-12">
                    <label for="physical_condition_lost_people"> {{ __('forms.description') }} </label>
                    <textarea type="number" class="form-control" name="physical_condition_lost_people" rows="2">{{ old('physical_condition_lost_people') }}</textarea>
                </div>
                <!-- State input - CLOSE  -->

            </div>
            <!-- Lost people state - CLOSE -->
            <hr/>

            <!-- Equipment and experience title - OPEN -->
            <h3 class="margin-top accordion-title collapsed" data-toggle="collapse" href="#collapseEquipment" role="button" aria-expanded="false" aria-controls="collapseEquipment">
                {{ __('forms.equipment_and_experience') }}
            </h3>
            <!-- Equipment and experience title - CLOSE -->

            <!-- Equipment and experience - OPEN -->
            <div class="form-row collapse" id="collapseEquipment">

                <!-- Knows the zone - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="knowledge_of_the_zone"> {{ __('forms.knows_the_zone') }}? </label>
                    <select id="knowledge_of_the_zone" class="form-control" name="knowledge_of_the_zone">
                        <option value="">
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" @if (old('is_contact_person') == "0") {{ 'selected' }} @endif>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" @if (old('is_contact_person') == "1") {{ 'selected' }} @endif>
                            {{ __('actions.yes') }}
                        </option>
                    </select>
                </div>
                <!-- Is the lost person - CLOSE  -->

                <!-- Experience with the activity - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="experience_with_activity"> {{ __('forms.experience_with_activity') }}? </label>
                    <select id="experience_with_activity" class="form-control" name="experience_with_activity">
                        <option value="">
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" @if (old('experience_with_activity') == "0") {{ 'selected' }} @endif>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" @if (old('experience_with_activity') == "1") {{ 'selected' }} @endif>
                            {{ __('actions.yes') }}
                        </option>
                    </select>
                </div>
                <!-- Experience with the activity - CLOSE  -->

                <!-- Brings water - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="bring_water"> {{ __('forms.bring_water') }}? </label>
                    <select id="bring_water" class="form-control" name="bring_water">
                        <option value="">
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" @if (old('bring_water') == "0") {{ 'selected' }} @endif>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" @if (old('bring_water') == "1") {{ 'selected' }} @endif>
                            {{ __('actions.yes') }}
                        </option>
                    </select>
                </div>
                <!-- Brings water - CLOSE  -->

                <!-- Brings food - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="bring_food"> {{ __('forms.bring_food') }}? </label>
                    <select id="bring_food" class="form-control" name="bring_food">
                        <option value="">
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" @if (old('bring_food') == "0") {{ 'selected' }} @endif>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" @if (old('bring_food') == "1") {{ 'selected' }} @endif>
                            {{ __('actions.yes') }}
                        </option>
                    </select>
                </div>
                <!-- Brings food - CLOSE  -->

                <!-- Brings medication - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="bring_medication"> {{ __('forms.bring_medication') }}? </label>
                    <select id="bring_medication" class="form-control" name="bring_medication">
                        <option value="">
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" @if (old('bring_medication') == "0") {{ 'selected' }} @endif>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" @if (old('bring_medication') == "1") {{ 'selected' }} @endif>
                            {{ __('actions.yes') }}
                        </option>
                    </select>
                </div>
                <!-- Brings medication - CLOSE  -->

                <!-- Brings light - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="bring_flashlight"> {{ __('forms.bring_light') }}? </label>
                    <select id="bring_flashlight" class="form-control" name="bring_flashlight">
                        <option value="">
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" @if (old('bring_flashlight') == "0") {{ 'selected' }} @endif>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" @if (old('bring_flashlight') == "1") {{ 'selected' }} @endif>
                            {{ __('actions.yes') }}
                        </option>
                    </select>
                </div>
                <!-- Brings light - CLOSE  -->

                <!-- Brings cold clothes - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="bring_cold_clothes"> {{ __('forms.bring_cold_clothes') }}? </label>
                    <select id="bring_cold_clothes" class="form-control" name="bring_cold_clothes">
                        <option value="">
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" @if (old('bring_cold_clothes') == "0") {{ 'selected' }} @endif>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" @if (old('bring_cold_clothes') == "1") {{ 'selected' }} @endif>
                            {{ __('actions.yes') }}
                        </option>
                    </select>
                </div>
                <!-- Brings cold clothes - CLOSE  -->

                <!-- Brings waterproof clothes - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="bring_waterproof_clothes"> {{ __('forms.bring_waterproof_clothes') }}? </label>
                    <select id="bring_waterproof_clothes" class="form-control" name="bring_waterproof_clothes">
                        <option value="">
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" @if (old('bring_waterproof_clothes') == "0") {{ 'selected' }} @endif>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" @if (old('bring_waterproof_clothes') == "1") {{ 'selected' }} @endif>
                            {{ __('actions.yes') }}
                        </option>
                    </select>
                </div>
                <!-- Brings waterproof clothes - CLOSE  -->

            </div>
            <!-- Equipment and experience - CLOSE -->
            <hr/>

            <!-- Contact person title - OPEN -->
            <h3 class="margin-top accordion-title collapsed" data-toggle="collapse" href="#collapseContactPerson" role="button" aria-expanded="false" aria-controls="collapseContactPerson">
                {{ __('forms.contact_person') }}
            </h3>
            <!-- Contact person title - CLOSE -->

            <!-- Contact person - OPEN -->
            <div class="form-row collapse" id="collapseContactPerson">

                <!-- Contact person name - OPEN  -->
                <div class="form-group col-md-6">
                    <label for="name_contact_person"> {{ __('register.name') }} </label>
                    <input type="text" class="form-control" name="name_contact_person" value="{{ old('name_contact_person') }}"/>
                </div>
                <!-- Contact person name - CLOSE  -->

                <!-- Contact person phone - OPEN  -->
                <div class="form-group col-md-2">
                    <label for="phone_number_contact_person"> {{ __('forms.phone') }} </label>
                    <input type="text" class="form-control" name="phone_number_contact_person" value="{{ old('phone_number_contact_person') }}"/>
                </div>
                <!-- Contact person phone - CLOSE  -->

                <!-- Contact person affinity - OPEN  -->
                <div class="form-group col-md-4">
                    <label for="affinity_contact_person"> {{ __('forms.affinity') }} </label>
                    <input type="text" class="form-control" name="affinity_contact_person" value="{{ old('affinity_contact_person') }}"/>
                </div>
                <!-- Contact person affinity - CLOSE  -->

            </div>
            <!-- Contact person - CLOSE -->
            <hr/>

            <!-- State HIDDEN - OPEN -->
            <input type="hidden" class="form-control" name="status" value="0">
            <!-- State HIDDEN - CLOSE -->

            <!-- Date creates HIDDEN - OPEN -->
            <input type="hidden" class="form-control" name="date_creation" value="<?php echo date("Y-m-d H:i:s"); ?>">
            <!-- Date creates HIDDEN - CLOSE -->

            <!-- Date modifies HIDDEN - OPEN -->
            <input type="hidden" class="form-control" name="date_last_modification" value="<?php echo date("Y-m-d H:i:s"); ?>">
            <!-- Date modifies HIDDEN - CLOSE -->

            <!-- Id user creates HIDDEN - OPEN -->
            <input type="hidden" class="form-control" name="id_user_creation" value={{ Auth::user()->id }}>
            <!-- Id user creates HIDDEN - CLOSE -->

            <!-- Id user last modification HIDDEN - OPEN -->
            <input type="hidden" class="form-control" name="id_user_last_modification" value={{ Auth::user()->id }}>
            <!-- Id user last modification HIDDEN - CLOSE -->

            <!-- Submit button - OPEN -->
            <div class="text-center margin-top">
                <button type="submit" class="btn btn-primary">
                    {{ __('actions.add') . ' ' . __('main.search') }}
                </button>
            </div>
            <!-- Submit button - OPEN -->

        </form>
        <!-- Form - CLOSE -->

    </div>
    <!-- Content - CLOSE -->

@endsection

<!-- JS -->
<script type="text/javascript">

$(document).ready(function() {
    // today date
    var today = new Date();

    // begin date input
    $('input[name="date_last_place_seen"],input[name="date_start"]').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true,
        timePickerIncrement: 5,
        startDate: moment().startOf('hour'),
        autoUpdateInput: true,
        autoApply: true,
        drops: 'down',
        currentDate: today,
        locale: {
            format: 'YYYY-MM-DD HH:mm:ss',
            firstDay: 1,
            applyLabel: "{{ __('actions.save') }}",
            cancelLabel: "{{ __('actions.cancel') }}",
            daysOfWeek: [
                "{{ __('daterangepicker.sunday') }}",
                "{{ __('daterangepicker.monday') }}",
                "{{ __('daterangepicker.tuesday') }}",
                "{{ __('daterangepicker.wednesday') }}",
                "{{ __('daterangepicker.thursday') }}",
                "{{ __('daterangepicker.friday') }}",
                "{{ __('daterangepicker.saturday') }}"
            ],
            monthNames: [
                "{{ __('daterangepicker.january') }}",
                "{{ __('daterangepicker.february') }}",
                "{{ __('daterangepicker.march') }}",
                "{{ __('daterangepicker.april') }}",
                "{{ __('daterangepicker.may') }}",
                "{{ __('daterangepicker.june') }}",
                "{{ __('daterangepicker.july') }}",
                "{{ __('daterangepicker.august') }}",
                "{{ __('daterangepicker.september') }}",
                "{{ __('daterangepicker.october') }}",
                "{{ __('daterangepicker.november') }}",
                "{{ __('daterangepicker.december') }}",
            ],
        }
    });
    $('input[name="date_last_place_seen"').val( '' );
    $('input[name="date_start"').val( '' );

    $('input[name="date_last_place_seen"],input[name="date_start"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    // input fields increment limitation
    var maxField = 50;
    // input field wrapper
    var wrapper = $('.wrapper');
    // initial field counter is 1
    var x = 1;

    // when add button is clicked
    $(document).on('click', '.add-button', function(e) {
        // check maximum number of input fields
        if(x < maxField) {
            // increment field counter
            x++;
            // add a new html lost person input
            var fieldHTML = '<div class="wrapper"><h4> {{ __("main.lost_person") }} <div class="id-lost-person">' + x + ' </div> </h4><div class="form-row"><div class="form-group col-md-4"><label for="lost_person_name"> {{ __("register.name") }} </label><input type="text" class="form-control" name="lost_person_name[]" value=""/></div><div class="form-group col-md-2"><label for="lost_person_name_respond"> {{ __("forms.name_respond") }} </label><input type="text" class="form-control" name="lost_person_name_respond[]" value=""/></div><div class="form-group col-md-1"><label for="lost_person_age"> {{ __("forms.age") }} </label><input type="number" class="form-control" name="lost_person_age[]" value=""/></div><div class="form-group col-md-3"><label for="lost_person_phone_number"> {{ __("forms.phone") }} </label><input type="text" class="form-control" name="lost_person_phone_number[]" value=""/></div><div class="form-group col-md-1"><a href="javascript:void(0);" class="add-button btn btn-outline-dark btn-lg margin-top"><span class="octicon octicon-plus"></span></a></div><div class="form-group col-md-1"><a href="javascript:void(0);" class="remove-button btn btn-outline-danger btn-lg margin-top"><span class="octicon octicon-trashcan"></span></a></div></div></div>';
            // add the html in the wrapper div
            $(wrapper).append(fieldHTML);
            // assign the counter
            document.getElementsByClassName('id-lost-person').innerHTML = x;
        }
    });

    // once remove button is clicked
    $(wrapper).on('click', '.remove-button', function(e) {
        e.preventDefault();
        // remove field html
        $(this).parent('div').parent('div').parent('div').remove();
        // decrement field counter
        x--;
    });

    // when select is_lost_person value changes
    document.getElementById('is_lost_person').addEventListener('change', function() {
        console.log('Selected value in alertant is the lost person: ', this.value);

        // if the alertant is the lost person
        if( this.value === '1' ) {
            console.log('The alertant is the lost person');
            alertant_is_lost_person();

            // if changes name
            $('input[name="name_person_alerts"], input[name="age_person_alerts"], input[name="phone_number_person_alerts"]').change(function() {
                alertant_is_lost_person();
            });
        }
        else if( this.value === '0' ) {
            alertant_name  = document.getElementsByName("name_person_alerts")[0].value;
            lost_pers_name = document.getElementsByName("lost_person_name[]")[0].value;
            alertant_age  = document.getElementsByName("age_person_alerts")[0].value;
            lost_pers_age = document.getElementsByName("lost_person_age[]")[0].value;
            alertant_phone_number  = document.getElementsByName("phone_number_person_alerts")[0].value;
            lost_pers_phone_number = document.getElementsByName("lost_person_phone_number[]")[0].value;

            if( alertant_name == lost_pers_name ) {
                $('input[name="lost_person_name[]"]').first().val('');
            }
            if( alertant_age == lost_pers_age ) {
                $('input[name="lost_person_age[]"]').first().val('');
            }
            if( alertant_phone_number == lost_pers_phone_number ) {
                $('input[name="lost_person_phone_number[]"]').first().val('');
            }
        }

    });

    // change the lost person name if is the alertant
    function alertant_is_lost_person() {
        // name lost person
        alertant_name = document.getElementsByName("name_person_alerts")[0].value;
        $('input[name="lost_person_name[]"]').first().val(alertant_name);
        console.log("Alertant name: " + alertant_name);

        // age lost person
        alertant_age = document.getElementsByName("age_person_alerts")[0].value;
        $('input[name="lost_person_age[]"]').first().val(alertant_age);
        console.log("Alertant age: " + alertant_age);

        // phone number lost person
        alertant_phone_number = document.getElementsByName("phone_number_person_alerts")[0].value;
        $('input[name="lost_person_phone_number[]"]').first().val(alertant_phone_number);
        console.log("Alertant phone number: " + alertant_phone_number);
    }

    // when select is_contact_person value changes
    document.getElementById('is_contact_person').addEventListener('change', function() {
        console.log('Selected value in alertant is the contact person: ', this.value);

        // if the alertant is the contact person
        if( this.value === '1' ) {
            console.log('The alertant is the contact person');
            alertant_is_contact_person();

            // if changes name
            $('input[name="name_person_alerts"], input[name="phone_number_person_alerts"]').change(function() {
                alertant_is_contact_person();
            });
        }
        else if( this.value === '0' ) {
            alertant_name = document.getElementsByName("name_person_alerts")[0].value;
            contact_name  = document.getElementsByName("name_contact_person")[0].value;
            alertant_phone_number = document.getElementsByName("phone_number_person_alerts")[0].value;
            contact_phone_number  = document.getElementsByName("phone_number_contact_person")[0].value;

            if( alertant_name == contact_name ) {
                $('input[name="name_contact_person"]').val('');
            }
            if( alertant_phone_number == contact_phone_number ) {
                $('input[name="phone_number_contact_person"]').val('');
            }
        }
    });

    // change the lost person name if is the alertant
    function alertant_is_contact_person() {
        // name contact person
        alertant_name = document.getElementsByName("name_person_alerts")[0].value;
        $('input[name="name_contact_person"]').val(alertant_name);

        // phone number contact person
        alertant_phone_number = document.getElementsByName("phone_number_person_alerts")[0].value;
        $('input[name="phone_number_contact_person"]').val(alertant_phone_number);
    }

});

</script>
