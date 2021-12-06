@props(['email' => ''])
<div>
  <label for="email">@lang('Email')</label>
  <input
      id="email"
      class="block w-full mt-1"
      type="email"
      name="email"
      placeholder="@lang('Your email')"
      value="{{ old('email', $email) }}"
      required
      autofocus>
</div>
