<form {!! html_attr(($attr ?? []) + ['method' => 'POST']) !!}>
    @csrf
    {{--Field Generation Start--}}
    @foreach ($fields ?? [] as $field_id => $field)
        @if($field['type'] !== 'hidden')
            <label><span>{{ $field['label'] ?? '' }}</span>
                @if (in_array($field['type'], ['text', 'email', 'password', 'number', 'color']))
                    <input {!! input_attr($field_id, $field) !!}>
                @endif
                @if (in_array($field['type'], ['select']))
                    <select {!! select_attr($field_id, $field) !!}>
                        @foreach ($field['options'] as $option_id => $option)
                            <option {!! option_attr($option_id, $field) !!}>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                @endif
                @if (in_array($field['type'], ['textarea']))
                    <textarea {!! textarea_attr($field_id, $field) !!}></textarea>
                @endif
                @if($errors->has($field_id))
                    <span class="error">{{ $errors->first($field_id) }}</span>
                @endif
                @if (in_array($field['type'], ['radio']))
                    <h3>{{ $field['headline'] }}</h3>
                    @foreach ($field['options'] as $option_id => $option)
                        <label><span>{{ $option }}</span>
                            <input {!! radio_attr($field, $field_id, $option_id) !!}>
                        </label>
                    @endforeach
                @endif
            </label>
        @else
            <input {!! input_attr($field_id, $field) !!}>
        @endif
    @endforeach
    {{--    Field Generation End--}}

    {{--    Button Generation Start--}}
    @foreach($buttons ?? [] as $button_id => $button)
        <button {!! html_attr(($button['extra']['attr'] ?? []) + [
                'value' => $button_id,
                'name' => 'action'
            ]) !!}>{!! $button['text'] !!}</button>
    @endforeach
    {{--    Button Generation End--}}

</form>
