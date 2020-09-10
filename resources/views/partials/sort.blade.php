<?php
    $selectedSort = (isset($sort) && array_key_exists($sort, $options)) ? $sort : array_keys($options)[0];
    $directions = ['asc', 'desc'];
    $order = (isset($order) && in_array($order, $directions)) ? $order : 'asc';
?>
<div class="list-sort-container" list-sort-control>
    <form action="{{ url("/settings/users/{$currentUser->id}/change-sort/{$type}") }}" method="post">

        {!! csrf_field() !!}
        {!! method_field('PATCH') !!}
        <input type="hidden" value="{{ $selectedSort }}" name="sort">
        <input type="hidden" value="{{ $order }}" name="order">

        <div class="list-sort">
            <div component="dropdown" class="list-sort-type dropdown-container">
                <div refs="dropdown@toggle" aria-haspopup="true" aria-expanded="false" aria-label="{{ trans('common.sort_options') }}" tabindex="0">
                    <span>{{ $options[$selectedSort] }} {{ $order === 'desc' ? 'Z-A' : 'A-Z' }}</span>
                    <span>@icon('chevron-down')</span>
                </div>
                <ul refs="dropdown@menu" class="dropdown-menu">
                    @foreach($options as $key => $label)
                        @foreach($directions as $direction)
                            <li @if($key === $selectedSort && $direction === $order) class="active" @endif><a href="#" data-sort-value="{{$key}}" data-order-value="{{ $direction }}">{{ $label }} {{ $direction === 'desc' ? 'Z-A' : 'A-Z' }}</a></li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
            {{--<button href="#" class="list-sort-dir" type="button" data-sort-dir--}}
                    {{--aria-label="{{ trans('common.sort_direction_toggle') }} - {{ $order === 'asc' ? trans('common.sort_ascending') : trans('common.sort_descending') }}" tabindex="0">--}}

            {{--</button>--}}
        </div>
    </form>
</div>
