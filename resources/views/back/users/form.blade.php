@extends('back.layout')

@section('main')

    <form
        method="post"
        action="{{ route('users.update', $user->id) }}">
            @method('PUT')

        @csrf
		<div class="grid grid-cols-3 gap-4">
			<div class="col-span-2">
				<x-back.validation-errors :errors="$errors" />
                @if(session('ok'))
                    <x-back.alert
                        type='success'
                        title="{!! session('ok') !!}">
                    </x-back.alert>
                @endif

				                <x-back.card
                    type='info'
                    :outline="true"
                    title=''>
                    <x-back.input
                        title='Name'
                        name='name'
                        :value='$user->name'
                        input='text'
                        :required="true">
                    </x-back.input>
                    <x-back.input
                        title='Email'
                        name='email'
                        :value='$user->email'
                        input='text'
                        :required="true">
                    </x-back.input>
                    <x-back.input
                        title='Role'
                        name='role'
                        :value='$user->role'
                        :options="['admin','redac','user']"
                        input='select'
                        :required="true">
                    </x-back.input>
                    <x-back.input
                        name='valid'
                        :value='$user->valid'
                        input='checkbox'
                        label="Valid">
                    </x-back.input>
                </x-back.card>


				<button type="submit" class="btn btn-primary">@lang('Submit')</button>

			</div>
		</div>

	</form>

@endsection

@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>
    <script>
        $(function()
        {
            $('#slug').keyup(function () {
              $(this).val(getSlug($(this).val()))
            })
            $('#title').keyup(function () {
              $('#slug').val(getSlug($(this).val()))
            })
        });
    </script>
@endsection
