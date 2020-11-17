<i class="fas fa-stopwatch-20 medal {!! $class ?? '' !!}"></i>
@if($text)
    <?php if ($class == 'gold') {
        $text = 'Auksas';
    } elseif ($class == 'silver') {
        $text = 'Sidabras';
    } else {
        $text = 'Bronza';
    }?>
    <p class="{!! $class !!}">{{ $text }}</p>
@endif
