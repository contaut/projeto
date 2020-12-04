<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('assets/images/min_logo_contaut.png') }}" class="logo" alt="Contaut Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
