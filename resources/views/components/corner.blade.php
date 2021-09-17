<div {{ $attributes->merge(['id' => 'field_'.$field_id, 'class' => 'field overflow-hidden border border-collapse', 'style' => 'width:12.5%; height:12.5%']) }}>
    {{ $slot }}
</div>
