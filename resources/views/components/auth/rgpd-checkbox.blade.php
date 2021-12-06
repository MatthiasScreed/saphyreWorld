<div class="relative flex items-start">
	<div class="flex items-center h-5">
		<input type="checkbox" name="rgpd" id="rgpd" {{ old('rgpd') ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
	</div>
	<div class="ml-3 text-sm">
		<label for="rgpd" class="font-medium text-gray-700">@lang("I have read and accept the site's privacy policy.")</label>
	</div>
</div>
