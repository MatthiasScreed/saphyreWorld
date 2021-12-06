@props([
    'input',
    'name',
    'required' => false,
    'title',
    'rows' => 3,
    'title',
    'label',
    'options',
    'value' => '',
    'Values',
    'multiple' => false,
])

<div class="mb-4">
	@isset($title)
      <label class="block mb-2 text-sm font-bold text-gray-700" for="{{ $name }}">
        @lang($title)
      </label>
	@endisset

	@if($input === 'textarea')
	  <textarea id="{{ $name }}" rows="{{ $rows }}" class="w-full h-20 px-3 py-2 font-medium leading-normal placeholder-gray-700 bg-gray-100 border border-gray-400 rounded resize-none focus:outline-none focus:bg-white" name="{{ $name }}" placeholder='Type Your Comment' @if ($required) required @endif>
		{{ old($name, $value) }}
	  </textarea>
	@elseif($input === 'checkbox')
      <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
            <input id="{{ $name }}" aria-describedby="{{ $name }}" name="{{ $name }}" type="checkbox" {{ $value ? 'checked' : '' }} class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
            </div>
            <div class="ml-3 text-sm">
            <label for="{{ $name }}"" class="font-medium text-gray-900">{{ __($label) }}</label>
            </div>
        </div>
	@elseif ($input === 'select')
		<div class="relative inline-block w-full text-gray-700">
				<select @if($required) required @endif
						class="w-full px-3 py-2 bg-white border rounded outline-none" name="{{ $name }}" id="{{ $name }}">
                  @foreach($options as $option)
						<option value="{{ $option }}"
						{{ old($name) ? (old($name) == $option ? 'selected' : '') : ($option == $value ? 'selected' : '') }}
						>{{ $option }}</option>
				  @endforeach
                </select>
				<div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
  </div>
		</div>
	@elseif ($input === 'selectMultiple')
		<div class="relative inline-block w-full text-gray-700">
				<select multiple @if($required) required @endif
						class="w-full px-3 py-2 text-gray-700 bg-white border rounded outline-none"
						name="{{ $name }}[]"
						id="{{ $name }}">
                  @foreach($options as $id => $title)
						<option value="{{ $id }}"
						{{ old($name) ? (in_array($id, old($name)) ? 'selected' : '') : ($values->contains('id', $id) ? 'selected' : '') }}
						>{{ $title }}</option>
				  @endforeach
                </select>
				<div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
  </div>
		</div>
	@else
	 <input id="{{ $name }}" class="w-full px-3 py-2 font-medium leading-normal placeholder-gray-700 bg-gray-100 border border-gray-400 rounded resize-none focus:outline-none focus:bg-white {{ $errors->has($name) ? ' is-invalid' : '' }}"  type="text" name="{{ $name }}" value="{{ old($name, $value) }}" @if($required) required @endif>
	@endif
	@if ($errors->has($name))
        <div class="text-xs font-bold text-danger">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
